<?php  echo @file_get_contents('header.php'); ?>

<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['admin'] == true && $_SESSION['loggedin'] == true) {
  
} else {
  header("Location:choose_login.php");
}
?>


<?php  echo @file_get_contents('navbar.php'); ?>


<div class="container-fluid" style="background-image:url('rental004.jpg');background-size:cover;">
    <div class="row" style="min-height:100vh;">
      <div class="col-lg-2" style="background-color:#edece6;padding: 0 !important;">
          <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white h-100 w-100">
          <div class="position-sticky">
            <div class="list-group list-group-flush mx-1 mt-3">
              <a href="index.php" class="list-group-item list-group-item-action py-2 ripple active gradient-custom-3">
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

      <div class="col-lg-10 my-3 mx-auto" style="min-height: 60vh;">
      <div class="row">
        <div class="col-lg-6">
          <div class="text-center my-2 h5 text-light">Quick Access</div>
          <div class="divider w-100 bg-light" style="height:2px;"></div>
          <div class="my-3">
            <a href="manage_visitors.php" class="d-flex justify-content-between text-light h5" style="text-decoration:none;">
              <span>Manage Visitors</span>
              <span class="fa fa-arrow-right "></span>
            </a>
          </div>
          <div class="divider w-100 bg-light" style="height:2px;"></div>
          <div class="my-3">
            <a href="visitors_record.php" class="d-flex justify-content-between text-light h5" style="text-decoration:none;">
              <span>Visitors Record</span>
              <span class="fa fa-arrow-right "></span>
            </a>
          </div>
          <div class="divider w-100 bg-light" style="height:2px;"></div>
          <div class="my-3">
            <a href="generate_report.php" class="d-flex justify-content-between text-light h5" style="text-decoration:none;">
              <span>Generate Report</span>
              <span class="fa fa-arrow-right "></span>
            </a>
          </div>
        </div>
        <div class="col-lg-6">
        <form action="check_pay_rent.php" method="POST" class="my-5">
          <div class="card rounded-3 w-75 mx-auto" style="border-radius:12px;border-color:#d8363a;border-style:solid;border-width:medium;">
            <div class="card-body">
              <h4 class="text-center text-danger my-2">Pay Rent (Tenant) </h4>
                    <!-- Start of php error display code -->
                    <!------------------------------------->
                    
                    <?php
                      if(isset($_GET['successcode'])){
                        echo '<script>alert("Rent Paid Successfully")</script>';                      
                      }
                      if(isset($_GET['errorcode'])){
                        echo '<span style="color: red;">The tenant has already paid rent for this month.</span>';                      
                      }
                      if(isset($_GET['oversufficient'])){
                        echo '<span style="color: red;">The amount entered is more than the amount due.</span>';                      
                      }
                      

                    ?>
                    <!-- end of php error display code -->
                    <!----------------------------------->

                <div class="row py-2">
                    <div class="col-md-12">

                      <div class="form-outline datepicker">
                        <label class="form-label h6">Tenant Id Number: </label>
                        <input type="text" minlength="7" maxlength="8" name="id_number" class="form-control" required />
                        
                      </div>

                    </div>

                    <div class="col-md-12">

                      <div class="form-outline datepicker">
                        <label class="form-label h6">Amount Paid: </label>
                        <input type="number" minlength="7" max="6000" name="amount" class="form-control" required />
                        
                      </div>

                    </div>

                </div>

              <div class="d-flex justify-content-end">
                <button type="submit" class=" my-2 btn btn-lg mb-1 gradient-custom-3 text-light">Submit</button>
              </div>
    
            </div>
          </div>
        </form>
        </div>

        </div>
      </div>
    </div>
  </div>
  
