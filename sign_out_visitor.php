<?php
session_start();
if( isset($_POST['id_number']) ){
    $id_number = $_POST['id_number'];

    $servername = "localhost";
    $root_username = "root";
    $password = "";
    $dbname = "rental management system";
    
    try{
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $root_username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }


    $sign_out_time = "";


    $sql="SELECT * FROM `visitors` WHERE `ID Number`=:id_number";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':id_number' => $id_number,      
    ));


    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
        $sign_out_time = $row["Sign Out Time"];
    }

    if($stmt->rowCount()<1){
        header("Location:manage_visitors.php?errcode2=2");
    } 
    else{
        if (strlen($sign_out_time) < 3){
            date_default_timezone_set("Africa/Nairobi");
            $sign_out_time = date("d-m-y h:i:s");
            $sql4 = "UPDATE `visitors` SET `Sign Out Time` = '$sign_out_time' WHERE `ID Number`=:id_number";
            $stmt4 = $pdo->prepare($sql4);
            $stmt4->execute(array(
                ':id_number' => $id_number,
            ));
            header("Location:visitors_record.php");
        }
        else{
            header("Location:manage_visitors.php?errcode2=1");

        } 
    }
    
     
}
?>