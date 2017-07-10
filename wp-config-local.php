<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_flexcap');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'nC+a:xGdX+1wqA0R0 OheP|K_(AIFvr,2|+.`H+Q=|(c5Zvw|R2[|]7?2Y0oyDB8');
define('SECURE_AUTH_KEY',  '$a6&UtNh__q,Ljy;&AolfJ{Tw8!3rKEZT7t:xQ9IHr+|lt!__0Bb?,8|eX)(=LK.');
define('LOGGED_IN_KEY',    '~=zy.Y7-7&&*6Wead<w{bls!8+QMnx5zq!0V^lnfL.*<sYpLEoDkC64GqEGE>Js0');
define('NONCE_KEY',        '%+e1$@.02>D>caTiD6:w{nIu=b<-(tRYG]AVRe|&1!ujE(H.#vbeomHGqbAH+K(Y');
define('AUTH_SALT',        'UFVX:8kJVUS c57yVDh-fWMkKr|yi^nW]a|c_{R7T_1OY-/$4Hq-s_eb/b.Xq;DJ');
define('SECURE_AUTH_SALT', '-yTB{3!Vxg;&0r6~-lmA+1xE+5z x5#8|8k?wd]RNqaiIhC3!UgjxRt(x/R|.<+-');
define('LOGGED_IN_SALT',   'dA?S15yt</+uW)z(`|LwD{,l3HD/H7UF6y pJ+w!i~,{=9l%tub| 7nTvu*[[~j`');
define('NONCE_SALT',       '0<73.V~j5*DX2Fy<-1b4jqFImEYA|*;>~Xy:3 ) aEM}aQ6|M,8BFZ7#Fh>~7_w8');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

define('WP_HOME','http://local.flexiblecapitalfund.com');
define('WP_SITEURL','http://local.flexiblecapitalfund.com');
define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
