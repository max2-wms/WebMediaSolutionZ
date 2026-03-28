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

 /*
* this prevents the wordpress admin interface from asking for FTP credentials
* when trying to upload themes or plugins
*/
define('FS_METHOD', 'direct');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'webmedj6_webmediasolutionz');

/** MySQL database username */
define('DB_USER', 'webmedj6_tsn');

/** MySQL database password */
define('DB_PASSWORD', 'Password_01');

/** MySQL hostname */
define('DB_HOST', 'db:3306');

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
define('AUTH_KEY',         '6bcc71e5ee9e2ee7695831b69a55fac98e1926cc');
define('SECURE_AUTH_KEY',  '19493dadba68d4a81714658a5df2f3a3b1bb43c2');
define('LOGGED_IN_KEY',    '3ed08dc8a3693abbf6bf8730376764202b9ebc0a');
define('NONCE_KEY',        '25b5906cb504a92f67ab31ecc0ba225bd2801543');
define('AUTH_SALT',        'eee7d18062ba048ac467eb66a88a9b33acf33ea8');
define('SECURE_AUTH_SALT', 'e99ebaf8eded1eb9963203e8a7b9904f3b3698df');
define('LOGGED_IN_SALT',   'b53d0efd149ad5b0b1a1df10b28b139dee920dad');
define('NONCE_SALT',       'c4aa9d3f51665bc32a1afecc086b0b7d1f30464e');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
