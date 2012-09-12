<?php
require_once 'mongo.php';
global $mongodb;
global $postCollection;
$page = 'index';

if ( isset($_GET['page']) )
{
    $page = $_GET['page'];
}

$module_file = 'module/'.$page.'.php';
if (!file_exists($module_file))
{
    die('not found module '.$module_file);
}

require $module_file;
exit;