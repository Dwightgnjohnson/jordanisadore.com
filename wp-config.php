<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'jordanisadore');

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
define('AUTH_KEY',         ')T<dt,NZ]^FM+R2fiya.y?+z&GFX7h]xK&t-8Tda6!}46Zb0~MKX#[PiCV>*~rc_');
define('SECURE_AUTH_KEY',  '{f1C)x3?^]OL3ed)1A3:6B9W3S:l|& kZAMpU?ylq,dq=?.&n+(5l,!@qyX@p>KW');
define('LOGGED_IN_KEY',    '/4 fZ-1N,~JBR|Lc_V@fWzb$[(JhhAq8,_PmqcS3HjB.)cSydk>LpN:s(,+.;BxQ');
define('NONCE_KEY',        '$+!J5:4%yKw&AVL|jvmn+dkNztYtntW6G@ibqf}F4M9>P7 I/n`+mfuIXaCh &~p');
define('AUTH_SALT',        'to#R(OLo`:k[#GB[V`QnE&X8!vD>!SO Lq~qO&8GHi#@iz%V:2Az%j&OEj1IvV1=');
define('SECURE_AUTH_SALT', 'sG/lY*IU#}fju/S%EII/P1Ak3x|vEj7oZ*f<+OISbC42nOYuK@w$4ndT6#5W:@1X');
define('LOGGED_IN_SALT',   ' ~awLWIq*n mX:(l?82!&hc,u3?-1+iKIh;goW/1$hgF*-z6@_wk0#A[MHw79eg[');
define('NONCE_SALT',       '#:d[}^u*;t7k:i2p;gTn#n4<dZojSt1k0>hi:^&*t~n?Jvjcl|L%&tO4}4@~B~>m');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
