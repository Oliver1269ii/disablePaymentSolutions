<?php
/**
 * @package disablePaymentSolutions
 */

namespace DPS\admin;

class SaveSettings {
    public static function register() {
        add_action('woocommerce_process_product_meta', [self::class, 'save' ] );
    }

    public static function save($post_id) {
        update_post_meta( $post_id, 'one_time_use', isset( $_POST['one_time_use'] ) ? 'yes' : 'no');
        update_post_meta( $post_id, 'reusable', isset( $_POST['reusable'] ) ? 'yes' : 'no');

    }
}