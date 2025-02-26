<?php
 function
  delete_student($deleteid){
	 
 $users_file = "students.txt";
 $lines = file($users_file, FILE_IGNORE_NEW_LINES);
 unlink($users_file);
 //var_dump ($lines);
  foreach ($lines as $line){
  
	//echo "$line<br>";  
	
	list($id,$n,$l,$sn,$dep) = explode(",", $line);
	//var_dump ($user_data) ; 
	
	  if($deleteid != $id) {
		
		$file = fopen("students.txt", "a");

            if ($file) {
               // Write the user information to the file
               fwrite($file, "$line\n");
               // Close the file
               fclose($file);
             }
  
      }
     
   }  
	  
	
}
  

 function
   get_student($getid){
	 
 $users_file = "students.txt";
 $lines = file($users_file, FILE_IGNORE_NEW_LINES);
 
 //var_dump ($lines);
  foreach ($lines as $line){ 
  
	//echo "$line<br>";  
	
	list($id,$n,$l,$sn,$dep) = explode(",", $line);
	//var_dump ($user_data) ; 
	
	  if($getid == $id) {
		
		return $line;
      }
     
   }  
	  
}
 
 
 
 function
 list_students(){
	 
	 $lines = file("students.txt", FILE_IGNORE_NEW_LINES);
     //var_dump ($lines);
     foreach ($lines as $line){
        
	 //echo "$line<br>";  
	
	list($id,$n,$l,$sn,$dep) = explode(",", $line);
	//var_dump ($user_data) ; 
	  
	  
	echo "
	 <tr>
      <td><input type='checkbox'></td>
      <td> $n </td>
      <td> $l </td>
      <td> $sn </td>
      <td> $dep </td>
      <td><a href='sams.php?op=deletestudent&id=$id'>Delete </a> </td>
      <td><a href='gui.php?op=updatestudentgui&id=$id'>Update</a></td>
      <td><a href='grades.php?id=$id'>Grades</a></td>
    </tr>
	
	";
	 
   }
	 
}

function
   update_student($sid,$name, $lastname,  $studentnum , $departmant){
	 
 $users_file = "students.txt";
 $lines = file($users_file, FILE_IGNORE_NEW_LINES);
 unlink($users_file);
 //var_dump ($lines);
  foreach ($lines as $line){
  
	//echo "$line<br>";  
	
	list($id,$n,$l,$sn,$dep) = explode(",", $line);
	//var_dump ($user_data) ; 
	
	  if($sid == $id) {
		$line= "$sid,$name, $lastname,  $studentnum , $departmant";
		
      }
    
         $file = fopen("students.txt", "a");

            if ($file) {
              // Write the user information to the file
              fwrite($file, "$line\n");
               // Close the file
              fclose($file);
             }

   }  

}


function
 add_student( $student_info){
	 
  // Open the file in append mode
  $file = fopen("students.txt", "a");

  if ($file) {
    // Write the user information to the file
    fwrite($file, $student_info);
    // Close the file
    fclose($file);
  }
	 
}


  function
      add_note($note_info){
       
       echo "add_note come\n";
       $file = fopen("note.txt", "a");
              if ($file) {
          echo "dosyayı açtım,yazıcam\n";
                // Write the user information to the file
              fwrite($file, $note_info);
                // Close the file
               fclose($file);
               }     
       } 


 function
 list_note($studentid){
	 
	 $users_file = "note.txt";
	 $lines = file($users_file, FILE_IGNORE_NEW_LINES);
     //var_dump ($lines);
     foreach ($lines as $line){
        
	 //echo "$line<br>";  
	
	list($id,$noteid,$lessonname,$date,$note,$type) = explode(",", $line);
	//var_dump ($user_data) ; 
	  
	  if(trim($studentid) == trim($id)){
	   echo "
	      <tr>
      
            <td> $id</td>
            <td>$noteid</td>
            <td> $lessonname </td>
            <td> $date </td>
            <td> $note </td>
            <td>$type</td>
            <td><a href='grades.php?op=deletenote&nid=$noteid&id=$id'>Delete </a> </td>
            <td><a href='addnotes.php?op=updatenoteadd&nid=$noteid&id=$id'>Update</a></td>
     
            </tr>
	
	    ";}
	 
   }
	 
}


 function
   get_note($getnoteid){
	 
 $users_file = "note.txt";
 $lines = file($users_file, FILE_IGNORE_NEW_LINES);
 
 //var_dump ($lines);
  foreach ($lines as $line){ 
  
	//echo "$line<br>";  
	
	list($id,$noteid,$lessonname,$date,$note,$type) = explode(",", $line);
	//var_dump ($user_data) ; 
	
	  if($getnoteid == $noteid) {
		
		return $line;
      }
     
   }  
	  
}

 function
  delete_note($deletenoteid){
	 
 $users_file = "note.txt";
 $lines = file($users_file, FILE_IGNORE_NEW_LINES);
 unlink($users_file);
 //var_dump ($lines);
  foreach ($lines as $line){
  
	//echo "$line<br>";  
	
	list($id,$noteid,$lessonname,$date,$note,$type) = explode(",", $line);
	//var_dump ($user_data) ; 
	
	  
	
	  if(trim($deletenoteid) == trim($noteid)) {
		  continue;
	  }
		
		$file = fopen("note.txt", "a");

            if ($file) {
               // Write the user information to the file
               fwrite($file, "$line\n");
               // Close the file
               fclose($file);
             }
  
      }
     
   }  
	  
	
	function
   update_notes($id,$noteid,$llessonname,$ldate,$lnote,$ltype){
	 
 $users_file = "note.txt";
 $lines = file($users_file, FILE_IGNORE_NEW_LINES);
 unlink($users_file);
 
  foreach ($lines as $line){
  
	list($id,$nid,$lessonname, $date, $note, $type) = explode(",", $line);
	 	
	  if($noteid == $nid) {
		$line= "$id,$noteid, $llessonname, $ldate, $lnote, $ltype";
		
      }
    
         $file = fopen("note.txt", "a");

            if ($file) {
              // Write the user information to the file
              fwrite($file, "$line\n");
               // Close the file
              fclose($file);
             }

   }  

}

  function
 getoptionfromfile($optionfilename,$currentselected){
	 $optionlist = "";
	 
	 $lines = file($optionfilename, FILE_IGNORE_NEW_LINES);
     
     foreach ($lines as $line){
        
       $selectedtext = "";
	   if(trim($currentselected) == trim($line) )
	       $selectedtext = "selected";
	   $optionlist = $optionlist. " <option $selectedtext value='$line'>$line</option>";
	
	   
	 
   }
	return $optionlist ; 
}




?>
