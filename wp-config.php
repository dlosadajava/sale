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
define( 'DB_NAME', 'sale' );

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
define( 'AUTH_KEY',         '&vbGPSzk+h@Fv*YK] l(,ys];sFr;l;AK#$`dp_TpgnG!Tw?)W.AX3` rKKe$/u`' );
define( 'SECURE_AUTH_KEY',  'KDl9U~kP<AF=o<<Uv:!e)k(E_=HS*l;Gl?W?GX-GJ4gVE}c/Av1~``+.!(ZKOcql' );
define( 'LOGGED_IN_KEY',    '.7-6;c1!rs`JsTRQP&Z- pPd)nGGeg0_TaTM_y[A%T[z,KwM8q=aE[hZ)5t;*KJ0' );
define( 'NONCE_KEY',        '.j4SQ{-cQn1!Is:K2/?nkZ17NI:@M{tnu~W}I _ehVxbheT1z%>4r6Z9x)&9{C#K' );
define( 'AUTH_SALT',        'ln*!E)I_K|sP(B%OH03n%B}v[OJC73O0I$_+)8X>G;>)uJ]e>_,}P_v?@.YA:<=E' );
define( 'SECURE_AUTH_SALT', '5550-=Hqvt{Rc~=&AJ5w$mB0QPq%so4Ux/Aol!pb~1zpe>EP5?GNSGNmBFp5npr4' );
define( 'LOGGED_IN_SALT',   'zE*U)wj!kvCU9<6Tvwkg^zQ09N~laB}+vuY:m1WkPrzG]kah}*:[*lfd7uU -V*y' );
define( 'NONCE_SALT',       'xO*uTyY|(,~ 0lf)c2r8@Wc^*  ee>?9tsd5)~uRu/V?HwZ|_1-:2JuVgkHk.M63' );

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
