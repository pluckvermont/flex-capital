<?php

// Set your environment/url pairs
$environments = array(
  'local'       => 'local.flexiblecapitalfund.com',
  'production'  => 'flexiblecapitalfund.com',
  
);

// Get the hostname
$http_host = $_SERVER['HTTP_HOST'];

// Loop through $environments to see if there’s a match
foreach($environments as $environment => $hostname) {
  if (stripos($http_host, $hostname) !== FALSE) {
    define('ENVIRONMENT', $environment);

    break;
  }
}

// Exit if ENVIRONMENT is undefined
if (!defined('ENVIRONMENT')) exit('No config for this host');

// Location of environment-specific configuration
$wp_config = 'wp-config-' . ENVIRONMENT . '.php'; 

// Check to see if the configuration file for the environment exists
if (file_exists(__DIR__ . '/' . $wp_config)) {
  require_once($wp_config);
} else {
  // Exit if configuration file does not exist
  exit('No database configuration found for this host');
}
