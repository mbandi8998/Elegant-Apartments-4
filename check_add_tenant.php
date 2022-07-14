<?php
session_start();
if( isset($_POST['house_number']) ){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $id_number = $_POST['id_number'];
    $phone_number = $_POST['phone_number'];
    $house_number = strtoupper($_POST['house_number']);
    $emergency_contact = $_POST['emergency_contact'];

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


    $sql="SELECT * FROM `tenant` WHERE `ID Number`=:id_number";
     $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':id_number' => $id_number,      
    ));


    $vacant = "yes";
    $sql="SELECT * FROM `house` WHERE `House Number`=:house_number";
    $stmt3 = $pdo->prepare($sql);
    $stmt3->execute(array(
        ':house_number' => $house_number,      
    ));

    while ( $row = $stmt3->fetch(PDO::FETCH_ASSOC) ) {
        $vacant = $row["Vacant"];
    }

    if ($vacant == "no"){
        header("Location:add_tenant.php?errcode=3");
    }
    else{
        $sql4 = "UPDATE `house` SET `Vacant` = 'no' WHERE `House Number`=:house_number";
        $stmt4 = $pdo->prepare($sql4);
        $stmt4->execute(array(
            ':house_number' => $house_number,      
        ));

    }
     
    if($stmt->rowCount()<1){
        if($stmt3->rowCount()>0){
            date_default_timezone_set("Africa/Nairobi");
            $joined = date("d-m-y");

            $sql = "INSERT INTO `tenant`(`First Name`, `Last Name`, `ID Number`, `Phone Number`, `House Number`, `Emergency Contact`, `Joined`) VALUES (:first_name, :last_name, :id_number, :phone_number, :house_number, :emergency_contact, :joined)";
            $stmt2 = $pdo->prepare($sql);
            $stmt2->execute(
                [
                ':first_name' => $first_name,
                ':last_name' => $last_name,
                ':id_number' => $id_number,
                ':phone_number' => $phone_number,
                ':house_number' => $house_number,
                ':emergency_contact' => $emergency_contact, 
                ':joined' => $joined,
                ]
            );
            header("Location:manage_tenants.php");
        }
        else{
            header("Location:add_tenant.php?errcode=2");
        }
        
    }else{
        header("Location:add_tenant.php?errcode=1");
    }

     
    
    
     
}
?>