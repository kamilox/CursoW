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
define( 'DB_NAME', 'cursow2' );

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
define( 'AUTH_KEY',         'V/gKrK7M*nmxUF!i~.<-fvPXCspih)V}XVG?2DQ5<_4H7H!SUju$$QTLv8f=9{^]' );
define( 'SECURE_AUTH_KEY',  '<4gRg8l)]%E7j.W.l%pe|F?+7g@wNIPqX0v)+&CCPuzIQFG0.f_#>DIw;A_QJ-8c' );
define( 'LOGGED_IN_KEY',    'jJ_K{Q7k`$),CWz+7E.L&`:m3XW8|n_0.A]_Q9M7pQC&J7Q,BMm@Gn,}K&zr^G:9' );
define( 'NONCE_KEY',        '2)@.aBaz)$Z+EF#Oo$ {m:Rr4Mj/T!PvNB+F3b8o=&z$|p*gfogQ^2[5a~m2ehnh' );
define( 'AUTH_SALT',        '>OQ_@0aX`+Z`4?6_,jq!:h#C.KAa[s!n_FES]RU#@2hWbv/Kpgvl*LYrc+2aEA`+' );
define( 'SECURE_AUTH_SALT', 'dGVxE[>c=ml2j.mFA=9Uktne8HqLC;rJ0zG_;GLBk*(=sb-R6l?LQz/4IumgA? W' );
define( 'LOGGED_IN_SALT',   'B|k;e?D1P*y|7A6By.QZ[p+yb<X/7MnC&qI+:wK,L>iP4YPXZmqnTvwZ;-.`xWx2' );
define( 'NONCE_SALT',       'LO.pgp3)>PBXZ<9C].JlpeQOVFgO]==$o3rZT2QUst]DlhDRHBLzv$[:Z|rBe_kC' );

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
