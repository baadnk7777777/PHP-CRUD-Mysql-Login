<?php 

    // var_dump("Signup!!");

    session_start();
    include_once('functions.php');

    $signup = new DB_con();

    $output ="";
    if(!empty($_POST["txtus"]) && !empty($_POST["txtname"]) && !empty($_POST["txtps"])){
        
        $fullname = $_POST['txtname'];
        $username = $_POST['txtus'];
        $password = $_POST['txtps'];

        $sql = $signup->signup(trim($fullname),trim($username),trim($password));

        if(!isset($sql)){
            $output.="Cannot write to file userList.txt";
        }
        else{
            $_SESSION["name"] = $_POST["txtname"];
            $output.= $_POST["txtname"]." Have been recorded.";
        }
    }
    else $output.="Error: Not Found.";
    echo $output;

    
?>