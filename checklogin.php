<?php
session_start();
if(isset($_POST['username'])&&isset($_POST['password'])){
    $username=$_POST['username'];
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
     
     $sql="SELECT * FROM `admin users` WHERE Username=:username AND Password = :pwd;";
     $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':username' => $username,
        ':pwd' => $pwd       
    ));
     
    if($stmt->rowCount()>0){
        while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
            $_SESSION["auth"] = true;
            $_SESSION['loggedin'] = true;
            $_SESSION['admin'] = true;
        }
        
        header("Location:index.php");
        
    }else{
        echo '<span style="color: red;">Login Fail</span>';
        header("Location:login.php?errcode=1");
    }
     
}
?>