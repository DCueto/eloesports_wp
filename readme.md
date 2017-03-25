Readme
====================

Estructura de repositiorio
---------------------

El repositorio tiene 2 brancas, la branca "local" donde está la versión de Wordpress adaptada para el servidor local, y está la versión "production" que está adaptada al servidor de producción.
Siempre que se quiera hacer un push al repositorio hay que tener en cuenta que versión de Wordpress estás tocando.

### Pasar a versión local

#### Base de datos
Crea una base de datos que se llame "eloesports". El phpmyadmin ya te proporcionará un usuario "root" sin contraseña y apuntando a localhost.

#### Archivo wp-config.php
> Tiene que tener como usuario "root", sin contraseña, la base de datos "eloesports" y el host en "localhost".


#### SQL
Si quieres cambiar de producción a local tienes que exportar la base de datos del phpmyadmin del servidor de producción (el archivo será un .sql), e importar ese sql a la base de datos local.
La base de datos tiene que tener los enlaces con "http://localhost/eloesports". Para poder cambiar de "http://eloesports.com" a "http://localhost/eloesports" tienes que acceder desde la base de datos "eloesports" en phpmyadmin, entrar en SQL y ejecutar el siguiente código SQL:

>UPDATE wp_options SET option_value = 
>REPLACE(option_value, 'http://eloesports.com', 'http://localhost/eloesports') 
>WHERE option_name = 'home' OR option_name = 'siteurl';
 
>UPDATE wp_posts SET guid = REPLACE(guid, 'http://eloesports.com', 'http://localhost/eloesports');
 
>UPDATE wp_posts SET post_content = 
>REPLACE(post_content, 'http://eloesports.com', 'http://localhost/eloesports');
 
>UPDATE wp_postmeta SET meta_value = 
>REPLACE(meta_value, 'http://eloesports.com', 'http://localhost/eloesports');

#### Enlaces absolutos en el tema
Tienes que cambiar algunos enlaces absolutos del tema que dirijen a "http://eloesports.com" y no a "http://localhost/eloesports".

#### Error "Objeto no encontrado!"
Simplemente accede a "Ajustes/Enlaces Permanentes" y dale a guardar.