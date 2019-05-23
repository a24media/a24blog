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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'ldg*?m]#D`oi#U:%I)[H`_EuvKNi7!kYie-8F=imQzJm4HHmm%0}R5qXrj)9H29v' );
define( 'SECURE_AUTH_KEY',  's12O`Jtg->_JYL}x=6]mZJl|$A~mPO-y.=Z@.C,_a8/(fJNK_fHf31j(qHLW1]9F' );
define( 'LOGGED_IN_KEY',    'vlFAe^.HBVR3o?S|fsdJE{uY@?CX`} @VM=WMb3+JpR+8ydi;a2(Fx]mS [,wBy}' );
define( 'NONCE_KEY',        'o)u50elBw&B8F)Tk(I?rmo.&!z0=Q[*c]H2rpW(m8=s1~IDl}Umo(?:O,}8#_{u ' );
define( 'AUTH_SALT',        'ofXXG143L)iyUo2Su9[o&:?02o6&!+sZP$/t{aa+lpJ^Z~[~kt1MslK{Ur>Ows&;' );
define( 'SECURE_AUTH_SALT', 'Qj}vBL?(z;ym*A+I4QOtC6|h=Wqv{E6/eAWv!LU0)]UEULbF{n%v.ULQ~M>=r-&v' );
define( 'LOGGED_IN_SALT',   'a8Rc,-$48.Lcw&nmASUr~bM&r0#90j)S8lA:2R(b 2>tRa2bSlZ]v.G5y fnnb:G' );
define( 'NONCE_SALT',       ' /]/t&PF0n_Uu~WhEHa5TmJ8eScl_HnF{P(. mv93`E>#:^,($hcv7k6RynaWnW`' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
