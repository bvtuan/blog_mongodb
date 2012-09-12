<?php
    include 'sublayout/header.php';
    $result = $postCollection->find();
    
    foreach ($result as $post) :?>

        <div class="post_item" >
            <ul>
                <li>
                    <a href="?page=view&id=<?php  echo $post['_id']; ?>"><?php echo $post['title']; ?></a>
                    <p><?php echo $post['content']; ?></p>
                </li>
            </ul>
            
        </div>
    <?php endforeach;
    
    include 'sublayout/footer.php';
    