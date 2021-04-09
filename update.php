<?php

    $path = 'uploads/';

    $user_id = $_POST['user_id'];
    $isbn =  $_POST['txtisbn'];
    $name =  $_POST['txtnamebook'];

    $output ="";

    
    
    $author =  $_POST['txtatname'];
    $stock =  $_POST['txtnis'];
    $price =  $_POST['txtprice'];

    $old_img =  $_POST['image'];
    // var_dump($_FILES['image']['name']);
    $new_img =  $_FILES['image']['name'];

    if(!empty($_FILES['image']['name']))
    {   
        $img = $_FILES['image']['name'];
        
        $tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp,"$path/$img");
    }
    else{
        $img = $_POST['image'];
    }
    
    
    include_once('functions.php');

    $updatedata = new DB_con();

    $sql = $updatedata->update($isbn, $name,$img,$author,$stock,$price,$user_id);

   if(isset($sql))
   {
       $output.="Update Success!!!";
   }
   else{
       $output.="Fail Update!!!";
   }
   echo $output;

?>