<?


if(isset($_POST["query"]))
{
 $connect = mysqli_connect("localhost", "root", "", "dinamic_site");
 $request = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "SELECT sdacha_ekzamenov.id, sdacha_ekzamenov.semestr, groups.name as gruppa,students.fio_stud, 
 predmeti.name, 
 prepadovateli.fio_prepod, 
 sdacha_ekzamenov.ocenka 
 FROM sdacha_ekzamenov 
 left join students on sdacha_ekzamenov.id_student = students.id 
 left join groups on groups.id = students.id_group 
 left join predmeti on sdacha_ekzamenov.id_predmet = predmeti.id 
 left join prepadovateli on sdacha_ekzamenov.id_prepadovatel = prepadovateli.id 
 where sdacha_ekzamenov.semestr like '%".$request."%' 
 or fio_Stud like '%".$request."%' 
 or gruppa like '%".$request."%'
 or predmeti.namegruppa like '%".$request."%'
 order by sdacha_ekzamenov.semestr desc, gruppa, fio_stud 
 ";
 $result = mysqli_query($connect, $query);
 $data =array();
 $html = '';
 $html .= '
    <div class="row title-table">              
        <div class="col"-1 text-center">Семестр</div>
        <div class="col-2 text-center">Группа</div>
        <div class="col-3 text-center">Студент ФИО</div>
        <div class="col-2 text-center">Предмет</div>
        <div class="col-3 text-center">Препадователь ФИО</div>
        <div class="col-1 text-center">Оценка </div>
    </div>
    <hr>';
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
    $data[]= $row["semestr"];
    $data[]= $row["gruppa"];
    $data[]= $row["fio_stud"];
    $data[]= $row["name"];
    $data[]= $row["fio_prepod"];
    $data[]= $row["ocenka"];
   $html .= '
   <div class="row post text-center">
   <div class="id col-1 text-center">'.$row["semestr"].'</div>
   <div class="id col-2 text-center">'.$row["gruppa"].'</div>
   <div class="id_group col-3 text-center">'.$row["fio_stud"].'</div>
   <div class="dateofbirthday col-2 text-center">'.$row["name"].'</div>
   <div class="phone col-3 text-center">'.$row["fio_prepod"].'</div>
   <div class="phone col-1 text-center">'.$row["ocenka"].'</div>
   
</div>
   ';
  }
 }
 else
 {
  $data = 'No Data Found';
  $html .= '
   <tr>
    <td colspan="3">No Data Found</td>
   </tr>
   ';
 }
 $html .= '</table>';
 if(isset($_POST['typehead_search']))
 {
  echo $html;
 }
 else
 {
  $data = array_unique($data);
  echo json_encode($data);
 }
}
?>