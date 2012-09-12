<?php
include 'sublayout/header.php';
$id = filter_input(INPUT_GET, 'id');
$theObjId = new MongoId($id); 
$per_page = 3;

$page_id = (isset($_GET['page_id'])) ? $_GET['page_id'] : 1;     
$start = ( $page_id -1 ) * $per_page;

$end = $start + $per_page;

$result =  $postCollection->findOne(array('_id'=>$theObjId ) , array('comments' => array('$slice' => array($start, $end))));

?>

<h2><?php echo $result['title']; ?></h2>
<p>
    <?php echo $result['content']; ?>
</p>

<?php

$comment_count = $result['num_comment'];
if ($comment_count>0)
{
   $per_page = 3;
   $pages = ceil($comment_count / $per_page);
    if ($page_id>=1 && $page_id <=$pages  && $comment_count > $per_page)
   {
     for ($index = 1; $index <= $pages; $index++)
     {
       echo "<a href=?page=view&id=$id&page_id=$index>$index</a> "; 
     }
  }
} 



?>







<ol>
    <?php    foreach ($result['comments'] as $item) :?>
    <li><p>
            <?php echo $item; ?>
        </p></li>
    <?php    endforeach; ?>
</ol>
<form action="?page=addcomment" method="POST" >
    <input type="hidden" name="id" value="<?php echo $result['_id']; ?>" />
    <p>
        <label>Content</label>
        <textarea name="content"></textarea>
    </p>
    <input type="submit" value="Submit" />
</form>
<?php
    include 'sublayout/footer.php';
?>
