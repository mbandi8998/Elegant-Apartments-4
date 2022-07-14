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
              <a href="add_tenant.php" class="list-group-item list-group-item-action py-2 ripple active gradient-custom-3"
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
    <div class="col-lg-10 mx-auto">
      <form action="check_add_tenant.php" method="POST" class="my-5">
        <div class="card rounded-3 w-75 mx-auto" style="border-radius:12px;border-color:#d8363a;border-style:solid;border-width:medium;">
          <div class="card-body">
            <h4 class="text-center text-danger my-2">Add Tenant</h4>
                  <!-- Start of php error display code -->
                  <!------------------------------------->
                  <?php
                  if(isset($_GET['errcode'])){
                      if($_GET['errcode']==1){
                          echo '<span style="color: red;">A tenant with the ID Number you entered already exists.</span>';
                      };

                      if($_GET['errcode']==2){
                          echo '<span style="color: red;">The house number you entered does not exist.</span>';
                      };

                      if($_GET['errcode']==3){
                        echo '<span style="color: red;">The house number you entered is not vacant.</span>';
                    };
                      
                  }

                  ?>
                  <!-- end of php error display code -->
                  <!----------------------------------->
              <div class="row py-2">
                  <div class="col-md-6">
  
                    <div class="form-outline datepicker">
                      <label class="form-label h6">First Name: </label>
                      <input type="text" maxlength="150" name="first_name" class="form-control" required placeholder="i.e John"/>
                      
                    </div>
  
                  </div>
                  <div class="col-md-6">
  
                    <div class="form-outline datepicker">
                      <label class="form-label h6">Last Name: </label>
                      <input type="text" maxlength="150" name="last_name" class="form-control" required placeholder="baraka"/>
                      
                    </div>
  
                  </div>
              </div>

              <div class="row py-2">
                <div class="col-md-6">

                  <div class="form-outline datepicker">
                    <label class="form-label h6">Id Number: </label>
                    <input type="text" minlength="7" maxlength="8" name="id_number" class="form-control" required />
                    
                  </div>

                </div>
                <div class="col-md-6">

                  <div class="form-outline datepicker">
                    <label class="form-label h6">Phone Number : </label>
                    <input type="text" minlength="10" maxlength="15" name="phone_number" class="form-control" required placeholder="i.e 071234578"/>
                    
                  </div>

                </div>
            </div>

            <div class="row py-2">
                <div class="col-md-6">

                  <div class="form-outline datepicker">
                    <label class="form-label h6">House Number: </label>
                    <div class="text-info h6">* only houses that are vacant are displayed</div>
                    <select class="form-control" name="house_number" required>
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
                            $sql="SELECT `House Number` FROM `house` WHERE `Vacant`='yes' ";
                            $result = $pdo->query($sql);
                            echo '<option>Choose...</option>';
                            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option value="'.$row["House Number"].'">'.$row["House Number"].'</option>';
                            };
                        ?>
                    </select>
                    
                  </div>

                </div>
                <div class="col-md-6">

                  <div class="form-outline datepicker">
                    <label class="form-label h6">Emergency Contact Phone Number: </label>
                    <input type="text" minlength="10" maxlength="15" name="emergency_contact" class="form-control" required placeholder="i.e 071234578"/>
                    
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

