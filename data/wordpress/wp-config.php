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
define( 'DB_NAME', 'wp_db' );

/** Database username */
define( 'DB_USER', 'wp_user' );

/** Database password */
define( 'DB_PASSWORD', '1234' );

/** Database hostname */
define( 'DB_HOST', 'wp-60sec-db' );

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
define( 'AUTH_KEY',          '^<J5yQ9lg)i`^P{T:%.acJ5}WH/]p9n;J&.C_amFmxLe!}+8A4Fgf&!P5U%? ka$' );
define( 'SECURE_AUTH_KEY',   '{+v(=P_atI,T7Ad`*-I8iKEHN0e*un07O5#/7##Fpaa>GcJ;c[asBeGf66VYzJL}' );
define( 'LOGGED_IN_KEY',     'RDu&i{b]6g@^U}Me$G/sk<Ki3,: ry&,B(p<lq*AX*MwUnA:s)]6^Lk_3$ar#8A{' );
define( 'NONCE_KEY',         'cpV$8E0YV`z`pA_X.02 eB&isr7do2Th94G7UNL=MC`aK!9m3+7$$<WveH-pqw[J' );
define( 'AUTH_SALT',         '1cs&r*:?ZK]!]ac5c:p.~{md0z-/yoORlYyL`}5xknFL/T_%^US#;T*;h+5j!,w=' );
define( 'SECURE_AUTH_SALT',  '9jU%P1armM,6/snbjW2#_x`Pcu.,BP&Ts/ly8h_mW*|i9t^-.o,|D)m9/yQu#e>-' );
define( 'LOGGED_IN_SALT',    'vz-quAOC+Iyb@/g$=e+i&zj9?O:G;=5$%I(&UyyemDzg0E%ob:sJHa!|au_f|8J2' );
define( 'NONCE_SALT',        '7i@<~]?Ic ?AcD2 pK}.k4~bVXbfpV1l!Oli-s/uUhPobl76{#JO:dQRN>7eqKz;' );
define( 'WP_CACHE_KEY_SALT', '|gu,FPmGRRImbe1: tEl b_k/0U<SkXv_I!xRj7`M9|Pdny@*<;WGwuGix4U&>&I' );


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

define( 'WP_REDIS_HOST', 'redis' );
define( 'WP_REDIS_PORT', '6379' );
define( 'WP_REDIS_DATABASE', '0' );
define( 'WP_CACHE', 'true' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
