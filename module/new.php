<?php

if (isset($_POST['title']))
{
    
    
    $title = filter_input(INPUT_POST, 'title');
    $content = filter_input(INPUT_POST, 'content');
    $date = new MongoDate(  strtotime('now') );
    
    $post = array(
        'title' => $title,
        'content' => $content,
        'comments' => array(),
        'num_comment' => 0,
        'post_date'  => $date
    );
    ;
    
     if ( $postCollection->insert( $post ) )
     {
        $mongodb->selectCollection('option');
        $option  = $mongodb->collection;
        $item = $option->findOne(array('label'=>'num_count'));
        $item['value']++;
        
        $option->save($item);
        
     }
     
        
    header("Location: index.php");
}

include 'sublayout/header.php';
?>
<form action="?page=new" method="POST" >
    <p>
        <label>Title</label>
        <input type="title" name="title" value="" />
    </p>
    <p>
        <label>Content</label>
        <textarea name="content"></textarea>
    </p>
    <input type="submit" class="btn" value="Submit" />
</form>
<?php
include 'sublayout/footer.php';