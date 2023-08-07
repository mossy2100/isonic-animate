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

 * @link https://wordpress.org/support/article/editing-wp-config-php/

 *

 * @package WordPress

 */



// ** Database settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define( 'DB_NAME', 'isonicio_animate' );



/** Database username */

define( 'DB_USER', 'isonicio_animate' );



/** Database password */

define( 'DB_PASSWORD', 'mzqcLs!.F^1_' );



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

define( 'AUTH_KEY',         '4q]3VTs.>0PRKdYXVoAkpnl%mI%Y;&`R#U-/ %tA<~,v7Bg2U7t% r0P.srMFCBJ' );

define( 'SECURE_AUTH_KEY',  'h7~E@~f{%sPs]g=:J4/h{zAQw*e8?nN>btV41.qq+c@LyA2 Jz `y#KBPS=3:;:+' );

define( 'LOGGED_IN_KEY',    'WoY2G|D@|8}2Nm hM=Dr_R9?]|<+zh$G=;_p>9y6Yg|U6Ra4A0.LbekqN?8hCuNF' );

define( 'NONCE_KEY',        '#bUM+0=s&z5?jfw[;@JfUS<:*CF90Ehh <Q,,I+.Pw{KS3=eq2P*6(A5qS!)&v[Y' );

define( 'AUTH_SALT',        ')*4#H|bGg|cK`ICg$>.lKs%nmMKO/P-/H=g,7=_]OZeWV).~^5A[2qaqh5YcY`,F' );

define( 'SECURE_AUTH_SALT', 'hc%FlllPd:&+5H}7<ma)lZ >$fpyYyXmt|UMAj[QsG3)WU$p:?}z )fw}R&08;[w' );

define( 'LOGGED_IN_SALT',   ' ~)v|-eLFf.x0y8x.{I)kk}>I{w5c7 3?1OozzZsx?+m4k)`w[{-B}*>f$jqC}oP' );

define( 'NONCE_SALT',       '(<FIguM@G!^Ch&<xgDSkw5w~GK@1XL95O| 5/r)jWG=03ATt-UL{dd[kd/&Wnw&3' );



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

 * @link https://wordpress.org/support/article/debugging-in-wordpress/

 */

define( 'WP_DEBUG', true );



/* Add any custom values between this line and the "stop editing" line. */







/* That's all, stop editing! Happy publishing. */



/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}



/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

