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
 * @link    https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// Project root path
$root = dirname(__DIR__);

// Composer autoloader
require_once $root.'/../vendor/autoload.php';

// dotenv
$dotenv = new Dotenv\Dotenv($root.'/../');
$dotenv->load();

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('DB_DATABASE'));

/** MySQL database username */
define('DB_USER', getenv('DB_USER'));

/** MySQL database password */
define('DB_PASSWORD', getenv('DB_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', getenv('DB_SERVER'));

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_HOME', getenv('SITE_URL'));
define('WP_SITEURL', getenv('SITE_URL').'/wordpress');

define('DISALLOW_FILE_EDIT', true);

define('WP_AUTO_UPDATE_CORE', true);

define('DISABLE_WP_CRON', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '(!-1j}%B kc^m{cKdKzk_ pRC]1u||]:Cn6`phh1TaHkxC,F[5$jPo!R~=}Z?Z|d');
define('SECURE_AUTH_KEY',  '1bQ.Q]2L,j68ZkoeTH/pehbn)_3R8(_5|tS6O%L&<dix%SRK8.^F<sr|ZKJU-=<4');
define('LOGGED_IN_KEY',    'BQ`frR^M29LX+ElxU:20T{6I3~QDUmCslVGoK6+Uu>ucNdEIrmTgPzIjVrQ:q=g;');
define('NONCE_KEY',        '[n|2>Y:c&Z6z[DxWE~p2w0m(:-vXUn6S^A^k|`;t}_zRZrZ@(`7|^TP}G;s)MZml');
define('AUTH_SALT',        'OOLp=OGZolQ-c|Pr2</&7q|wY){:vT6-#NoSro3E[>lnq?W}!G=%lDuu;iF`!ygp');
define('SECURE_AUTH_SALT', 'G+0|9*G^Osdr-)PT-3@`aL9Nm-dY2kqJ{)qXENR+/-5lWJ>^G81R<Hg`[>AE_Z`(');
define('LOGGED_IN_SALT',   ';+dPMX^ Xn.6CxEyjmT-+sy1|Sd~Z^9+9MX+%bR|o+^X CumHK|SlH3kN,=*x,7p');
define('NONCE_SALT',       '>V1GPb=SNH/vMVM|Jn2Ykg[6p#dEXq`=p-F9q$Q;:]/cY;Rm|Lnn-E&L<+@FrYFP');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = getenv('DB_TABLE_PREFIX');

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
define('WP_DEBUG', filter_var(getenv('DEV_MODE'), FILTER_VALIDATE_BOOLEAN));

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__).'/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH.'wp-settings.php');
