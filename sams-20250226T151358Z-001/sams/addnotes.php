<!DOCTYPE HTML>  
<html>
<head>
  <style>
      .radio-container {
          display: flex;
          gap: 10px;
        }
  </style>

</head>

<body> 
  
<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL);



    include "dbops.php";
    
    $buttonname2 = 'Add'; 
    $buttonop2 = 'addnote';
    
     var_dump ($_REQUEST);
     
            if ($_REQUEST['id']){
  
              $student = get_student($_REQUEST['id']);
  
              list($id,$n,$l,$sn,$dep) = explode(",", $student);
  
              var_dump($student);
              
              if(!$student){
          
          //header("Location: sams.php");
                  //exit;              
         }
    
           } else {
       
           // header("Location: sams.php");
              //exit;        
        }
        
        
           if ($_REQUEST['addnote']){
              $lessonname = trim($_REQUEST["slesson"]);
              $date = trim($_REQUEST["sdate"]);
              $note = trim($_REQUEST["snote"]);
              $type = trim($_REQUEST["type"]);
              $id = trim($_REQUEST["id"]);
     
                $noteid = time();
               
                $note_info = "$id,$noteid,$lessonname,$date,$note,$type\n";
                add_note($note_info);
                
                
                  header("Location: grades.php?id=$id");
               exit;
                 
        } 
         
         
         
         
         if($_REQUEST['updatenotes']){
              $lessonname = trim($_REQUEST["slesson"]);
              $date = trim($_REQUEST["sdate"]);
              $note = trim($_REQUEST["snote"]);
              $type = trim($_REQUEST["type"]);
              $id = trim($_REQUEST["id"]);
              $noteid = trim($_REQUEST["noteid"]);
     
  
         update_notes($id,$noteid,$lessonname,$date,$note,$type);
  
        header("Location: grades.php?id=$id");
        exit;
  
     }
 

    switch($_REQUEST['op']){
  
  case 'updatenoteadd':
  $note_info=get_note($_REQUEST['nid']);
  list($id,$noteid,$lessonname,$date,$note, $type) = explode(",", $note_info);
  
  echo "found student\n";
  var_dump($student);
  $buttonname2 = 'Update';
  $buttonop2 = 'updatenotes';
  
  break;
}     
     
        

?>
    
   <h1 style="text-align: center;" center;=""> <?php echo $buttonname2 ?>  Note </h1>
  
  <form method="post" action="/sams/addnotes.php">  
     <input type = hidden name = 'id' value = "<?php echo $id;?>" >
      <input type = hidden name = 'noteid' value = "<?php echo $noteid;?>" >
    
     <table style= "width:100%;text-align: center;">
        <tr>
           <td style="text-align: end;">Student Name: </td>
           <td> <?php echo "$n  $l ($dep)"; ?> <br>  </td>
        </tr>
        
        <tr>
           <td style="text-align: end;">Lesson: </td>
           <td> 
			   <select name="slesson" id="slesson" style="width: 190px;">
				   <?php
				      $optionlist = getoptionfromfile('lessontype.txt', "$lessonname");
				      echo $optionlist ;
				   ?>
                  
               </select>
		  </td>
        </tr>
        
        <tr>
           <td  style="text-align: end;"> Date: </td>
           <td> <input type="text" id="fname" name="sdate" value="<?php echo $date;?>"><br> </td> 
        </tr>
        
        <tr>
           <td  style="text-align: end;">Note: </td>
           <td> <input type="text" id="fname" name="snote" value="<?php echo $note;?>"><br>  </td>
        </tr>
        
        <tr>
           <td style="text-align: end;">Type: </td>
           <td>
               <select name="type" id="type" style="width: 190px;">
				   <?php
				      $optionlist = getoptionfromfile('examtype.txt', "$type");
				      echo $optionlist ;
				   ?>
				   
                  
               </select>
           </td>
        </tr>
    </table>
    <br>
       <div style="text-align:center">
        <input style= "width:15%" type="submit" name="<?php echo $buttonop2 ?>" value="<?php echo $buttonname2 ?>" > 
       </div

   </form>


     <a href='grades.php' >  Go Back To Main Page  </a>

  
</body>
</html>
