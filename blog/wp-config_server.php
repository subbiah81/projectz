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
define('DB_NAME', 'u890471436_blog');

/** MySQL database username */
define('DB_USER', 'u890471436_blog');

/** MySQL database password */
define('DB_PASSWORD', '0fF@rs8o5');

/** MySQL hostname */
define('DB_HOST', 'mysql.hostinger.co.uk');

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
define('AUTH_KEY',         'iH1RY`~LghUn7PeX;lBt#N8%->_+OjW-VW>JV%^2NU}34?u@rVC(<(++bFN:[E*#');
define('SECURE_AUTH_KEY',  'hF `&lx+JxWL|i|aSS`S5FQ2|fwZc|3-z.Uw>!$zaTWR+.3r)}p$[s^Hn]j{-Wp+');
define('LOGGED_IN_KEY',    'aVJ4pctiJnW`BfdqfO :9;4YnH8AX;>M0wZ<T<euqT9;.E5oOI{A?/p!!Q/OgP:6');
define('NONCE_KEY',        'f~@HB$H{k,<LiUoBZ@dwYsRr5,gT8 wQ[fEp*#YPbA4*rkl L^*9Rl}4~Gt:uWr&');
define('AUTH_SALT',        'y*@k[)d-F?3t)rg{^tv 6*a)tI2#K<s7G@bOLC(,*OR|-0$9KH<.+o<A~:U&J|)(');
define('SECURE_AUTH_SALT', '4C6uTb[|8+~Qi fGq4+)1^i8+cp~=w/98E)[_,${e49~FR>MLg?e|E<+ h`ezKe+');
define('LOGGED_IN_SALT',   '`AI&3`+DWy??+ZNM4Wk^c7:$q39`V($}UDM+<EdHK{Pny-N U$VcxY#+H}}Oxqg/');
define('NONCE_SALT',       '^C@>P4qE}K(%Crc3r-mmJ/6R0]FYFo#:pPk=H0srkNCMYU.t-wi3t6R)`~/CV#!:');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
require_once(ABSPATH . 'wp-settings.php');
