<?php
/**
 * @package disablePaymentSolutions
 */

namespace Inc\admin;

class RegisterTaxonomies {
    public static function register() {
        add_action('init', [self::class, 'wc_register_payment_rule_tags']);
    }
    public static function wc_register_payment_rule_tags() {
        register_taxonomy(
            'payment_rule',
            'product',
            array(
                'label'        => 'Payment Rule Tags',
                'public'       => true,
                'rewrite'      => array('slug' => 'payment-rule'),
                'hierarchical' => false, 
                'show_admin_column' => false, 
            )
        );
    }
}
