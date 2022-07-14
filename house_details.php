<?php  echo @file_get_contents('header.php'); ?>

<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['admin'] == true && $_SESSION['loggedin'] == true) {
  
} else {
  header("Location:choose_login.php");
}
?>


<?php  echo @file_get_contents('navbar.php'); ?>
	


<div class="container-fluid" >
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
    <div class="col-lg-10 mx-auto">
      <div class="row my-4">
        <?php
            if(isset($_POST['house_no']) ){
                $house_no=$_POST['house_no'];

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

                $sql="SELECT * FROM `house` WHERE `House Number`=:house_no";
                $result = $pdo->prepare($sql);
                $result->execute(array(
                    ':house_no' => $house_no,   
                ));
                if($result->rowCount()>0){
                    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="col-lg-5 mx-auto my-5"> <div class="card"> <div class="card-header text-center h5 text-danger"> House No:  ' .$row["House Number"]. '</div> <div class="card-body"> <div class="d-flex justify-content-between"> <span class="px-2 h6">Rent Balance</span> <span class="px-2 h5 text-secondary"> ' .$row["Rent Balance"]. ' Ksh</span> </div> <hr> <div class="d-flex justify-content-between"> <span class="px-2 h6">Vacant</span> <span class="px-2 h5 text-secondary"> '.$row["Vacant"]. '</span> </div> </div> </div> </div> </div> </div> </div>';
                    }
                    
                }else{
                    echo '<div class="text-danger h6 text-center w-100 my-5">The house does not exist or was deleted from database</div>';
                }
            }
            else{
                header("Location:manage_houses.php");
            }
        ?>
      </div>
    </div>
   </div>
</div>


