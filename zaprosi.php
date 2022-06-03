<?php
require 'app/database/db.php';
// $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// $query = $pdo -> prepare("SELECT * FROM `groups`");

// $query -> execute();

// $groups = $query -> fetchAll();
// echo $groups;
// $groups['id_group'] = $id_group ;
$groups = selectAll('groups');
$id =  $groups['id_group'];
    $name =  $groups['name'];
?>                                                                                  


<!-- в таблицу выводим с условием. в where будет стоять переменная полученная постом когда нажали на вкладку и она рскрылась -->



<?php foreach ( $id as $key => $groups): ?>
    <div class="accordion-item">
    <h2 class="accordion-header" id="flush-heading<?=$groups['id_group'];?>">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$groups['id_group'];?>" aria-expanded="false" aria-controls="flush-collapse<?=$groups['id_group'];?>">
        <?=$groups['name'];?>
        
      </button>
    </h2>
    <div id="flush-collapse<?=$groups['id_group'];?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?=$groups['id_group'];?>" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
    </div>
  </div>
  <?php endforeach; ?>









    <?php foreach ($postsAdm as $key => $post): ?>
                <div class="row post">
                    <div class="id col-1"><?=$key + 1; ?></div>
                    <div class="title col-5"><?=mb_substr($post['title'], 0, 50, 'UTF-8'). '...'  ?></div>
                    <div class="author col-2"><?=$post['username']; ?></div>
                    <div class="red col-1"><a href="edit.php?id=<?=$post['id'];?>">edit</a></div>
                    <div class="del col-1"><a href="edit.php?delete_id=<?=$post['id'];?>">delete</a></div>
                    <?php if ($post['status']): ?>
                        <div class="status col-2"><a href="edit.php?publish=0&pub_id=<?=$post['id'];?>">unpublish</a></div>
                    <?php else: ?>
                        <div class="status col-2"><a href="edit.php?publish=1&pub_id=<?=$post['id'];?>">publish</a></div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>