<?php
include SITE_ROOT . "/app/database/db.php";

$errMsg = '';
$id = '';
$name = '';

$groups = selectAll('groups');


// Код для формы создания категории
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_group'])){
    $name = trim($_POST['name']);

    if($name === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($name, 'UTF8') < 2){
        $errMsg = "Группа должна быть более 2-х символов";
    }else{
        $existence = selectOne('groups', ['name' => $name]);
        if($existence['name'] === $name){
            $errMsg = "Такая группа уже есть в базе";
        }else{
            $group = [
                'name' => $name
            ];
            $id = insert('groups', $group);
            $group = selectOne('groups', ['id' => $id] );
            header('location: ' . BASE_URL . 'admin/groups/index.php');
        }
    }
}else{
    $name = '';
}


// Апдейт категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id = $_GET['id'];
    $group = selectOne('groups', ['id' => $id]);
    $id = $group['id'];
    $name = $group['name'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_group'])){
    $name = trim($_POST['name']);

    if($name === '' ){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($name, 'UTF8') < 2){
        $errMsg = "Группа должна быть более 2-х символов";
    }else{
        $group = [
            'name' => $name
        ];
        $id = $_POST['id'];
        $group = update('groups', $id, $group);
        header('location: ' . BASE_URL . 'admin/groups/index.php');
    }
}

// Удаление категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    delete('groups', $id);
    header('location: ' . BASE_URL . 'admin/groups/index.php');
}