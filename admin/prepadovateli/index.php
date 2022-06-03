<?php
        include "../../path.php";
        include "../../app/controllers/prepadovateli.php";
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
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Преподаватели</title>
</head>
<body>

<?php include("../../app/include/header-admin.php"); ?>

<div class="container">
<?php include "../../app/include/sidebar-admin.php"; ?>

        <div class="posts col-9">
            <div class="button row">
                <a href="<?php echo BASE_URL . "admin/prepadovateli/create.php";?>" class="col-2 btn btn-success">Создать</a>
                <span class="col-1"></span>
            </div>
            <div class="row title-table ">
                <h2 class = "mb-5" >Управление записями</h2>
                
                <div class="col-1">ID</div>
                <div class="col-3 text-center">ФИО</div>
                <div class="col-2">Дата рождения</div>
                <div class="col-2">Телефон</div>
                <div class="col-2">Управление записью </div>
            </div>
            <?php foreach ($prepadovateli as $prepadovatel): ?>
                <div class="row post">
                    <div class="id col-1"><?=$prepadovatel['id']?></div>
                    <div class="fio col-3"><?=$prepadovatel['fio_prepod'] ;?></div>
                    <div class="dateofbirthday col-2"><?=$prepadovatel['dateofbirthday']; ?></div>
                    <div class="phone col-2"><?=$prepadovatel['phone']; ?></div>
                    <!--  -->
                    <div class="red col-1"><a href="edit.php?id=<?=$prepadovatel['id'];?>">edit</a></div>
                    <div class="del col-1"><a href="index.php?del_id=<?=$prepadovatel['id'];?>">delete</a></div>
                    
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<!-- footer -->
<?php include("../../app/include/footer.php"); ?>
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
