<?php
// Use this file access as a trigger to clean out tblCodes 
$rslt = mysql_query("DELETE FROM tblCodes WHERE expires<NOW()"); 

$sSQL = "SELECT * FROM tblCodes WHERE code='" . addslashes($c) 
         . "' AND filename='" . addslashes($n) . "' AND expires>=NOW()"; 
if ($rslt = mysql_query($sSQL)) { 
   if (mysql_num_rows($rslt) > 0) { 
      // valid code for file 

      // DELETE CODE (allow only one access of the file) 
      $rslt = mysql_query("DELETE FROM tblCodes WHERE code='" . addslashes($c) 
            . "' AND filename='" . addslashes($n) . "'"); 

      // Take the user to the file: 
      header("Location:  http://mydomain.com/filedir/" . addslashes($n)); 
   } else { 
      echo "File is not accessible."; 
   } 
} else { 
   echo "Error attempting to access file."; 
}  

?>
