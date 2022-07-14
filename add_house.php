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
              <a
                href="#"
                class="list-group-item list-group-item-action py-2 ripple"
                aria-current="true"
              >
              </a>
              <a href="index.php" class="list-group-item list-group-item-action py-2 ripple ">
              <i class="fa-solid fa-gauge"></i> <span class="px-1">Main Dashboard</span>
              </a>
              <a href="add_tenant.php" class="list-group-item list-group-item-action py-2 ripple "
                ><i class="fas fa-user-plus fa-fw me-3"></i> <span class="px-1">Add Tenant</span></a
              >

              <a href="manage_tenants.php" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fas fa-users fa-fw me-3"></i> <span class="pl-1">Manage Tenants</span></a
              >

              <a href="add_house.php" class="list-group-item list-group-item-action py-2 ripple active gradient-custom-3"
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
    <div class="col-lg-10 mx-auto">
      <form action="check_add_house.php" method="POST" class="my-5">
        <div class="card rounded-3 w-75 mx-auto" style="border-radius:12px;border-color:#d8363a;border-style:solid;border-width:medium;">
          <div class="card-body">
            <h4 class="text-center text-danger my-2">Add House</h4>
                  <!-- Start of php error display code -->
                  <!------------------------------------->
                  <?php
                  if(isset($_GET['errcode'])){
                      if($_GET['errcode']==1){
                          echo '<span style="color: red;">The house number you entered already exists, try entering another house number.</span>';
                      };
                  }

                  ?>
                  <!-- end of php error display code -->
                  <!----------------------------------->

              <div class="row py-2">
                  <div class="col-md-12">
  
                    <div class="form-outline datepicker">
                      <label class="form-label h6">House Number: </label>
                      <input type="text" maxlength="150" name="house_no" class="form-control" required placeholder="Enter house number here i.e A1"/>
                      
                    </div>
  
                  </div>
                  
              </div>


            <div class="d-flex justify-content-end" >
              <button type="submit" class=" my-3 btn  btn-lg mb-1 gradient-custom-3 text-light" style="font-size:0.9rem;"><i class="fa fa-plus"></i>  Add House</button>
            </div>
  
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

