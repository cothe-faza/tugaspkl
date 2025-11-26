 <?php
        $conn = new mysqli('loalhost','root','rpl12345','db_perpustakaan');
         // untuk password sesuiakan dengan localserver masing-masing
         if ($conn) {
            echo"Done";
         } else {
            echo"Mampus";
         }
         
   ?>