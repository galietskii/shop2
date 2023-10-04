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
define( 'DB_NAME', 'JEWELLERY' );

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
define( 'AUTH_KEY',         'J;Pd2v0C~W<7^Hyu{WF95wwalvG*+yRg!6ZWYklpm2tq=v&)+]RmSTqqaZ3S$vC ' );
define( 'SECURE_AUTH_KEY',  '$M4jo0GAz0llYUv;Nu$FMTv+ZXU,$F/87D@9b-W#bLSzPSM{X.aJ@_*.nGFN<9>V' );
define( 'LOGGED_IN_KEY',    'ZDn!l#yvUyuB75D=`R/8{<,y92)};eOHM^&IPA&l[e1YaW]vmQ^6%DV};YPmyFF?' );
define( 'NONCE_KEY',        'Rv$#!Ezzz;jt,_GoE276<HULEwFi&`{Z3lVqP:9|Qp.In<,&EQB4H=s&S8u^nu_^' );
define( 'AUTH_SALT',        ']c~LElDe@;,ZTO`SO~Nr5?p>iuo?700b;(q/;ODV$KE^2?eLpmF9y4*,(?p%-U?=' );
define( 'SECURE_AUTH_SALT', 'JDn<?NU-OeqAJy-:v&~@`bV4i^dS EK~^&|uv|L~$`,`s7Rr0]]f%A$[U/EGYu[)' );
define( 'LOGGED_IN_SALT',   'rPy*rAt>US#)F.Icsm6B#l2LK={<d}* L!FlW6,4?lq:=sp^ll<#z(A,:S=suJ:X' );
define( 'NONCE_SALT',       'SGbfLaok|*{.@;QhJ85O,>^v %59uiTHLA`r;[?V4$uZ-wk!Q%DN7F!/PfJ!Q.lC' );

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
