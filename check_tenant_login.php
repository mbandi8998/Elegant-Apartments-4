<?php
session_start();
if(isset($_POST['id_number'])&&isset($_POST['password'])){
    $id_number=$_POST['id_number'];
    $pwd = $_POST['password'];

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
     
     $sql="SELECT * FROM `tenant` WHERE `ID Number`=:id_number AND Password = :pwd;";
     $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':id_number' => $id_number,
        ':pwd' => $pwd       
    ));
     
    if($stmt->rowCount()>0){
        while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
            $_SESSION["auth"] = true;
            $_SESSION["id_number"] = $row["ID Number"];
            $_SESSION['loggedin'] = true;
            $_SESSION['admin'] = false;
        }
        
        header("Location:tenant_dashboard.php");
        
    }else{
        echo '<span style="color: red;">Login Fail</span>';
        header("Location:tenant_login.php?errcode=1");
    }
     
}
?>