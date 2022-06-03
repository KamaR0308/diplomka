<?php
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// $connect = mysqli_connect("localhost", "u1615265_root", "uI9jV2iG3ouH5h", "u1615265_dinamic-site") or die("Error connect");
// $connect->set_charset('utf8mb4');
//$query = mysqli_query($connect,"SELECT sdacha_ekzamenov.id, sdacha_ekzamenov.semestr, groups.name as gruppa, students.fio_stud, predmeti.name,prepadovateli.fio_prepod, sdacha_ekzamenov.ocenka FROM sdacha_ekzamenov left join students on sdacha_ekzamenov.id_student = students.id left join groups on groups.id = students.id_group left join predmeti on sdacha_ekzamenov.id_predmet = predmeti.id left join prepadovateli on sdacha_ekzamenov.id_prepadovatel = prepadovateli.id order by sdacha_ekzamenov.semestr desc, gruppa, fio_stud "
//);
$host = 'localhost';
$port = 3306;
$dbname = 'u1615265_dinamic-site';
$user = 'u1615265_root';
$pass = 'uI9jV2iG3ouH5h';
$charset = 'utf8mb4';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $db = new mysqli($host, $user, $pass, $dbname, $port);
    $db->set_charset($charset);
    $db->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
} catch (\mysqli_sql_exception $e) {
     throw new \mysqli_sql_exception($e->getMessage(), $e->getCode());
}
unset($host, $dbname, $user, $pass, $charset, $port);

if(isset($_POST['submit'])){
  $search = explode(" ", $_POST['search']);
  $count = count($search);
  $array = array();
  
  $i = 0;
  foreach($search as $key){
    $i++;
    if($i < $count) $array[] = "CONCAT fio_stud like '%".$key."%'";else $array[] = "fio_stud like '%".$key."%' ";
  }
  $sql = "SELECT sdacha_ekzamenov.id, sdacha_ekzamenov.semestr, groups.name as gruppa, students.fio_stud, predmeti.name,fio_prepod, sdacha_ekzamenov.ocenka 
  FROM sdacha_ekzamenov 
  left join students on sdacha_ekzamenov.id_student = students.id 
  left join groups on groups.id = students.id_group 
  left join predmeti on sdacha_ekzamenov.id_predmet = predmeti.id 
  left join prepadovateli on sdacha_ekzamenov.id_prepadovatel = prepadovateli.id 
  where ".implode("",$array)." order by sdacha_ekzamenov.semestr desc, gruppa, fio_stud ";
  //echo $sql;
  $query = mysqli_query($db,$sql);
  while ($row = mysqli_fetch_assoc($query))
  echo ' <hr>
  <div class="row  text-center">
    <div class=" col-1 text-center">'.$row['id'] .'</div> 
    <div class=" col-1 text-center">'.$row['semestr'] .'</div> 
    <div class="col-1 text-center">'.$row['gruppa'].'</div> 
    <div class="col-2 text-center">'.$row['fio_stud'].'</div> 
    <div class="col-2 text-center">'.$row['name'].'</div> 
    <div class="col-2 text-center">'.$row['fio_prepod'].'</div> 
    <div class="col-1 text-center">'.$row['ocenka'].'</div> 
    <div class="red col-1"><a href="edit.php?id='.$row['id'].'">edit</a></div>  
    <div class="del col-1"><a href="index.php?del_id='.$row['id'].'">delete</a></div><hr></div>
  <hr>';
}
else {
  $sql = "SELECT sdacha_ekzamenov.id, sdacha_ekzamenov.semestr, groups.name as gruppa, students.fio_stud, predmeti.name, prepadovateli.fio_prepod, sdacha_ekzamenov.ocenka 
  FROM sdacha_ekzamenov 
  left join students on sdacha_ekzamenov.id_student = students.id 
  left join groups on groups.id = students.id_group 
  left join predmeti on sdacha_ekzamenov.id_predmet = predmeti.id 
  left join prepadovateli on sdacha_ekzamenov.id_prepadovatel = prepadovateli.id order by sdacha_ekzamenov.semestr desc, gruppa, fio_stud ";
  
  $query = mysqli_query($db,$sql);
  while ($row = mysqli_fetch_assoc($query))
  echo ' <hr>
  <div class="row  text-center">
      <div class=" col-1 text-center">'.$row['id'] .'</div> 
      <div class=" col-1 text-center">'.$row['semestr'] .'</div>
      <div class="col-1 text-center">'.$row['gruppa'].'</div> 
      <div class="col-2 text-center">'.$row['fio_stud'].'</div>
      <div class="col-2 text-center">'.$row['name'].'</div> 
      <div class="col-2 text-center">'.$row['fio_prepod'].'</div> 
      <div class="col-1 text-center">'.$row['ocenka'].'</div> 
      <div class="red col-1"><a href="edit.php?id='.$row['id'].'">edit</a></div>  
      <div class="del col-1"><a href="index.php?del_id='.$row['id'].'">delete</a></div><hr>
  </div><hr>';
}
