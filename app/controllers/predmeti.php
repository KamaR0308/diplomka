<?php
include SITE_ROOT . "/app/database/db.php";

$errMsg = '';
$id = '';
$name = '';
$prepadovateli = selectAll('prepadovateli');
$predmeti = selectPredmetiAndPrepodavateli('prepadovateli','predmeti');
//$predmeti = selectAll('predmeti');
// Код для формы создания предмета
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_predmet'])){
    $name = trim($_POST['name']);
    $prepadovatel = trim($_POST['prepadovatel']);
    if($name === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($name, 'UTF8') < 2){
        $errMsg = "Название предмета должно быть более 2-х символов";
    }else{
        $existence = selectOne('groups', ['name' => $name]);
        if($existence['name'] === $name){
            $errMsg = "Такой предмет уже есть в базе";
        }else{
            $predmet = [
                'name' => $name,
                'id_prepadovatel' => $prepadovatel,
            ];
            $id = insert('predmeti', $predmet);
            $predmet = selectOne('predmeti', ['id' => $id] );
            header('location: ' . BASE_URL . 'admin/predmeti/index.php');
        }
    }
}else{
    $name = '';
    $prepadovatel = '';
}


// Апдейт категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id = $_GET['id'];
    $predmet = selectOne('predmeti', ['id' => $id]);
    $id = $predmet['id'];
    $name = $predmet['name'];
    $prepadovatel = $predmet['id_prepadovatel'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_predmet'])){
    $name = trim($_POST['name']);
    $prepadovatel = trim($_POST['prepadovatel']);
    if($name === '' ){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($name, 'UTF8') < 2){
        $errMsg = "Название предмета должно быть более 2-х символов";
    }else{
        $predmet = [
            'name' => $name,
            'id_prepadovatel' => $prepadovatel,
        ];
        $id = $_POST['id'];
        $predmet = update('predmeti', $id, $predmet);
        header('location: ' . BASE_URL . 'admin/predmeti/index.php');
    }
}

// Удаление категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    delete('predmeti', $id);
    header('location: ' . BASE_URL . 'admin/predmeti/index.php');
}