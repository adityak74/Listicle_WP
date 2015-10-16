<?php

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['position'])){

         $position = $_POST['position'];
         if($position==0)
            $position_name = "Intership";
         else if($position==1)
            $position_name = "Volunteer";

         $to = $_POST['email'];
         $subject = "Application for Aasya Health Foundation";         
         $message = "<b>Hi ".$_POST['name']."</b><br><p>Thanks for applying. We will get back to you soon.<p><br><br>";                 
         $header = "From:noreply@aasyahealthfoundation.org \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";         
         mail ($to,$subject,$message,$header);

         $to = "akarnam37@gmail.com";
         $subject = "Application for Aasya Health Foundation";         
         $message = "<b>.".$_POST['name']."</b><br><p>has applied for ".$position_name.".Contact details : E-Mail : ".$_POST['email'].", Phone : ".$_POST['phone']."<p><br><br>";        
         $header = "From:noreply@aasyahealthfoundation.org \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";         
         mail ($to,$subject,$message,$header);

         echo "Thanks for applying ".$_POST['name'].".We will get back to you soon.";
}
         
?>