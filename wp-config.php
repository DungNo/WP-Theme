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
define( 'DB_NAME', 'dungvd' );

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
define( 'AUTH_KEY',         'Gi)^S`Z]@n9!2hRO+1&Qwr#1zz<MbWf>#&,xj3p,t`?TM}V FL.+_C/D:8T<*BZ=' );
define( 'SECURE_AUTH_KEY',  '.t*6e!NaJzJymMZ-*t(?4k{o$*;z%4%d7zS1$nt${=`kuZ(vF?3{I~KI(tY`Aasw' );
define( 'LOGGED_IN_KEY',    '/l}wF$xC{C0dr~{a9?a3u5T^MRoHV K36Q#BLPP2!g#bRnos<&:aKU5Zu[T6WgT$' );
define( 'NONCE_KEY',        '$O%p7TO8!06O X{/-t:n25_^pC2K6RP*4#I1Y,IJS4su(LSBKJdAMmw/1j6>^9xl' );
define( 'AUTH_SALT',        '@|?wt:gQHF3)g4pgV`HyR8_s++h:S4j`1):-OzJc[H*fQf94/lqb6;^G+}:LK$tf' );
define( 'SECURE_AUTH_SALT', 'wDvj>z]j!<|`wo[wO{91sLR+B5nNx#uhij,?ws.V%`+@e04+ EGTU<H{3s)/x,|r' );
define( 'LOGGED_IN_SALT',   'Kq ;1iDCVp)^!ut([k|:Sm3:yr(bvJ)vodQ*PIGEy^r#&Zj,syIr}6<*eM(4xuwu' );
define( 'NONCE_SALT',       'cWQJst+BOJJH2=D[y190jb(-z4W>%2+PQ0vOBXA|4yqEv4gf_Zxy,u@X!rzs,JK+' );

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
