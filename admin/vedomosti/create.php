<?php

    include "../../path.php";
    include "../../app/controllers/vedomosti.php";
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
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Заполнение ведомости</title>
</head>
<body>

<?php include("../../app/include/header-admin.php"); ?>

<div class="container">
    <?php include "../../app/include/sidebar-admin.php"; ?>

        <div class="posts col-9">
          
            <div class="row title-table">
                <h2>Заполнение ведомости</h2>
            </div>
            <div class="row add-post">
            <div class="mb-12 col-12 col-md-12 err">
                    <!-- Вывод массива с ошибками -->
                    <?php include "../../app/helps/errorInfo.php"; ?>
                </div>
            
                <form action="create.php" method="post" enctype="multipart/form-data">

                <h5>Семестр:</h5>    
                    <select name="semestr" class="form-select mb-3" aria-label="Default select example">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                    </select>
                <h5>Студент:</h5>   
                    <select name="student" class="form-select mb-3" aria-label="Default select example">
                         <?php foreach ($students as $student): ?>
                            <option value="<?=$student['id']; ?>"><?=$student['fio_stud'] ;?></option>
                        <?php endforeach; ?>                            
                    </select>
                <h5>Предмет:</h5>   
                    <select name="predmet" class="form-select mb-3" aria-label="Default select example">
                         <?php foreach ($predmeti as $predmet): ?>
                            <option value="<?=$predmet['id']; ?>"><?=$predmet['name'];?></option>
                        <?php endforeach; ?>                            
                    </select>   
                <h5>Преподаватель:</h5>   
                    <select name="prepadovatel" class="form-select mb-3" aria-label="Default select example">
                         <?php foreach ($prepadovateli as $prepadovatel): ?>
                            <option value="<?=$prepadovatel['id']; ?>"><?=$prepadovatel['fio_prepod'];?></option>
                        <?php endforeach; ?>                            
                    </select> 
                <h5>Оценка:</h5>    
                    <select name="ocenka" class="form-select mb-3" aria-label="Default select example">
                            <option value="удовл">удовл</option>
                            <option value="хорошо">хорошо</option>
                            <option value="отлично">отлично</option>
                            <option value="зачёт">зачёт</option>
                            <option value="незачёт">незачёт</option>
                    </select>

                    <div class="col col-6">
                        <button name="add_vedomost" class="btn btn-success" type="submit">Добавить запись</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- footer -->
<?php include("../../app/include/footer.php"); ?>
<!-- // footer -->


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<!-- Добавление визуального редактора к текстовому полю админки -->
<script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
-->

<script src="../../assets/js/scripts.js"></script>
</body>
</html>
