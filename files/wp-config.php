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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'wordpress' );

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
define( 'AUTH_KEY',         'd3aA(oUei39/_SG|6uT+evcbwMkFHq!mE:OOE=}c<QFkkjCZj:TEOA,}!}d,M5wF' );
define( 'SECURE_AUTH_KEY',  'h+DFnt:2yD?P9c#aI<MA<mjN[mo::xYO#=q`34[I{@,McC5W7beP:X&IcVS8KLwD' );
define( 'LOGGED_IN_KEY',    'd)/N_E/_QPT-*qts%[y]aF_boH1eWFT]bz,o[Zp#r-f44bd53$lGInw~NKl-`1&{' );
define( 'NONCE_KEY',        'JrWth])6chmq,YcWgcW=$5&93Pn2~]#H>nrNNLx/-VmRg#-E$j<FXf<eJ-A-o^b ' );
define( 'AUTH_SALT',        'H5/YHnDA2mb+8|]JF((]97n:]6Nw/;/4B@#$;o1YoR{4D:HGRO^%m8@W+06OLIk,' );
define( 'SECURE_AUTH_SALT', 'In<8_^q}yn>j>xc[T!!uu.?Mo$hvXUW`oPnF_}_@[aNT*Mx3{NSq`T4IZc`6HPvX' );
define( 'LOGGED_IN_SALT',   '`Zpk/~}=QVOQn}Uau)VuY}~u*k_Zmkd6&eTSaX^1Ki3^N9C<fKinOyL^JSFFJaKv' );
define( 'NONCE_SALT',       '*Tx]WmJ^MaBEqrI14(Tl(4YL(2td&q}-#.xn+(N/or^/@D!d&u+md$,2bOBA9i-@' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
