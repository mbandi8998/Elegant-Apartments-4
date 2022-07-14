<?php  echo @file_get_contents('header.php'); ?>

<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['admin'] == true && $_SESSION['loggedin'] == true) {
  
} else {
  header("Location:choose_login.php");
}
?>

<?php  echo @file_get_contents('navbar.php'); ?>

<div class="container-fluid">
<div class="row" style="min-height:100vh;">
    <div class="col-lg-2" style="background-color:#edece6;padding: 0 !important;">
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white h-100 w-100">
          <div class="position-sticky">
            <div class="list-group list-group-flush mx-1 mt-3">
              <a href="index.php" class="list-group-item list-group-item-action py-2 ripple">
              <i class="fa-solid fa-gauge"></i> <span class="px-1">Main Dashboard</span>
              </a>
              <a href="add_tenant.php" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fas fa-user-plus fa-fw me-3"></i> <span class="px-1">Add Tenant</span></a
              >

              <a href="manage_tenants.php" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fas fa-users fa-fw me-3"></i> <span class="pl-1">Manage Tenants</span></a
              >

              <a href="add_house.php" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fa-solid fa-house-medical"></i> <span class="pl-1">Add House</span></a
              >

              <a href="manage_houses.php" class="list-group-item list-group-item-action py-2 ripple active gradient-custom-3"
                ><i class="fa-solid fa-house-user"></i> <span class="pl-1">Manage Houses</span></a
              >

              <a href="financial_history.php" class="list-group-item list-group-item-action py-2 ripple">
                <i class="fa-brands fa-gg-circle"></i> <span class="pl-1">Financial History</span>
              </a>

              <a href="manage_visitors.php" class="list-group-item list-group-item-action py-2 ripple">
                <i class="fa fa-bus"></i> <span class="pl-1">Manage Visitors</span>
              </a>
              
              <a href="visitors_record.php" class="list-group-item list-group-item-action py-2 ripple">
                <i class="fa fa-file pl-1"></i> <span class="pl-1">Visitors Record</span>
              </a>

              <a href="generate_report.php" class="list-group-item list-group-item-action py-2 ripple">
                <i class="fa fa-info pl-1"></i> <span class="pl-1">Generate Report</span>
              </a>
              
              <a href="emergency_contacts.php" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fa-solid fa-briefcase-medical"></i> <span class="pl-1">Emergency Contacts</span></a
              >
              <a href="evacuation_procedure.php" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fa-solid fa-clipboard-list"></i> <span class="pl-1">Evacuation Procedure</span></a
              >
              
              <a href="software_guide.php" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fa-solid fa-book-open-reader"></i> <span class="pl-1">Software Guide</span></a
              >
            </div>
          </div>
        </nav>
        <!-- Sidebar -->
    </div>
    <div class="col-lg-9">
        <div class="my-4">
            <a href="manage_houses.php" class="text-dark h5 px-4" style="text-decoration:none;">
                <i class="fa fa-arrow-left"></i> Go Back 
            </a>
        </div>
        <div class="pt-4"></div>
        <div class="rounded bg-white ">
            <div class="row">
            <?php
                $servername = "localhost";
                $root_username = "root";
                $password = "";
                $dbname = "rental management system";
                
                try{
                    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $root_username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }


                $house_number = "";

                if(isset($_GET['house_number'])){
                    $house_number = $_GET['house_number'];
                }
                else{
                    header("Location:manage_houses.php");
                }

                
                
                $sql="SELECT * FROM `tenant` WHERE `House Number`='$house_number'";
                $result = $pdo->query($sql);
                while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $house_number = $row["House Number"];
                    echo '<div class="col-md-3 border-right"><div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">'.$row["First Name"].' '.$row["Last Name"].'</span><span class="text-black-50">'.$row["Phone Number"].'</span><span> </span></div></div>';
                    echo '<div class="col-md-5 border-right"><div class="p-3 py-5"><div class="d-flex justify-content-between align-items-center mb-3"><h4 class="text-right">Tenant Profile</h4></div><div class="row mt-2"><div class="col-md-6"><label class="labels">First Name:</label><input type="text" class="form-control" value=" '.$row["First Name"].'" readonly></div><div class="col-md-6"><label class="labels">Last Name:</label><input type="text" class="form-control" value="'.$row["Last Name"].'" readonly></div></div><div class="row mt-3"><div class="col-md-12 mb-2"><label class="labels">Phone Number</label><input type="text" class="form-control" placeholder="enter phone number" value="'.$row["Phone Number"].'" readonly></div><div class="col-md-12 mb-2"><label class="labels">ID Number</label><input type="text" class="form-control" value="'.$row["ID Number"].'" readonly></div></div></div></div>';
                }

                $sql2="SELECT * FROM `house` WHERE `House Number`='$house_number'";
                $result2 = $pdo->query($sql2);
                while($row = $result2->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="col-md-4 mx-auto"><div class="p-3 py-5"><div class="col-md-12"><label class="labels">House Number</label><input type="text" class="form-control"  value="'.$row["House Number"].'" readonly></div> <br><div class="col-md-12"><label class="labels">Vacant</label><input type="text" class="form-control" value="'.$row["Vacant"].'" readonly></div> <br><div class="col-md-12"><label class="labels">Rent Balance</label><input type="text" class="form-control" value="'.$row["Rent Balance"].'" readonly></div> </div></div> ';
                }
                ?>
            </div>
        </div>
    </div>

</div>
</div>
