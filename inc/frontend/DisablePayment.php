<?php
/**
 * @package disablePaymentSolutions
 */
namespace Inc\frontend;

class DisablePayment {
    
    public static function register() {
        add_filter(
            'woocommerce_available_payment_gateways', [self::class, 'wc_disable_payment_methods_based_on_tags']);
    }

    public static function wc_disable_payment_methods_based_on_tags($available_gateways) {
        if (!is_checkout()) return $available_gateways;

        $available_gateways_fallback = $available_gateways;
        $paymentRules = [];

        foreach (WC()->cart->get_cart() as $cart_item) {
            $product_id = $cart_item['product_id'];
            $terms = wp_get_post_terms($product_id, 'payment_rule', array('fields' => 'slugs'));
            error_log($product_id . " has " . print_r($terms, true));
            foreach ($terms as $term) {
                if (!in_array($term, $paymentRules)){
                    $paymentRules[] = $term;
                }
            }
        }

        $taxonomyRules = frimannsGetPaymentSolutions();
        foreach ($taxonomyRules as $tax => $gateway) {
            if (in_array($tax, $paymentRules)) {
                unset($available_gateways[$gateway]);
            }
        }
        if (!empty($available_gateways)){
            return $available_gateways;

        } else {
            $key = array_search("kort", $paymentRules, true);
            if ($key !== false) {
                unset($paymentRules[$key]);
            }
            foreach ($taxonomyRules as $tax => $gateway) {
                if (in_array($tax, $paymentRules)) {
                    unset($available_gateways_fallback[$gateway]);
                }
            }
            return $available_gateways_fallback;
        }
    }
}