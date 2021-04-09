<?php 

    session_start();

    include_once('functions.php');
    // var_dump("Login!!");
   $output = "";

   $select_data = new DB_con();

   

    if(!empty($_POST['txtus']) && !empty($_POST['txtps']))
    {
        $password = $_POST['txtps'];
        $username = $_POST['txtus'];
         $sql = $select_data->selectuser($username); 

    while($row = mysqli_fetch_array($sql))
    {
        if($row['username'] == $username && $row['password'] == $password)
        {
            $_SESSION['name'] = $row['fullname'];
            $output = "Login Success!!!";
        }
        else{
            $output = "Login Fail Wrong Username or Password !!!";
        }
    }

    }
    else{
        $output.= "Not Found Username or Password!";
    }
    echo $output;
?>