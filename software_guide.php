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
              
              <a href="software_guide.php" class="list-group-item list-group-item-action py-2 ripple active gradient-custom-3"
                ><i class="fa-solid fa-book-open-reader"></i> <span class="pl-1">Software Guide</span></a
              >
            </div>
          </div>
        </nav>
        <!-- Sidebar -->
    </div>
    <div class="col-lg-10 mx-auto">
    <table class="table table-striped " >
              <thead>
                <tr class="text-danger">
                  <th scope="col-5">Action</th>
                  <th scope="col">Description</th>
                </tr>
              </thead>
              <tbody class="text-dark">
                  <tr>
                    <td style="font-weight:550;width:200px;">Add Tenant.</td>
                    <td>Click on add tenant (on the sidebar), you will then be redirected to the add tenant page. Fill in the add tenant form with the tenant's details and click submit to add the tenant</td>
                  </tr>
                  <tr>
                    <td style="font-weight:550;width:200px;">Manage Tenants.</td>
                    <td>To see all tenants details, clicl on Manage Tenants (on the sidebar)</td>
                  </tr>
                  <tr>
                    <td style="font-weight:550;width:200px;">Add House.</td>
                    <td>To add a new house, click on Add House (on the sidebar). You will then be redirected to the add house page. Fill in the add house form by entering the house number. Then click submit to add the house to the database. </td>
                  </tr>
                  <tr>
                    <td style="font-weight:550;width:200px;">Manage Houses.</td>
                    <td>To add manage various houses, click on Manage Houses (on the sidebar). You will then be redirected to the manage houses page. Choose whatever house you wish to see its details. You will then be redirected to a page that shows complete details for the house, this includes the house number, rent balance and vacancy status. </td>
                  </tr>
                  <tr>
                    <td style="font-weight:550;width:200px;">Financial History.</td>
                    <td>To see how elegant apartments is fairing financialy, go to finanacial hsitory (On te side bar)</td>
                  </tr>
                  <tr>
                    <td style="font-weight:550;width:200px;">Manage Visitors</td>
                    <td>To add, manage and signout incoming visitors, go to the manage vistors section by clicking on manage visitors (On the sidebar.)</td>
                  </tr>
                  <tr>
                    <td style="font-weight:550;width:200px;">Generate Report</td>
                    <td>To generate a report click on generate report (On the sidebar.)</td>
                  </tr>
                  <tr>
                    <td style="font-weight:550;width:200px;">Emergency Contacts</td>
                    <td>To get in touch with emergency services such as ambulance and fire fighting, click on the emergency contacts section (On the sidebar.) to get emergency contacts.</td>
                  </tr>
                  <tr>
                    <td style="font-weight:550;width:200px;">Evacuation Procedure</td>
                    <td>Incase of a fire or suspected fire outbreak, click on the evacuation procedure section (on the sidebar) and follow the instructions listed below. </td>
                  </tr>
                  
              </tbody>
          </table>
    </div>
  </div>
</div>


