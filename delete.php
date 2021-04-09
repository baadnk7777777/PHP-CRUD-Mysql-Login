<?php 
    $output ="";
    include_once('functions.php');

    $deletedata = new DB_con();

    $user_id = $_POST['Del_ID'];
    $sql = $deletedata->delete($user_id);
    if(isset($sql)) {
        $output.="Delete Success!!!";
    }
    echo $output;

?>