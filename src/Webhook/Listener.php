<?php

namespace MailChimp\Sync\Webhook;

use MailChimp\Sync\UserRepository;
use WP_User;

/**
 * Class Listener
 *
 * This class listens on your-site.com/mc4wp-sync-api/webhook-listener for MailChimp webhook events.
 *
 * Once triggered, it will look for the corresponding WP user and update it using the field map defined in the settings of the Sync plugin.
 *
 * @package MailChimp\Sync\Webhook
 * @property UserRepository $user_repository
 */
class Listener {

	/**
	 * @var
	 */
	public $options;

	/**
	 * @var string
	 */
	public $url = '/mc4wp-sync-api/webhook-listener';

	/**
	 * @param $options
	 */
	public function __construct( $options ) {
		$this->options = $options;
	}

	/**
	 * Add hooks
	 */
	public function add_hooks() {
		add_action( 'init', array( $this, 'listen' ) );
	}

	/**
	 * Listen for webhook requests
	 */
	public function listen() {
		if( $this->is_triggered() ) {
			$this->handle();
			exit;
		}
	}

	/**
	 * Yes?
	 *
	 * @return bool
	 */
	public function is_triggered() {
		return strpos( $_SERVER['REQUEST_URI'], $this->url ) !== false;
	}

	/**
	 * Handle the request
	 */
	public function handle() {

		$data = stripslashes_deep( $_REQUEST['data'] );
		$type = ( ! empty( $_REQUEST['type'] ) ) ? $_REQUEST['type'] : '';

		// do nothing if no "type" or "web_id" is given
		if( empty( $type ) || empty( $data['web_id'] ) ) {
			return false;
		}

		// find WP user by List_ID + MailChimp ID
		$user = $this->user_repository->get_user_by_mailchimp_id( $data['web_id'] );

		// filter user
		$user = apply_filters( 'mailchimp_sync_webhook_user', $user, $data );

		if( ! $user instanceof WP_User ) {

			// fire event when no user is found
			do_action( 'mailchimp_sync_webhook_no_user', $data );
			echo 'No corresponding user found for this subscriber.';

			// exit early
			return false;
		}

		$new_user_data = array();

		// update user email if it's given, valid and different
		if( ! empty( $data['email'] ) && is_email( $data['email'] ) && $data['email'] !== $user->user_email ) {
			$new_user_data['user_email'] = $data['email'];
		}

		// update WP user with data (use reversed field map)
		// loop through mapping rules
		foreach( $this->options['field_mappers'] as $rule ) {

			// is this field present in the request data?
			if( isset( $data['merges'][ $rule['mailchimp_field'] ] ) ) {

				// is scalar value?
				$value = $data['merges'][ $rule['mailchimp_field'] ];
				if( ! is_scalar( $value ) ) {
					continue;
				}

				// update user property if it changed
				if( $user->{$rule['user_field']} !== $value ) {
					$new_user_data[ $rule['user_field'] ] = $value;
				}
			}

		}

		// update user if something changed
		if( count( $new_user_data ) > 0 ) {
			$new_user_data['ID'] = $user->ID;
			wp_update_user( $new_user_data );
		}

		// fire event to allow custom actions (like deleting the user)
		do_action( 'mailchimp_sync_webhook', $data, $user );

		// fire type specific event. Example: mailchimp_sync_webhook_unsubscribe
		do_action( 'mailchimp_sync_webhook_' . $type, $data, $user );

		echo 'OK';
	}

	/**
	 * @param $var
	 *
	 * @return UserRepository|null
	 */
	public function __get( $var ) {

		switch( $var ) {
			case 'user_repository':
				return new UserRepository( $this->options['list'] );
			break;
		}

		return null;
	}

}