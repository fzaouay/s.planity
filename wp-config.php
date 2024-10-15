<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'planity' );

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
define( 'AUTH_KEY',         'y[6Yp<_a=a4?3tl7d+=F[x=a?01OktL2R~DU,rW ll4(8CSdj-7K>MB_Z{_3<A2^' );
define( 'SECURE_AUTH_KEY',  'guO#:e<@Q/AosFSJr5p;Tpi[1M3V>pD4ImV|@0&vr^vJjd_{18p.]1Y}]EMg7gio' );
define( 'LOGGED_IN_KEY',    '+kk-=Ahn_~dv/n2[r[r3Y1d]1)EM(,RdEjF]@=P1%sEJ{.YpbKZFg-!/(;7WMT&l' );
define( 'NONCE_KEY',        'HHhN~o_@0*x`moo_2a<bD{;uSo0aRryFktt=4KPTqaOEY>*5rQ}==,dz,|<G7.@c' );
define( 'AUTH_SALT',        'ey7`8d1.sO<9EAE8TnBB=bB:7^?+ND X+%oqUZk-NC&.h{<`6$@O>}]0[LO|w]<w' );
define( 'SECURE_AUTH_SALT', 'gYkyE]k/=gEh8gz !k}7r/~KP>q<f5.!H5Y**Fa~b=v9M4:UtgM0p{&m$R|/^OwX' );
define( 'LOGGED_IN_SALT',   ' EZLJ3&kyB|#TM:kFPlDy7.6ikJ g82ci[v]=-p[0T|#Eq<4LzYaz60XRKP[1$3Z' );
define( 'NONCE_SALT',       'f8?rq<RqwHrQOEi(MxsS0P+==I|BlZ0r!TZtdpTT3<PFctrevgnfF9bgj-z%,jN ' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
