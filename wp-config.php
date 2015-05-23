<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ecommez1_lakemeaway');

/** MySQL database username */
define('DB_USER', 'ecommez1_lakemea');

/** MySQL database password */
define('DB_PASSWORD', '$wdc@wp#15');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'L2!&%%bSm9n|>42:|ch+ak+n:Mk`Z`@?yx~L@SDxE?wO7O~H}>J/i5jHITS?={+|');
define('SECURE_AUTH_KEY',  'U.6sO?-rnE3K81;:p|.I-W7@88Hl|Rl-QH^KqI(0PUT| uTb)n<Gez8Hs/)B<D-M');
define('LOGGED_IN_KEY',    'C% }b[3_:3942m@<jm<G^VeH=p}0]`TD)*xdGp--eX.2b[T+B{s)pE:5P9kh}rI+');
define('NONCE_KEY',        'c|@Q(}8|>]=leK#maN_K)^sO*+O3@Sck,rkUj-ZhXitKiRM^HZ=|V+EVZ,?|w[x3');
define('AUTH_SALT',        '0[@,$y3ip%9Bayx<[WbG(KX6eb.A>P!2(~7^F|KKO~&@].23A>ALIo*R{5c0(nFI');
define('SECURE_AUTH_SALT', '!^{V#tD4*<LpkMw~ Yu9t 488OpNmE;s%1;*2_z)/_<(XY7W/4_Z0S+3#v]D+1+{');
define('LOGGED_IN_SALT',   '=:g>{Y_Et9*Cs%U7{[AgAcWw^|y2Ik*ddOH-bBL6jLkeMiv.mt=xCi%7m!:3h&gd');
define('NONCE_SALT',       '+!(B3b0vk>D-r.A9cMnQdFl6&_;e5r|XkSp..XP|s|K=-][U2g@^.9SWY,{Ewk3d');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
