<?php 

    include_once('functions.php');

    $insertdata = new DB_con();

    $output = "";
    $path = 'uploads/';

    if(!empty($_POST['txtisbn'])) {
       // var_dump ($_POST['txtisbn']);
       $isbn = $_POST['txtisbn'];
       $name = $_POST['txtnamebook'];
        $img = $_FILES['image']['name'];
        // var_dump ($img);
       $author = $_POST['txtatname'];
       $instock = $_POST['txtnis'];
       $price = $_POST['txtprice'];

        // *************************************************
                    // move file
        
        $tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp,"$path/$img");
        

       $sql = $insertdata->insert($isbn, $name, $img, $author, $instock, $price);

       if($sql) {
           $output.= "Record inserted Successfully!";

       }else {
        $output.= "Fail";
       }
    }
    else{
        $output.="Record Fail!!!";
    }
    
    echo $output;

?>