<?php
    include "path.php";
    include "app/controllers/students.php";
    $id = $_GET['id'];
    $students = selectStudentsOnGroup('students',$id);
    $groupp = selectOne('groups', ['id' => $_GET['id']]);
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Студенты группы <?=$groupp['name']; ?></title>
</head>
<body>


<?php include("app/include/header.php"); ?>
<!-- блок main-->
<div class="container">
    <div class="content row">
        <!-- Main Content -->
        <div class="main-content col-md-9 col-12">
            <h2>Студенты группы <strong><?=$groupp['name']; ?></strong></h2>
            <div class="row title-table ">
                
                <div class="col-6 text-center">ФИО студента</div>
                <div class="col-6 text-center">Дата рождения</div>
            </div>
            <hr>
            <?php foreach ($students as $student): ?> 
                <hr><div class="row post">
                        <!-- <div class="col-1"><a href="#id=<?=$student['id'];?>"><?=$student['id'];?></a></div> -->
                        <div class="col-6 text-center"><?=$student['fio_stud'];?></div>
                        <div class="col-6 text-center"><?=$student['dateofbirthday'];?></div>
                    </div><hr>
                    <?php endforeach; ?>

        </div>
        <!-- sidebar Content -->
        <div class="sidebar col-md-3 ">
        
            <!-- <div class="section search">
                <h3>Поиск</h3>
                <form action="search.php" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Введите текст...">
                </form>
            </div> -->


            <div class="section topics">
                <h3>Категории</h3>
                <ul>
                    <li>
                    <div class="accordion" id="menu">
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#item-2">
                            Список групп
                          </div>
                        </h2>
                        <div id="item-2" class="accordion-collapse collapse" data-bs-parent="#menu">
                        <hr> <div class="accordion-body">
                          <?php foreach ($groups as  $group): ?>
                            <a href="<?=BASE_URL . 'category.php?id=' . $group['id']; ?>"><?=$group['name']; ?></a>
                          <?php endforeach; ?><hr> 
                        </div>
                        </div>
                      </div>
                          </div>
                    </li>
                    <li>
                    <a href="<?=BASE_URL . 'prepadovateli.php' ?>">Преподаватели</a> 
                    </li>
                    <li>
                    <a href="<?=BASE_URL . 'predmeti.php' ?>">Предметы</a> 
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>

<!-- блок main END-->
<!-- footer -->
<?php include("app/include/footer.php"); ?>
<!-- // footer -->


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
-->
</body>
</html>