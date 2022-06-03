<?php
include SITE_ROOT . "/app/database/db.php";

$errMsg = [];
$id = '';
$group = '';
$fio_prepod = '';
$dateofbirthday = '';
$phone = '';


$prepadovateli = selectAll('prepadovateli');

// Код для формы создания студента
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_prepadovatel'])){
   
    $fio_prepod = trim($_POST['fio_prepod']);
    $dateofbirthday = trim($_POST['dateofbirthday']);
    $phone = trim($_POST['phone']);


    if($surname === ''  || $firstname === ''  || $dateofbirthday === ''  || $phone === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif (mb_strlen($phone, 'UTF8') != 11){
        array_push($errMsg, "Номер телефона должнен быть 11 символов");
    }else{
            $prepadovatel = [
                'fio_prepod' => $fio_prepod,
                'dateofbirthday' => $dateofbirthday,
                'phone' => $phone
            ];
            $prepadovatel = insert('prepadovateli', $prepadovatel);
            $prepadovatel = selectOne('prepadovateli', ['id' => $id] );
            header('location: ' . BASE_URL . 'admin/prepadovateli/index.php');
        }
    
}else{
    $id = '';   
    $fio_prepod = '';
    $dateofbirthday = '';
    $phone = '';
}


// Апдейт категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $prepadovatel = selectOne('prepadovateli', ['id' => $_GET['id']]);
    
    $id =  $prepadovatel['id'];
    $fio_prepod = $prepadovatel['fio_prepod'];
    $dateofbirthday = $prepadovatel['dateofbirthday'];
    $phone = $prepadovatel['phone'];

}
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_prepadovatel'])){
    $id =  $_POST['id'];
    $fio_prepod = trim($_POST['fio_prepod']);
    $dateofbirthday = trim($_POST['dateofbirthday']);
    $phone = trim($_POST['phone']);

    if($surname === ''  || $firstname === ''  || $dateofbirthday === ''   || $phone === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif (mb_strlen($phone, 'UTF8') != 11){
        array_push($errMsg, "Номер телефона должнен быть 11-х символов");
    }
        else{
        $prepadovatel = [
            'fio_prepod' => $fio_prepod,
            'dateofbirthday' => $dateofbirthday,
            'phone' => $phone
        ];
     
        $prepadovatel= update('prepadovateli', $id, $prepadovatel);
        header('location: ' . BASE_URL . 'admin/prepadovateli/index.php');
    }
}
// else{
//     $id_student =  $student['id'];
//     $group = $student['id_group'];
//     $surname = $student['surname'];
//     $firstname = $student['firstname'];
//     $secondname = $student['secondname'];
//     $dateofbirthday = $student['dateofbirthday'];
//     $pasport = $student['pasport'];
//     $phone = $student['phone'];
// }

// Удаление категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    delete('prepadovateli', $id);
    header('location: ' . BASE_URL . 'admin/prepadovateli/index.php');
}