<?php
   $Name = $_POST['Name'];
   $Surname = $_POST['Surname'];
   $Mobileno = $_POST['Mobileno'];
   $Address1 = $_POST['Address1'];
   $Address2 = $_POST['Address2'];
   $Postcode = $_POST['Postcode'];

   $conn = new mysqli('localhost','root','','editprofile');
   if($conn->connect_error){
       die('Connection Failed : '.$conn->connect_error);
   }else{
       $stmt = $conn->prepare("insert into registration(Name, Surname, Mobileno, Address1, Address2, Postcode)
          values(?, ?, ?, ?, ?, ?)");
        $stmt->blind_param("s,s,i,s,s,i", $Name, $Surname, $Mobileno, $Address1, $Address2);
        $stmt->execute();
        echo "registration successful";
        $stmt->close();
        $conn->close();
   }


?>