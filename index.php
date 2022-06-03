<?php
    
    
    include "path.php";
    include "app/controllers/vedomosti.php";

    $groups = selectAll('groups');

    $vedomostiongroup = selectVedomosti();

?>
<!doctype html>
<html lang="ru">
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


    <title>СУУ</title>
</head>
<body>

<?php include("app/include/header.php"); ?>

<!-- блок main-->

<div class="container-fluid">
<div class="accordion accordion-flush" id="accordionFlushExample">

    <div class="content row">
        <!-- Main Content -->
        <h1 class="mt-5 text-center col-12">Успеваемость студентов</h1>

        <div class="main-content col-md-10 ">
        <h3 class=" text-center mt-12 mb-5">Список ведомостей</h3>
        <div class="row title-table ">
                <div class="col-1 text-center">Семестр</div>
                <div class="col-2 text-center">Группа</div>
                <div class="col-3 text-center">Студент ФИО</div>
                <div class="col-2 text-center">Предмет</div>
                <div class="col-3 text-center">Преподаватель ФИО</div>
                <div class="col-1 text-center">Оценка </div>           
            </div>
          <?php  include"db.php" ?>
            <!-- <?php foreach ($vedomosti as $vedomost): ?>
                <div class="row  text-center">
                    <div class=" col-1 text-center"><?=$vedomost['semestr']?></div>
                    <div class="col-2 text-center"><?=$vedomost['gruppa']?></div>
                    <div class="col-3 text-center"><?=$vedomost['fio_stud']; ?></div>
                    <div class="col-2 text-center"><?=$vedomost['name']; ?></div>
                    <div class="col-3 text-center"><?=$vedomost['fio_prepod']; ?></div>
                    <div class=" col-1 text-center"><?=$vedomost['ocenka']; ?></div>
                </div>
            <?php endforeach; ?> -->
            <!-- <div class="posts col-11" id="employee_data">
            <div id="searchresults">Результаты для <span class="word"></span></div>
          <ul id="results" class="update">
                </ul> -->
            <!-- </div> -->
        </div>
        <!-- sidebar Content -->
        <div class="sidebar col-md-2 ">
        
            <div class="section search">
                <h3>Поиск</h3>
              <form method="post" >
                  <input type="text" name="search"  class='search'  placeholder="ФИО студента">
                  <input type="submit" value="Поиск" name = "submit" class="button" ><br />
              </form>
            </form>
            </div>
            
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
                          <div class="accordion-body">
                          <?php foreach ($groups as  $group): ?>
                            <a href="<?=BASE_URL . 'category.php?id=' . $group['id']; ?>"><?=$group['name']; ?></a>
                          <?php endforeach; ?>
                        </div>
                        </div>
                      </div>
                          </div>
                    </li>
                    <li>
                    <a href="<?=BASE_URL . 'prepadovateli.php' ?>">Преподаватели</a> 
                    </li>
                    <li>
                    <a href="<?=BASE_URL . 'predmeti.php'?>">Предметы</a> 
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<!-- <script src = 'search.js'></script> -->
<script type="text/javascript">

$(function() {

    $(".search_button").click(function() {
        // получаем то, что написал пользователь
        var searchString    = $("#search_box").val();
        // формируем строку запроса
        var data            = 'search='+ searchString;

        // если searchString не пустая
        if(searchString) {
            // делаем ajax запрос
            $.ajax({
                type: "POST",
                url: "search.php",
                data: data,
                beforeSend: function(html) { // запустится до вызова запроса
                    $("#results").html('');
                    $("#searchresults").show();
                    $(".word").html(searchString);
               },
               success: function(html){ // запустится после получения результатов
                    $("#results").show();
                    $("#results").append(html);
              }
            });
        }
        return false;
    });
});
</script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
-->
</body>
</html>