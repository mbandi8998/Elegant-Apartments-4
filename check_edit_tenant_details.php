<?php
session_start();
if( isset($_POST['house_number']) ){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $id_number = $_POST['id_number'];
    $phone_number = $_POST['phone_number'];
    $house_number = strtoupper($_POST['house_number']);
    $emergency_contact = $_POST['emergency_contact'];
    $tenant_id = $_POST['tenant_id'];

    $sign_in_time = date("F j, Y, g:i a");
    $sign_out_time = "";

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

    $sql = "UPDATE `tenant` SET `First Name` = '$first_name', `Last Name` = '$last_name', `ID Number` = '$id_number', `Phone Number` = '$phone_number', `House Number` = '$house_number', `Emergency Contact` = '$emergency_contact' WHERE `Id`=:tenant_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':tenant_id' => $tenant_id,      
    ));


    header("Location:manage_tenants.php?successcode=1");

    
    
    
     
}
?>