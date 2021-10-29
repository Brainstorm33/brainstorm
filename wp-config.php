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
define( 'DB_NAME', 'brainsto_nbrainst' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         't2&GtfIH?f[AVlPuu,j;a@x*@bMR|Uzm2$+PzXe/<L?B}D;Km|:hsqw6 RCT:c]$' );
define( 'SECURE_AUTH_KEY',  'YZB %wnmB^#><Z^Ffz~(OyB,UXG`tV1b2|YeaX0;<LSQ/XG]>b >a[r-nSV_!8#u' );
define( 'LOGGED_IN_KEY',    '>XV*aR`=)gUyQTt_PiiOVB3h9M(|qo~omxO&KVy2b4~2H@]f>-y@GT%RJ^&&phKl' );
define( 'NONCE_KEY',        '[:MCVk%yK&$ ikv>l*q#B(AbQZmdYz_dWb_m<P9vai<)c}43&v[7%6aDlkNa~RcP' );
define( 'AUTH_SALT',        'TRFJ.K`N{{,d8::#UB8cnyY/]GDI$#FsZ 7beE^q2K(EO0pH8d*`ryUMTsQmGP@N' );
define( 'SECURE_AUTH_SALT', '$S=!<S xKQM/A<7Xg[?OP:C<Bakq9k_.,zqQXK&s9]BDJGNKN2`*H5-]8/`h0C}g' );
define( 'LOGGED_IN_SALT',   'w m2l^F0b~EEq|`Qj1@aqC}9S<jY, }d&oT(c2LP|b3F|tB_AB@`7-n3-_N%LfQ#' );
define( 'NONCE_SALT',       '(([+8 f$ocynz0-v,XH[z)[#D$kIxDRyd?g@2)5~kMi~pl-r?=/!y|i SV[NObM]' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'bs_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
