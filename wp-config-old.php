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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '9s) uM#VKp&d*X4u5#K<(:eDRh;5p4,ot2BW[+c>P6(;7~Z/DDecWHW]j-2M2D#b' );
define( 'SECURE_AUTH_KEY',   '2+7ue=Fn,(W[;:RmE~pd;Ke+%?4Q/A-5`dkK{ &JkS85x$e&s*8Q~rNh~pN=+!xJ' );
define( 'LOGGED_IN_KEY',     ';9MRj NV{oh~nES(4FabI?-jC{9:g 2p+b-cHWqn[R6Cxqu}Q}z^MD]?Rd{[p^OR' );
define( 'NONCE_KEY',         '|$JM.G: u`&d;gF8EXdDt5F<PlbJ^ZI:[Kz9RdO:~m(WM{=*W@Pbl!>SKt8/*>_ ' );
define( 'AUTH_SALT',         'MIDGZ%g?c-?k2*Uv^Qp@K-wh)keN,J14,T5Z3Gw98KGT=k<XV}M^&^kr$E`5h;-D' );
define( 'SECURE_AUTH_SALT',  'Wrc9cSP2;%GEEAoS#]ZS x8:I3)n)nf,R`icx5mrpjPICm*v}8j65tI;cK~YU<S3' );
define( 'LOGGED_IN_SALT',    'G8@;=#MAh#(%Q]SbFXo=*N&gd;X!YQ6I(^H]fQ&_!p_v`p=wZ!-WI{NG)R7dMAlK' );
define( 'NONCE_SALT',        ',[w?p}g&hwYX)eb5iSg,qZqB6N|e+t)|!n01swScTN:q+2-)1Kb015@L[n!@Sr8^' );
define( 'WP_CACHE_KEY_SALT', 'w4rVO:?|PI+yzM=E>Wa0[$}~hg@83])6lRf5Qf)u1<(b[gt2Q89D)NhOcoC>o%^`' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
