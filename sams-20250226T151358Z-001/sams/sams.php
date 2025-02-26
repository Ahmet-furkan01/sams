<!DOCTYPE html>
<html>
	
<style>
table, th, td{
  border:1px solid black;
}
</style>
	
<body>

<h1 style="text-align: center;" center;="">Students Affair Management System</h1>
<?php

include "dbops.php";
var_dump($_REQUEST);

switch($_REQUEST['op']){
	
	case 'deletestudent':
	delete_student($_REQUEST['id']);
	
	break;
	case 'update':
	$student=get_student($_REQUEST['id']);
	
	echo "found student\n";
	var_dump($student);
	break;
}

?>

<table style="width:100%">
  <tr>
  	<th> </th>
    <th>Name </th>
    <th>Last Name</th>
    <th>Student Number</th>
    <th>Departmant</th>
    <th>Delete</th>
    <th>Updates</th>
    <th>Grades</th>
  </tr>
  
<?php
 
 list_students();
?>

</table>
<br>


<div class="button-container">
<a href="/sams/gui.php">Add</a>

<p style="text-align: end;"><a href="">&lt;</a> <a href="">1</a> <a href="">2</a> <a href="">&gt;</a>
</div>
</body>
</html>
