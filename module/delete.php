<?php
include 'sublayout/header.php';
$id = filter_input(INPUT_GET, 'id');
$theObjId = new MongoId($id); 

$result =  $postCollection->remove(array('_id'=>$theObjId) , array("safe" => true) );

echo 'ok';
?>