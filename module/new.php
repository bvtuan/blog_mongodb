<?php

if (isset($_POST['title']))
{
    $title = filter_input(INPUT_POST, 'title');
    $content = filter_input(INPUT_POST, 'content');
    $post = array(
        'title' => $title,
        'content' => $content,
        'comments' => array(),
        'num_comment' => 0
    );
    
    $postCollection->insert( $post );
    echo 'add success';
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
    <input type="submit" value="Submit" />
</form>
<?php
include 'sublayout/footer.php';