<?php
session_start();
if( isset($_POST['house_no']) ){
    $house_no=strtoupper($_POST['house_no']);

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


    $sql="SELECT * FROM `house` WHERE `House Number`=:house_no";
     $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':house_no' => $house_no,      
    ));
     
    if($stmt->rowCount()<1){
        $sql="INSERT INTO `house`(`House Number`, `Rent Balance`, `Vacant`) VALUES (:house_no,'0','yes')";
        $stmt2 = $pdo->prepare($sql);
        $stmt2->execute(
            [
            ':house_no' => $house_no,
            ]
        );
        header("Location:manage_houses.php");
        
    }else{
        header("Location:add_house.php?errcode=1");
    }

     
    
    
     
}
?>