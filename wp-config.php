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
define( 'DB_NAME', "newshop" );

/** Database username */
define( 'DB_USER', "root" );

/** Database password */
define( 'DB_PASSWORD', "" );

/** Database hostname */
define( 'DB_HOST', "localhost" );

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
define( 'AUTH_KEY',         'Qtj,J.r/BmP$NCVFVo2#c3L/i}I~6Xth*{E%OK+<Dr/]H4kC/I(SDL^#P&6*(agx' );
define( 'SECURE_AUTH_KEY',  '`=$=Ea4FL43V(;@_b#p_H>v>&u}h)lmnM[^?~GSVv*cbMt([E?H?WvRb`G5-]ULV' );
define( 'LOGGED_IN_KEY',    'eBkBy{A6e;PNAQbrK %<)KB {4,:YyaE*F}r41;-(Y_v<;fhcGE)|i[L{-aLoIl%' );
define( 'NONCE_KEY',        'd,vuDo+ 4)RNzmtA-3;h]O%Oj>t&S}*dJGBluYA:!ye.1J/zIIybw$!krsqFbNQm' );
define( 'AUTH_SALT',        '|.mnn(R=SpQAM0rx%tbcL)8)cR1 }b&b6x6p5-F8A|T+>Vq{gA}Skr$A_&PeH-e:' );
define( 'SECURE_AUTH_SALT', '/ 4 &A#dHv}<w1GZX%;eD7;Nju?Ae3`I|DN5iCma<@4Hm9:6LK T/`6Qx_NU#9^,' );
define( 'LOGGED_IN_SALT',   'q q$urBrW$[,/c|_>& UW#Zp2RSgHkFc$ZRPZ$vuWAJds~h,bFvqEZlkR7APS|$9' );
define( 'NONCE_SALT',       'A:=swA?/3 o4{2gmqXIXvn7Jd_XKd[.meM<6A.>B&~ 38EeT3n] SllgL)`X^z&&' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



define( 'WP_SITEURL', 'http://localhost/newshop/' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
