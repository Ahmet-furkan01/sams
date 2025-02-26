<!DOCTYPE HTML>  
<html>
<head>
<style>
.container input[type="submit"] {
   width: 15%;
   position: absolute;
   top: 50px; /* Adjust the top position as per your requirement */
   right: 20px; /* Adjust the right position as per your requirement */
}
</style>

</head>

<body> 
  
<?php
 
 include "dbops.php";
 
$name = $lastname = $studentnum = $departmant = "";

var_dump($_REQUEST);
 
$buttonname = 'Add';
$buttonop = 'addstudent';
 
if($_REQUEST['updatestudent']){
  $name = trim($_REQUEST["studentname"]);
  $lastname = trim($_REQUEST["lastname"]);
  $studentnum = trim($_REQUEST["snumber"]);
 
  $departmant = trim($_REQUEST["depname"]);
  
  $id =trim($_REQUEST["id"]);
  
  update_student($id,$name, $lastname,  $studentnum , $departmant);
  
  header("Location: sams.php");
exit;
  
}
 

if($_REQUEST['addstudent']){
  $name = trim($_REQUEST["studentname"]);
  $lastname = trim($_REQUEST["lastname"]);
  $studentnum = trim($_REQUEST["snumber"]);
  $departmant = trim($_REQUEST["depname"]);

  $id=time();

  $student_info = "$id,$name,$lastname,$studentnum,$departmant\n";
  add_student( $student_info);
 
   header("Location: sams.php");
 exit;
}


switch($_REQUEST['op']){
	
	case 'updatestudentgui':
	$student=get_student($_REQUEST['id']);
	list($id,$n,$l,$sn,$dep) = explode(",", $student);
	
	echo "found student\n";
	var_dump($student);
	$buttonname = 'Update';
	$buttonop = 'updatestudent';
	
	break;
}

?>
  
<h1 style="text-align: center;" center;=""> <?php echo $buttonname; ?> Students </h1>

<form method="post" action="/sams/gui.php">  

<input type = hidden name='id' value="<?php echo $id; ?>">

<table style= "width:100%">
	
   <tr>
     <td style="text-align: end;">Name: </td>
     <td> <input type="text" id="studentname" name="studentname" value="<?php echo $n; ?>"><br></td>
   </tr>
    
   <tr>
    <td style="text-align: end;">Last Name: </td>
    <td> <input type="text" id="lastname" name="lastname" value="<?php echo $l; ?>"><br></td>
   </tr>
   
   <tr>
    <td style="text-align: end;">Student Number: </td>
    <td> <input type="text" id="snumber" name="snumber" value="<?php echo $sn; ?>"><br></td>
   </tr>
   
   <tr>
    <td style="text-align: end;">Departmant: </td>
    <td> <input type="text" id="depname" name="depname" value="<?php echo $dep; ?>"><br></td>
   </tr>

</table>


<div style="text-align:center">
 <input style= "width:15%" type="submit" name="<?php echo $buttonop; ?>" value="<?php echo $buttonname; ?>" > 

</div

</form>


<br>



</body>
</html>
