<?php
include SITE_ROOT . "/app/database/db.php";

$errMsg = [];
$id_student = '';
$group = '';
$surname = '';
$firstname = '';
$secondname = '';
$dateofbirthday = '';
$pasport = '';
$phone = '';


$students = selectStudentsNameGroup('students', 'groups');
$groups = selectAll('groups');
// $students = selectAll('students');

// Код для формы создания студента
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_student'])){
   
    $group  = trim($_POST['group']);
    $fio_stud = trim($_POST['fio_stud']);
    $dateofbirthday = trim($_POST['dateofbirthday']);

    if($group === ''  || $fio_stud === ''  || $dateofbirthday === '' ){
        array_push($errMsg, "Не все поля заполнены!");
    }else{
            $student = [
                'id_group' => $group,
                'fio_stud' => $fio_stud,
                'dateofbirthday' => $dateofbirthday
            ];
            $student = insert('students', $student);
            $student = selectOne('students', ['id' => $id_student] );
            header('location: ' . BASE_URL . 'admin/students/index.php');
        }
    }
else{
    $id_student = '';   
    $group = '';
    $fio_stud = '';
    $dateofbirthday = '';
}


// Апдейт категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $student = selectOne('students', ['id' => $_GET['id']]);
    
    $id =  $student['id'];
    $group = $student['id_group'];
    $fio_stud = $student['fio_stud'];
    $dateofbirthday = $student['dateofbirthday'];

}
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_student'])){
    $id =  $_POST['id'];
    $group = trim($_POST['group']);
    $fio_stud = trim($_POST['fio_stud']);
    $dateofbirthday = trim($_POST['dateofbirthday']);

    if($group === ''  || $fio_stud === ''  || $dateofbirthday === '' ){
        array_push($errMsg, "Не все поля заполнены!");
    }
        else{
        $student = [
            'id_group' => $group,
            'fio_stud' => $fio_stud,
            'dateofbirthday' => $dateofbirthday
        ];
     
        $student= update('students', $id, $student);
        header('location: ' . BASE_URL . 'admin/students/index.php');
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
    delete('students', $id);
    header('location: ' . BASE_URL . 'admin/students/index.php');
}