<?php 
/**
 * @package disablePaymentSolutions
 */

namespace DPS\base;

class Deactivate {
    public static function deactivate(){
        flush_rewrite_rules();
    }
}