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
define('DB_NAME', 'solarize');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'iU|*$CMF--`-hlU,EPZee14}^p}XEr+K_--51hUwH;-(0bL-p,)Y5i/~U!FU~40K');
define('SECURE_AUTH_KEY',  '?X@C?=Y3c)-mD<345zG`-oj%:5r|og>$OhV{&-~/a lYkf+|P/20?`VV4<U;Yl=l');
define('LOGGED_IN_KEY',    '8-{S2$~i:pXFc&q^Djqw|uR%URPL,)%iJjj`QBgq+U7=Y; yh^X{zEOZdI+l,x0?');
define('NONCE_KEY',        '%nkF2=Y]XsJ5=k4|$/A|^t0b)*-aDB=m-MO5)csgt&0Aw$Iy+><-p*6>~=.5|I=4');
define('AUTH_SALT',        'R:!w*~99)0H`#b]z)3x1QX*UY/8C.&BiT]}.2*uvMh@|=k+zW7-(lj1~:y|,y{&[');
define('SECURE_AUTH_SALT', 'pQ-5hFsQGyiE#Xi>TPEXvPshX??UzZ][FR&u-YmFJ-t@x|NIV/a(**Sd8y6 g@W$');
define('LOGGED_IN_SALT',   '6mFY)I918R(EpF(az-BQZf!d<,6G[H5_{/--RN2|Av:6(,vdUerL|,ep=?4Zy|W/');
define('NONCE_SALT',       '6Q~o:kHdzL]Z3y|)QxEQzr6vvOv9$$ 1;y^=:Xzy3*g!;0^9CEl.hEgu{pl?k~^D');

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
