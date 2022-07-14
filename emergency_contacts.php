<?php  echo @file_get_contents('header.php'); ?>

<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  
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
              
              <a href="emergency_contacts.php" class="list-group-item list-group-item-action py-2 ripple active gradient-custom-3"
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
        <div class="container py-5">

            <div class="row my-2">
            <div class="col-lg-4">
                <div class="card mb-2 bg-light">
                <div class="card-body text-center">
                    <img src="fire_department.png" alt="Fire Department"
                    class="img-fluid" style="width: 150px;">
                    <h5 class="my-2">Fire Department</h5>
                    <p class="text-muted mb-1"><span class="h6">Address</span>: 206 MAGADI ROAD 23 ONGATA RONGAI KE</p>
                    <p class="text-muted mb-4"></p>
                    
                </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-2">
                <div class="card-body">
                    <div class="row">
                    <div class="col-sm-4">
                        <p class="mb-0 h6">Name</p>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-muted mb-0">Fire Depratment Rongai</p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-4">
                        <p class="mb-0 h6">Emergency Contact 1</p>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-muted mb-0">0712341239</p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-4">
                        <p class="mb-0 h6">Emergency Contact 2</p>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-muted mb-0">0718808080</p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-4">
                        <p class="mb-0 h6">Emergency Contact 3</p>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-muted mb-0">0718808081</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div class="row my-2">
            <div class="col-lg-4">
                <div class="card mb-2 bg-light">
                <div class="card-body text-center">
                    <img src="ambulance.png" alt="Fire Department"
                    class="img-fluid" style="width: 150px;">
                    <h5 class="my-2">Sinai Hospital Rongai</h5>
                    <p class="text-muted mb-1"><span class="h6">Address</span>: Silver Plaza, Magadi Rd, Ongata Rongai</p>
                    <p class="text-muted mb-4"></p>
                    
                </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-2">
                <div class="card-body">
                    <div class="row">
                    <div class="col-sm-4">
                        <p class="mb-0 h6">Name</p>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-muted mb-0">Sinai Hospital Rongai</p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-4">
                        <p class="mb-0 h6">Emergency Contact 1</p>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-muted mb-0">0726806412</p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-4">
                        <p class="mb-0 h6">Emergency Contact 2</p>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-muted mb-0">072806413</p>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-4">
                        <p class="mb-0 h6">Emergency Contact 3</p>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-muted mb-0">0728806414</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
  </div>
</div>

