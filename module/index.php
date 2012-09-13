<?php
    include 'sublayout/header.php';
    $s = array('post_date'=>-1);
    
    $page_id = 1;
    $per_page = 10;
    
    if (isset($_GET['page_id']))
    {
        $page_id  = $_GET['page_id'];
    }
    
    $result = $mongodb->collection->find()->sort($s)->limit($per_page)->skip(($page_id-1) * $per_page );
    echo '<ol>';
    foreach ($result as $post) :?>
    
                <li>
        <div class="post_item" >
        
                    <a href="?page=view&id=<?php  echo $post['_id']; ?>"><?php echo $post['title']; ?></a>
                    <small>
                        <?php 
                        $num_comment = $post['num_comment'];
                        if ($num_comment == 0)
                            echo '0 comment';
                        else
                            echo "$num_comment comments";
                        ?>
                        </small>
                    <p><?php echo $post['content']; ?></p>
                
            
            
        </div>
                    </li>
    <?php endforeach;
    echo '</ol>';

$item = $mongodb->selectCollection('option')->findOne(array('label'=>'num_count'));
$page_count = $item['value'];
if ($page_count>0)
{
   
   $pages = ceil($page_count / $per_page);
   
    if ($page_id>=1 && $page_id <=$pages  && $page_count > $per_page)
   {
     for ($index = 1; $index <= $pages; $index++)
     {
       echo "<a href=?page=index&page_id=$index>$index</a> "; 
     }
  }
} 



    include 'sublayout/footer.php';
    