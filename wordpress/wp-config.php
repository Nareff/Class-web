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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '0*T6;bX2I>N21TA,}DRI2&<IB9{8Cz$f9qa$|lR7!-u-(]GWR,M@ry6)]1?>w3,s' );
define( 'SECURE_AUTH_KEY',  'PPyP{cTM;^1mxORi/1U@k+j1G?>x,W?~f)B[;W)XFW}AkS.N!P)LIfAjIhh&PcT(' );
define( 'LOGGED_IN_KEY',    ',a>de)rw`m}=Gki~M3dTt)<feqpnp>x#LE?&@B0S3rS$D7g@MD#t4A@!u&kQ19Is' );
define( 'NONCE_KEY',        'V+@vZZ8kGcffDMH^YH Q(HfD(N?C2%`1oX^Ke&aY,N`?%oy#$Y;QFCpf/5D&M$?D' );
define( 'AUTH_SALT',        '<Di!_h>rSMMZ-Lz=s_x+ GHjcYy3f?r|kiG(eL]g]e)F`CcX@MkV)S4jiUH~&o#[' );
define( 'SECURE_AUTH_SALT', 'A~#Dd:Vqq[CdQ7uq!k}NT4CQf%RxU,<{#*3.5,`A=UgW.*gNkM&9^.TUvt61e]`|' );
define( 'LOGGED_IN_SALT',   'BewI~xw:F!%&:M~r7.Y2=v7Xs)t3:M,KDf~9(FKu2OaA(<iLAs^GO%&xTU5dzU^{' );
define( 'NONCE_SALT',       'CaOSNzC`^Fqb)|e*iN9r9M7UNrEe~4qt(]Q9<3O;5-Pw^$Q?Y>g_UowaPDl!p#Qn' );

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
