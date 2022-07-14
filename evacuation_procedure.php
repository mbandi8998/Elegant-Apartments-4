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
              
              <a href="emergency_contacts.php" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fa-solid fa-briefcase-medical"></i> <span class="pl-1">Emergency Contacts</span></a
              >
              <a href="evacuation_procedure.php" class="list-group-item list-group-item-action py-2 ripple active gradient-custom-3"
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
        <p class="my-3 h5">Fire Evacuation Procedure</p>
        <p class="w-75 mt-4">
        Fire and evacuation alarms are intended to alert building occupants that a fire or other life-threatening situation exists. Upon hearing the alarm, everyone should leave the building immediately. In the event of a fire, the following steps should be taken to ensure the safety of all building occupants:
        </p>

        <ol>
            <li>
                Activate the fire alarm.
            </li>
            <li>
                Call 999 immediately and provide information.
            </li>
            <li>
                Assist injured personnel or notify emergency responders of the medical emergency.
            </li>
            <li>
                Exit the building following emergency maps.
            </li>
            <li>
                Assist physically impaired individuals to a secure area and notify emergency responders.
            </li>
            <li>
                Ensure all personnel are out of the building.
            </li>
            <li>
                Do not use the elevators.
            </li>
            <li>
                Use a fire extinguisher only if safe to do so and you have been trained.
            </li>
            <li>
                Assemble personnel at a remote location noted on evacuation maps.
            </li>
            <li>
                Report hazardous conditions.
            </li>
            <li>
                Stay low if confronted with smoke. Check closed doors for heat before opening.
            </li>
            <li>
                Stay away from the building until it is safe to return.
            </li>
        </ol>
    </div>
  </div>
</div>

