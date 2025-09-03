<?php
/**
 * @package disablePaymentSolutions
 */
/* 
Plugin Name: Disable Payment Solutions
Plugin URI: https://github.com/Oliver1269ii/disablePaymentSolutions
Description: Disables certain payment solutions depending on a new product tag
Version: 1.0.0
Author: Oliver "Oliver1269" Larsen
Author URI: https://github.com/Oliver1269ii
License: GPL-3.0-or-later
Text Domain: disablePaymentSolutions
*/

defined( 'ABSPATH' ) or die();

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

use Inc\base\Activate;
register_activation_hook( __FILE__, 'Activate');
function Activate() {
    Activate::activate();
}

use Inc\base\Deactivate;
register_deactivation_hook( __FILE__, 'Deactivate');
function Deactivate() {
    Deactivate::deactivate();
}

function frimannsGetPaymentSolutions() {
    return [
        "faktura" => "cod",
        "kort" => "epay_dk",
        "8days" => "reserve_link"
    ];
}

if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}
