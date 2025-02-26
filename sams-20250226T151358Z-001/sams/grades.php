<!DOCTYPE html>
<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
<?php 

   include "dbops.php";
   var_dump($_REQUEST);
   
   if($_REQUEST['id']){
	   
	   
	   $student=get_student($_REQUEST['id']); 
       list($id,$n,$l,$sn,$dep) = explode(",", $student);
       var_dump($student);
       
       if(!$student){
		   
		   header("Location: sams.php");
           exit;
	    }
       
    } 
    
    else
    {
	
	      header("Location: sams.php");
          exit;
	}
	
	
	switch($_REQUEST['op']){
	
	case 'deletenote':
	delete_note($_REQUEST['nid']);
	break;
	
	
	
	
}

   
   
   
?>

<h2 style="text-align: center;" center;=""><?php echo "$n $l ($dep)"; ?></h2>

<table style="width:100%">
   <tr>
	<th>Student Number</th>
	<th>Lessons Id</th>   
    <th>Lesson Name</th>
    <th>Date</th>
    
    <th>Note</th>
    <th>Type</th>
    <th>Delete</th>
    <th>Update</th>
   
<?php

list_note($_REQUEST['id']);



?>   



 
</table>
<br>
<br>

<div class="button-container" style="text-align: end;">
<a href="/sams/addnotes.php?id=<?php echo $id ; ?>">Add</a>




<a href="sams.php">Go to Main Page</a>

</body>
</html>

