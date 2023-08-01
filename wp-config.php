<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'nxtpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'xgrQpNV+qiM@n m~*cT,&-6flRP.|(x8dSS=e_I+@xG_m350B?4j-o,RbLb~)V*k' );
define( 'SECURE_AUTH_KEY',  'qtn sif[RjR@:Tvoz(2D>h/7$xiYM+*SK+l=kD)YbI2xydK%$yUxy#TZinlFB/>9' );
define( 'LOGGED_IN_KEY',    'HTgyF]w-LTOYwih)#/Zd(.KAQ@ev;STn,5*hg;6U5l$l7e@2-z(Rxgb#$+!B[[b<' );
define( 'NONCE_KEY',        '&4m(hl6-)1XTs:VyRjE=/t%z{Fz?R&hzALuNsu#Fxg$H%JrZ_Dr@a=Ub4!6q^EY~' );
define( 'AUTH_SALT',        '3l(Tf32ec-lPznkHQ%JXIlT`vs^dN;W%#ULXkP7=vi8gjeBl_d,.EDV..Y?T8.@m' );
define( 'SECURE_AUTH_SALT', 'T-9.Bv[YQ&A=)dIw=J0H+uZkBL+$?9%@Rh{P#r{[kN2[viQSzPUFkN9)6/SBy,a<' );
define( 'LOGGED_IN_SALT',   '5iP<CrS#_nH;QwS(oXw%A1;g7cRbBOa>j^x^(9#Ffg~}4=2~Q&5@`KVY`4^@]yY$' );
define( 'NONCE_SALT',       'hQnrJs1[NwB`6+`7SSh Qd3izr$s9!BG3xOLMTxx50m.{q*{HhYLgAl*7x~>Wy,.' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

//define( 'HEADLESS_MODE_CLIENT_URL', 'http://localhost/nxtpress/' );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
