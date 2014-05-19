<?php
/**
 * Index
 * 
 * This page is where .htaccess directs all URLs that don't map directly to a page,
 * so they can be handled by our router.
 *
 * $Id: index.php 5519 2013-07-22 15:23:41Z jamescollier $
 */

require("eb_include/common.php");

$router = new Router;
$router->dispatch();

?>