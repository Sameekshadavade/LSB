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
define( 'DB_NAME', 'lsb_auctions' );

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
define( 'AUTH_KEY',         'N^Lm5d>K TjP~?9R`D;0>xg=A9 eA*K.T/oY_:Qd^~e0w~He?y!5)XcX}1vO$O.1' );
define( 'SECURE_AUTH_KEY',  'uz:k+u`6u:L(yjdB.mWlU<gjTe10f4P|^oyCN.j[E-(r#YIITadu<B6t9,0&A0ZG' );
define( 'LOGGED_IN_KEY',    'V4u^:NT4Vg K%@hVK S4RwFo#$+$l/xiywqt1%c:ZjSmUh7;.FJ$0haq1QNnOQpK' );
define( 'NONCE_KEY',        'vz=^<e!xm<U^O[8C9[$HR#:S^ieUR:35!Rk#MtBG[kh~bU+p; UJBvC@S&D(?SIO' );
define( 'AUTH_SALT',        '0}cIO/^Qsb`6,|(CERpbm>t7B3DdvO9|[<1.WSe9a?Ao3Rc_gXB#y!Tv<{%n]b]]' );
define( 'SECURE_AUTH_SALT', 'Q,6weDqW>jqr/}Pc<p>[;)D3<sYjM9S)P:I^qM-P*~?lk;a$=_A;)ow^s?dS(f?7' );
define( 'LOGGED_IN_SALT',   'L!Q ujtWCC35#9(DF{p.*;R_&Lbw5b?:=;5$ra+=OuW`3+>?LU;As-S<X[+r{_j#' );
define( 'NONCE_SALT',       'g4t@jd<v6YsR8,%s1,p#IVqb?)6>W4]y~yrZ#c2g1M/?k,>~)V98V@QAbG^m67NF' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
