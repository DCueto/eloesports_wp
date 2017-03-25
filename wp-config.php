<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'eloesports');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '1Hs5e@U/;H5G)|SDDC1yzGhmixT5m~l*:Da+no#uFJT<~_f//K3-l,h|b4-.8AVa');
define('SECURE_AUTH_KEY', '=oOjk%18{h`} AM$bG6oPPkTi+Cy(Um]!zV[^)HUMc4Iei|&WcP0O/!f~*Q?CV]m');
define('LOGGED_IN_KEY', '9Dfp+y^gT}{e!74BQY_B/RDn#MDfC>v)4U}jCps}&$+%|G}4[vSD@`cGS U0pN^:');
define('NONCE_KEY', '(]R}so[?VxG 15NUvg4(X(EFTJM94%X)qRd8t[Q4(rS%SHW5]dw4v4T$<<fmH`4<');
define('AUTH_SALT', 'WJl2AyXVk1lLHZc$]/F6# uwoQ2<b5{IF$A5Yt[LbIA~AZv[2uH=%y:;{RXXUSWe');
define('SECURE_AUTH_SALT', 'EwPqlYHCCbk|Gfazds7nUPJv{s@`:e$i:*0oxL<{ -?CgYm}yRx(g7JP{gxoP H4');
define('LOGGED_IN_SALT', '|uY|gn8s`3~@ui[4MlT+MITwS0Z7Q(V:zh`8g+hvt+tA,|+qHS[{(~czAoC)D A#');
define('NONCE_SALT', '4E0Zrx~gK^6BT[}kuVDj)9yPLIL hV~+rg#~6%%EX2ve?e7haEWz967THC-dgb(b');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

