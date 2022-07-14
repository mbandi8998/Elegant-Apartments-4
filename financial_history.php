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
              <a href="index.php" class="list-group-item list-group-item-action py-2 ripple ">
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

              <a href="manage_houses.php" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fa-solid fa-house-user"></i> <span class="pl-1">Manage Houses</span></a
              >
              
              <a href="financial_history.php" class="list-group-item list-group-item-action py-2 ripple active gradient-custom-3">
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
        <div class="card-group">
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

          $year = date("Y");
          $month = date("m");
          $yearly_revenue = 0;
          $total_unpaid_rent = 0;
          $paid_rent_this_month = 0;
          $unpaid_rent_this_month = 0;

          $sql="SELECT * FROM `rent` WHERE `Year`=:year";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':year' => $year,
          ));

          while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
            $status = $row["Status"];
            if ($status == "paid"){
              $yearly_revenue = $yearly_revenue + 6000;
              if ($month == $row["Month"]){
                $paid_rent_this_month = $paid_rent_this_month + 6000;
              }
            }
            else{
              $total_unpaid_rent = $total_unpaid_rent + $row["Amount Due"];
              if ($month == $row["Month"]){
                $unpaid_rent_this_month = $unpaid_rent_this_month +  $row["Amount Due"];
              }
            }
            
          }


          echo '<div class="card rounded gradient-custom-3 mx-3 my-3">
                  <div class="card-body mx-3 ">
                    <div class="text-light h6 text-center">Revenue Generated <br> (This Year):</div>
                    <div class="d-flex justify-content-center py-2">
                      <div class="text-center h5 text-danger btn btn-light " style="font-weight:bold;"><i class="fa fa-money-bill-alt text-secondary"></i> '.$yearly_revenue.'Ksh</div>
                    </div>
                  </div>
                </div>
                <div class="card rounded gradient-custom-3 mx-3 my-3">
                  <div class="card-body mx-3 ">
                    <div class="text-light h6 text-center">Total Unpaid Rent <br> (This Year):</div>
                    <div class="d-flex justify-content-center py-2">
                      <div class="text-center h5 text-danger btn btn-light " style="font-weight:bold;"><i class="fa fa-money-bill text-secondary"></i> '.$total_unpaid_rent.' Ksh</div>
                    </div>
                  </div>
                </div>
                <div class="card rounded gradient-custom-3 mx-3 my-3">
                  <div class="card-body mx-3 ">
                    <div class="text-light h6 text-center">Paid Rent <br> (This Month):</div>
                    <div class="d-flex justify-content-center py-2">
                      <div class="text-center h5 text-danger btn btn-light " style="font-weight:bold;"><i class="fa fa-money-bill-wave text-secondary"></i> '.$paid_rent_this_month.' Ksh</div>
                    </div>
                  </div>
                </div>
                <div class="card rounded gradient-custom-3 mx-3 my-3">
                  <div class="card-body mx-3 ">
                    <div class="text-light h6 text-center">Unpaid Rent <br> (This Month):</div>
                    <div class="d-flex justify-content-center py-2">
                      <div class="text-center h5 text-danger btn btn-light " style="font-weight:bold;"><i class="fa fa-money-bill-wave text-secondary"></i> '.$unpaid_rent_this_month.' Ksh</div>
                    </div>
                  </div>
                </div>
                
              </div>
          '
        ?>


        <div class="h5 text-center my-3 w-100"><span class="text-danger px-3 py-2">Payments Record</span></div>
        <table class="table table-striped " >
            <thead>
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">House Number</th>
                <th scope="col">Year</th>
                <th scope="col">Month</th>
                <th scope="col">Amoun Due</th>
                <th scope="col">Status</th>
                
            </tr>
            </thead>
            <tbody class="text-dark">
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

                date_default_timezone_set("Africa/Nairobi");
                $date_today = date("d-m-y");

                $end_month = date("Y-m-t", strtotime($date_today));

                $year = date("Y");
                $month = date("m");

                if ($date_today == $end_month ){
                  $sql="SELECT * FROM `rent` WHERE `Year`=:year AND `Month`=:month";
                  $stmt = $pdo->prepare($sql);
                  $stmt->execute(array(
                      ':year' => $year,
                      ':month' => $month,    
                  ));
                    
                  if($stmt->rowCount()<1){
                      $sql3="SELECT `ID Number` FROM `tenant`";
                      $stmt3 = $pdo->prepare($sql3);
                      $stmt3->execute();
                      while ( $row = $stmt3->fetch(PDO::FETCH_ASSOC) ) {

                          $tenant_id_number = $row["ID Number"];
                          $sql="INSERT INTO `rent` (`Tenant Id Number`, `Year`, `Month`, `Amount Due`, `Status`) VALUES (:tenant_id_number,:year,:month, 6000, 'unpaid')";
                          $stmt2 = $pdo->prepare($sql);
                          $stmt2->execute(
                              [
                              ':tenant_id_number' => $tenant_id_number,
                              ':year' => $year,
                              ':month' => $month,
                              ]
                          );
                      }
                      echo("Done");

                      
                  }
                }


                $sql4="SELECT * FROM `rent`";
                $stmt4 = $pdo->prepare($sql4);
                $stmt4->execute(array(
                    ':year' => $year,
                    ':month' => $month,    
                ));


                while ( $row = $stmt4->fetch(PDO::FETCH_ASSOC) ) {
                  $id_no = $row["Tenant Id Number"];
                  $amount_due = $row["Amount Due"];
                  $status = $row["Status"];
                  $year = $row["Year"];
                  $month = $row["Month"];

                  $sql5="SELECT * FROM `tenant` WHERE `ID Number` =:id_no";
                  $stmt5 = $pdo->prepare($sql5);
                  $stmt5->execute(array(
                      ':id_no' => $id_no,
                  ));
                  while ( $row = $stmt5->fetch(PDO::FETCH_ASSOC) ) {
                      echo '<tr><td>'.$row["First Name"].'</td><td>'.$row["Last Name"].'</td><td>'.$row["Phone Number"].'</td><td>'.$row["House Number"].'</td><td>'.$year.'</td><td>'.$month.'</td><td>'.$amount_due.'</td><td>'.$status.'</td></tr>';
                  }

                }
                  


              ?>
            </tbody>
                
        </table>

    </div>
  </div>
</div>


