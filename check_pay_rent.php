<?php
session_start();
if( isset($_POST['id_number']) ){
    $id_number = $_POST['id_number'];
    $amount = $_POST['amount'];

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


    $sql="SELECT * FROM `rent` WHERE `Tenant Id Number`=:id_number";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':id_number' => $id_number,      
    ));


    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
        if ($row["Status"] == "unpaid"){
            $amount_due = $row["Amount Due"];
            if ($amount <= $amount_due){
                $amount_due = $amount_due - $amount;
                $status = "unpaid";
                if ($amount_due==0){
                    $status = "paid";
                };
                $sql2 = "UPDATE `rent` SET `Amount Due` = '$amount_due', `Status` = '$status' WHERE `Tenant Id Number`=:id_number";
                $stmt2 = $pdo->prepare($sql2);
                $stmt2->execute(array(
                    ':id_number' => $id_number,
                ));
                header("Location:index.php?successcode=1");
            }
            else{
                header("Location:index.php?oversufficient=1");
            }
            
        }
        else{
            header("Location:index.php?errorcode=1");
        }

    }
    
     
}
?>