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
define( 'AUTH_KEY',          'sC!8 +h7i}Fz}D/a8;9%&u*KATyd4^A717#3z??kI&QzoRSzzmpL.%0aR4PQz`$$' );
define( 'SECURE_AUTH_KEY',   '([pPFiKm8v-yNvnX>d jGGEza6=E&7}>Y|a@{t>UouqsuHZcd|F2U>mt@3dKT.sR' );
define( 'LOGGED_IN_KEY',     'bx|%%|}QM)MtT9?t8xL r)4$k><v:tF?Rw|7i(y}(bX]2EfuKC~@P/8s_>~uBcCv' );
define( 'NONCE_KEY',         'mQMq#6utR^JRD12Y*QYUzZUZ4(xvtTQlyp<%a9=7-Gcy_eJ<?I!_u,jJ|-I_8U;W' );
define( 'AUTH_SALT',         'Y4>J=-t0p`[neOHdo]9x0VDO,RP-hUGb{EWZ0O/%]A-BYd:eqUL9^]Yhm)jfo+s}' );
define( 'SECURE_AUTH_SALT',  'r%B4!yfNq;-y]$UX<>6QK*p#%*3QHZ@sV]<!8}mC_$L{qb&a),63=GamMe4Yc7A5' );
define( 'LOGGED_IN_SALT',    '34sbk-I<)*B9pUhA=9P{7H-3sq-<`joBL#u_OL};yFF`T4R@Y{z89T@-!tq1_7@R' );
define( 'NONCE_SALT',        '1.rStV)7U)feZ4B^DlIP>G=^C|p^,-hJnsMRy0GPS3<Sjwr]GIc8dYrs~R`V1DM`' );
define( 'WP_CACHE_KEY_SALT', '*pMy]+={Mc=mu7y@!!FO^(V?qJ@7Zy6<7:,b)g&wyZ&ZUh4f0d E8G1Cg`-zlg={' );


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
