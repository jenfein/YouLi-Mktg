<?php
/**
 * The base configuration for WordPress - YouLi TEST Environment
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
define('DB_NAME', 'wordpress-prod');

/** MySQL database username */
define('DB_USER', 'youli-wordpress');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '[egi!pds:fCSjhgz?{2trC7x?8h.gjo+U8.YEW`Guw<,!a0Ga=c[UfG(Y9`:SYk/');
define('SECURE_AUTH_KEY',  '+T2(|#29j6@jzf>YC$Vl/}T#}MpmbnIgUJ`^e`B1^MsOEtE5^I_}?,&jG-wM)Zqw');
define('LOGGED_IN_KEY',    '8pm)U|+RLAJx:)#w0TW(JV_xFff<)*)}b[]C [l[`nH]#6!,,y`2),lE:Yvcm21,');
define('NONCE_KEY',        'r&i{7Elxc O(Illk9DG%m??Q2U5[n+%=Cp~mhU#mI84@_/g.I00k`tvRUV11{$Dt');
define('AUTH_SALT',        '^0pb,UV0jh/kyR4Y7ui?`VqY!bXWW*vn-{.gG4rZ}WjS7T)<=q?MQi3B,kkZS&lQ');
define('SECURE_AUTH_SALT', 'Z>T:iQ${4UC(g)V@hi34*g(,(,06p.0d`nTdP7MkX;,pq}{/D` #u.tfs/drY.@2');
define('LOGGED_IN_SALT',   'jD|izi,M&1dM*~FGU.&}Dqd9/<`HwQ2n4}mlLm3iBMfX ]qpkAk33IC]ivM2bkd4');
define('NONCE_SALT',       'ka^[>z2+6{m_,Gd=m^DAZ~Sv|Hji^ f@fc*-xct3&a84te>mP?4fnL2%][6UW)mG');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'youli_';

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
