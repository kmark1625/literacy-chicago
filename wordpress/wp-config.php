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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '<3tRa+NmU,cGz[;Qx]x5(x9V;Q18 48$R7yRgXI>#R%L&/b@MoPF1VJcZttQuz31');
define('SECURE_AUTH_KEY',  '?I#xR6,cqa$y+1lX1R&8kOce<s;I~+4q<-^+$pz9[IC&C}sMz( VC:EN%HHEJa:m');
define('LOGGED_IN_KEY',    'pU >WBdR~Pa<k.)`x5f(};wYWAbG{rT*1)m}u]pN[hSbcQV{$?7}2|aJEn><fQ3D');
define('NONCE_KEY',        '!FLRLPZN)UZP-S_@OLR.AT:37`f_M4L@ROTh^ud^^TPOO|b~,0?m*.SHXD;;,A|h');
define('AUTH_SALT',        'J_wS`i_UT}]hhK]H6y[XL9zVGJ=?E611]kxNh;;dY1mJ576(,^2+A|@H;v3=T-/Z');
define('SECURE_AUTH_SALT', 'zU5P0vd2,K.W>X6wix4I{WRM7M`AC:@#c>&)ugDJsjB;!2%NA+ LK+_8?UE+zzPt');
define('LOGGED_IN_SALT',   'I-1Z-nh1W_h=ng:h!YztNV3b][3q*M+u}RG|Den!#85D)-ldq%G`%BEB:?|+t;:}');
define('NONCE_SALT',       'kAr^.RIvp<^zjC68:X@Ki@)e.^L|OIt%Jz~M4uHlSTR%fUrzLZuvD-Q@OPFCa*Mi');

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
