<?php

/**
 * Plugin Name: Converte Facil Painél
 * Plugin URI: https://agencialaf.com
 * Description: Painél dos sites do Converte Facil.
 * Version: 0.0.2
 * Author: Ingo Stramm
 * Text Domain: cfp
 * License: GPLv2
 */

defined('ABSPATH') or die('No script kiddies please!');

define('CFP_DIR', plugin_dir_path(__FILE__));
define('CFP_URL', plugin_dir_url(__FILE__));

function cfP_debug($debug)
{
    echo '<pre>';
    var_dump($debug);
    echo '</pre>';
}

require_once 'tgm/tgm.php';
require_once 'classes/classes.php';
require_once 'cfp-widget.php';
require_once 'cfp-notice.php';
require_once 'cfp-cmb.php';

require 'plugin-update-checker-4.10/plugin-update-checker.php';
$updateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://raw.githubusercontent.com/IngoStramm/cf-panel/master/info.json',
    __FILE__,
    'cf-panel'
);
