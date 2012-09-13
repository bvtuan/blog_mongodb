<?php
$id = filter_input(INPUT_POST, 'id');
$content = filter_input(INPUT_POST, 'content');

$theObjId = new MongoId($id); 
$result =  $postCollection->findOne(array('_id'=>$theObjId));

if ($content == NULL || $content == "" )
    die('content can not empty');
array_push($result['comments'], $content);
//Add count num_comment
$result['num_comment']++;

$postCollection->update( array('_id' => $theObjId ) , $result  );
$link = "index.php?page=view&id=".$id;

header("Location: $link");