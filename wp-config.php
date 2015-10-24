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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         '6kr<O~Lg6>S9KGO&]Pc(:2hYxVT#/-lOww.G;rt4;G?MV=X5y*~Z4LbQu-{y.C)C');
define('SECURE_AUTH_KEY',  'a[Pg/WG)?fVRcm6+D*d `8O?]O0~A]6$+ACQo_qJ+q-(M~of}WU{.`;@5+{`peLg');
define('LOGGED_IN_KEY',    'cJ:2_~myolwR;. DUFr}uji!J,&$mm: Cq-dvC1VzwE7k7D<dG|$FV^E%jk-3}pO');
define('NONCE_KEY',        'FpP2N+}]+V4P=;V(httPM7m|z~Oh=jwSf[?&hC,CjGsX*pG=DE:U3F?JQiZ_Ek`{');
define('AUTH_SALT',        'O)=yQ$R$,Z][VmA+LMP:YuWRglvs`r5$1&@,l5DkqQjejV+B-JU)|[yA98rWRZ4<');
define('SECURE_AUTH_SALT', '-if(<CB lQVQ/@aoMrflF,=*0*nhTVvvkT>?){LL1U45=U>&pw.-bq.CDZav-h<;');
define('LOGGED_IN_SALT',   'TsOg>%564_aV:$$~^N2hTX7u%X3B]-oh:Et-1x*Yni9T]$]4I-+yWiwZ?|<7G7ar');
define('NONCE_SALT',       'gL3277awGuK56?3~PB6.]Xx9pme/7_-#_u-?iz<2u&?X8|/=q+(z2veA5>#(|D);');

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
