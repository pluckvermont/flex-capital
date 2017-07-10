<?php
# Database Configuration
define( 'DB_NAME', 'wp_flexcap' );
define( 'DB_USER', 'flexcap' );
define( 'DB_PASSWORD', '50WGv6yUXsI H99ngTzV' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         ',5GQHF6. u+x?3l]!9HGCO+Q}<DmqbeCh^ 4QJ}&bk#BheShb<Z]?zByGx<?+?`X');
define('SECURE_AUTH_KEY',  'pszJ~D2Ir_g&-+A(EPKT0IZ[xC:ie|D;&hIcYvUO;,Pes,+dVI9;g0zKi(W-;bny');
define('LOGGED_IN_KEY',    '}5A8e>X-z@~j56Mco9VbN4!OYr^:K@lhGvk^M8alk7FNwbpVJM[sWA$+jyinGz?o');
define('NONCE_KEY',        'R>ynqb~kH/qKi=&+DBQcP@:`vsl3W`TPaf7znybtau>_Z)v)_yS],2 pW7vY91/U');
define('AUTH_SALT',        '9J B <Wt;UYX3f6UNJ134|,t2CvXFY*jZ7nhU`%y})1LpBTJ5-7w|^$#+Y6}$:]i');
define('SECURE_AUTH_SALT', 's9y`/^Zr%&[%&e+GTW[UA{=~L6C*TQAi@Su!__[l<EkKu}wg]]APfCmf2-GPyZzj');
define('LOGGED_IN_SALT',   'vzCIa6ex-iW9_fhbNU7xv.nD}l&)&6u:zhPL5(p0v/2zmQv_` z$Cc+jd@YMhjgI');
define('NONCE_SALT',       'bR=c@|_2/JL+#R;._P(rH(L[XRO1W|9n@O-:v6PpJyf#d*?*D+O2IiJ]7TELqp)T');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'flexcap' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', '3c7e541d00a20da98da9bb5cf2faa58fb84e2f65' );

define( 'WPE_FOOTER_HTML', "" );

define( 'WPE_CLUSTER_ID', '100046' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'flexcap.wpengine.com', 1 => 'flexiblecapitalfund.com', 2 => 'flexiblecapitalfund.org', 3 => 'www.flexiblecapitalfund.org', 4 => 'www.flexiblecapitalfund.com', );

$wpe_varnish_servers=array ( 0 => 'pod-100046', );

$wpe_special_ips=array ( 0 => '146.148.50.87', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
