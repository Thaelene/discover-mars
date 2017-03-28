<?php

include 'include/config.php';

// Routing
$q = !empty($_GET['q']) ? $_GET['q'] : '';

if($q == '')
{
	$page = 'home';
}
else if ($q == 'dashboard')
{
	$page = 'dashboard';
}
else
{
	$page = '404';
}

// Includes
include 'views/partials/header.php';
include 'views/pages/'.$page.'.php';
include 'views/partials/footer.php';
