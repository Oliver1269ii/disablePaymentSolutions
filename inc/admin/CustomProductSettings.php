<?php
/**
 * @package disablePaymentSolutions
 */

namespace DPS\admin;

class CustomProductSettings {
    public static function register() {
        add_action('woocommerce_product_options_general_product_data', [self::class, 'displayOptions' ] );
    }

    public static function displayOptions() {
        woocommerce_wp_checkbox( array(
            'id'          => 'one_time_use',
            'label'       => __( 'Packaging', 'disablePaymentSolutions' ),
            'description' => __( 'One time use', 'disablePaymentSolutions' )
        ) );
        woocommerce_wp_checkbox( array(
            'id'          => 'reusable',
            'label'       => __( '', 'disablePaymentSolutions' ),
            'description' => __( 'Reusable', 'disablePaymentSolutions' )
        ) );
    }
}