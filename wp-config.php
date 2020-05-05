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
define( 'DB_NAME', 'wp_test' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'h/`vp2D,/@Ocd~ [-I&VHCTYKBnGU*ozf#JxmwGF}Wk8&4@rP};.sr;Lmbl(IGzT' );
define( 'SECURE_AUTH_KEY',  'UQk#4*y>q5+UfqrP*O{%!IKE;>DRDI6Ej4n[^i+k*`J`Id[<Uex)8}xGq.!a$M41' );
define( 'LOGGED_IN_KEY',    '#BY]UYprvSS1sO[9,O#`hV5Fl7*;W)=9~vhmzFO@ErnsV/_~EbB)k3T!K0!9ei#o' );
define( 'NONCE_KEY',        'j2vX4ho!ZI|Z^!m).L3AAimYn(j*e`(^gvE,iOgr>~cbahJy}(tSpeqi0gb<&Av)' );
define( 'AUTH_SALT',        '0C8A]zK2~|MI`kLAG`,MiB^)yk|#i5PLLDy8NcvFIN$Wo ~((n$[Cv@U.{5r`Fwk' );
define( 'SECURE_AUTH_SALT', 't]u-= `?3sPc88e0/;4[Fk-|.yf*<CVcxNX5f]WN^vU&cxpD}cg_|:i#3W^viP]0' );
define( 'LOGGED_IN_SALT',   '*s;|2{h^sRF)QQJ[-%in*AU,pod!1)s#$;)QfSsfYt<v/d)VZA}(AJOI*Wu@f0$k' );
define( 'NONCE_SALT',       'XL/m$.*}qdxYW7^}KP^TkqfnY)!/Ev>)E@Gm?.$:Fc6}#&7aDD4CD-jo8Of2qVL{' );

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
