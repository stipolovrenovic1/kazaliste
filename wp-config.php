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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wpkvbaza' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'CZJ7*yY&._b$9*}fOO,7abNu~aq_zI!aeG{c}|(u@JAPvfTb]XtsBh0Ney5ip!16' );
define( 'SECURE_AUTH_KEY',  'pniPgcKeiA;B/ge@IM4x6V)#nXI[!LX7PS4yL&uChPX!l5{/Wu5_si6/a$a@avj;' );
define( 'LOGGED_IN_KEY',    '_~i1>Zw0K%eKkVb_4<-SXJ0GAtf-?D~{-0yHn&>Q$/&&PMQ/pdC,o]RVo|z@bj%(' );
define( 'NONCE_KEY',        '~l;%,~q@/@)1%@w@_[<hldF!I;NsTVX,DnK1c7&Jw^oLGY_b7;*XR+APkDkF)4Gy' );
define( 'AUTH_SALT',        'q`u/`6N+(b4IbTYhwsa]2`Ap-5]qL;<@_3$b)/VuMj?uwwHa5UBzEal2o-|3zQx0' );
define( 'SECURE_AUTH_SALT', 'N+c)!P/bN^|0T8qf~x}tcA|<}-13e(.;}tfNZ~9`P:LBAJh4rvHoe:K]#0m QI?z' );
define( 'LOGGED_IN_SALT',   'SR=-nFcx#8|CYE)r.D;xJHV}#uUuqRO[J|S[e)Y./R@62{=QMG!$dsFbJIW;/7hX' );
define( 'NONCE_SALT',       '1bK#A)BC7<D+%}XB[V)1uq!OsE6%nB)7z*HdSj_|o77n,?,@Qn}YcOSECK#Uml^<' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
