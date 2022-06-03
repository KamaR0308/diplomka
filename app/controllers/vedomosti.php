<?php
include SITE_ROOT . "/app/database/db.php";

$errMsg = [];
$id = '';
$semestr = '';
$student = '';
$predmet = '';
$prepadovatel = '';
$ocenka = '';


$students = selectAll('students');
$predmeti = selectAll('predmeti');
$prepadovateli = selectAll('prepadovateli');
$vedomosti = selectVedomosti();

// Код для формы создания студента
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_vedomost'])){
   
    $semestr = trim($_POST['semestr']);
    $student = trim($_POST['student']);
    $predmet = trim($_POST['predmet']);
    $prepadovatel = trim($_POST['prepadovatel']);
    $ocenka = trim($_POST['ocenka']);


    if($semestr === ''  || $student === ''  || $predmet === ''   || $prepadovatel === ''  || $ocenka === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif ($semestr < 1 and $semestr > 8 ){
        array_push($errMsg, "Семестр не может быть меньше 1 и больше 8");
    }else{
            $vedomost = [
                'semestr' => $semestr,
                'id_student' => $student,
                'id_predmet' => $predmet,
                'id_prepadovatel' => $prepadovatel,
                'ocenka' => $ocenka,
            ];
            $vedomost = insert('sdacha_ekzamenov', $vedomost);
            $vedomost = selectOne('sdacha_ekzamenov', ['id' => $id] );
            header('location: ' . BASE_URL . 'admin/vedomosti/index.php');
        }
    
}else{
    $id = '';
    $semestr = '';
    $student = '';
    $predmet = '';
    $prepadovatel = '';
    $ocenka = '';
}


// Апдейт категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $vedomost = selectOne('sdacha_ekzamenov', ['id' => $_GET['id']]);
    
    $id = $vedomost['id'];
    $semestr = $vedomost['semestr'];
    $student = $vedomost['id_student'];
    $predmet = $vedomost['id_predmet'];
    $prepadovatel = $vedomost['id_prepadovatel'];
    $ocenka = $vedomost['ocenka'];

}
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_vedomost'])){
    $id =  $_POST['id'];
    $semestr = trim($_POST['semestr']);
    $student = trim($_POST['student']);
    $predmet = trim($_POST['predmet']);
    $prepadovatel = trim($_POST['prepadovatel']);
    $ocenka = trim($_POST['ocenka']);

    if($semestr === ''  || $student === ''  || $predmet === ''   || $prepadovatel === ''  || $ocenka === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif ($semestr < 1 and $semestr > 8 ){
        array_push($errMsg, "Семестр не может быть меньше 1 и больше 8");
    }else{
            $vedomost = [
                'semestr' => $semestr,
                'id_student' => $student,
                'id_predmet' => $predmet,
                'id_prepadovatel' => $prepadovatel,
                'ocenka' => $ocenka
        ];
     
        $vedomost= update('sdacha_ekzamenov', $id, $vedomost);
        header('location: ' . BASE_URL . 'admin/vedomosti/index.php');
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
    delete('sdacha_ekzamenov', $id);
    header('location: ' . BASE_URL . 'admin/vedomosti/index.php');
}