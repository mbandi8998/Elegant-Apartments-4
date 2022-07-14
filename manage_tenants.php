<?php  echo @file_get_contents('header.php'); ?>

<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['admin'] == true && $_SESSION['loggedin'] == true) {
  
} else {
  header("Location:choose_login.php");
}
?>


<?php  echo @file_get_contents('navbar.php'); ?>


<div id="overlay" class="w-100 h-100" style="background-color:rgb(255,0,0,0.7);position:fixed;z-index:3;display:none;">

  <div class="container-fluid">
    <div class="d-flex justify-content-end my-3 mx-3">
        <span class="bg-light px-2 py-1" style="border-radius:50%;" onclick="hide_overlay()">
          <span class="fa fa-times text-danger" style="font-size:1.2rem;"></span>
        </span>
    </div>
    <div class="row">
      
    <div class="col-lg-10 mx-auto">
      
      <form action="check_edit_tenant_details.php" method="POST" class="my-5">
        
        <div class="card rounded-3 w-75 mx-auto" style="border-radius:12px;border-color:#d8363a;border-style:solid;border-width:medium;">
          <div class="card-body">
            <h4 class="text-center text-danger my-2">Edit Tenant Details</h4>
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

              <div>
                <input id="tenant_id" type="hidden" name="tenant_id">
              </div>
              <div class="row py-2">
                  <div class="col-md-6">
  
                    <div class="form-outline datepicker">
                      <label class="form-label h6">First Name: </label>
                      <input id="first_name" type="text" maxlength="150" name="first_name" class="form-control" required/>
                      
                    </div>
  
                  </div>
                  <div class="col-md-6">
  
                    <div class="form-outline datepicker">
                      <label class="form-label h6">Last Name: </label>
                      <input id="last_name" type="text" maxlength="150" name="last_name" class="form-control" required/>
                      
                    </div>
  
                  </div>
              </div>

              <div class="row py-2">
                <div class="col-md-6">

                  <div class="form-outline datepicker">
                    <label class="form-label h6">Id Number: </label>
                    <input id="id_number" type="text" minlength="7" maxlength="8" name="id_number" class="form-control" required />
                    
                  </div>

                </div>
                <div class="col-md-6">

                  <div class="form-outline datepicker">
                    <label class="form-label h6">Phone Number : </label>
                    <input id="phone_number" type="text" minlength="10" maxlength="15" name="phone_number" class="form-control" required/>
                    
                  </div>

                </div>
            </div>

            <div class="row py-2">
                <div class="col-md-6">

                  <div class="form-outline datepicker">
                    <label class="form-label h6">House Number: </label>
                    <select id="house_number" class="form-control" name="house_number" required>
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
                            $sql="SELECT `House Number` FROM `house`";
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
                    <input id="emergency_contact" type="text" minlength="10" maxlength="15" name="emergency_contact" class="form-control" required/>
                    
                  </div>

                </div>
            </div>


            <div class="d-flex justify-content-end">
              <button type="submit" class=" my-2 btn btn-lg mb-1 gradient-custom-3 text-light">Save</button>
            </div>
  
          </div>
        </div>
      </form>
    </div>
    </div>
  </div>

</div>


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

              <a href="manage_tenants.php" class="list-group-item list-group-item-action py-2 ripple active gradient-custom-3"
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
    <?php
      if(isset($_GET['successcode'])){
          if($_GET['successcode']==1){
              echo '<script>alert("Tenant Details Edited Successfully")</script>';
          };
          
      }

      ?>
    
    <div class="row my-4 px-3">
        
        <div class="h5 text-center my-3 w-100"><span class="text-light gradient-custom-3 px-3 py-2">Tenants Details</span></div>
        <table class="table table-striped " >
            <thead>
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">ID Number</th>
                <th scope="col">Phone Number</th>
                <th scope="col">House Number</th>
                <th scope="col">Emergency Contact</th>
                <th scope="col"></th>
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

                    $sql="SELECT * FROM `tenant`";
                    $result = $pdo->query($sql);
                    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr><td>'.$row["First Name"].'</td><td>'.$row["Last Name"].'</td><td>'.$row["ID Number"].'</td><td>'.$row["Phone Number"].'</td><td>'.$row["House Number"].'</td><td>'.$row["Emergency Contact"].'</td>';
                        echo '<td><button data-tenantid="'.$row["Id"].'" data-firstname="'.$row["First Name"].'" data-lastname="'.$row["Last Name"].'" data-idnumber="'.$row["ID Number"].'" data-phonenumber="'.$row["Phone Number"].'" data-housenumber="'.$row["House Number"].'" data-emergencycontact="'.$row["Emergency Contact"].'" class="edit_tenant_details btn btn-secondary text-light btn-md px-3 my-1"><i class="fa fa-pen"></i> Edit Details </button></td></tr>';
                        
                    }
                ?>
            </tbody>
                
        </table>
      </div>
    </div>
  </div>
</div>


<script>
  let btns = document.querySelectorAll(".edit_tenant_details");

  for (let i = 0; i < btns.length; i++) {
      let btn = btns[i];
      btn.addEventListener("click", edit_tenant_details);

  }


  function edit_tenant_details(event) {
      let firstname = event.target.dataset.firstname;
      let lastname = event.target.dataset.lastname;
      let idnumber = event.target.dataset.idnumber;
      let phonenumber = event.target.dataset.phonenumber;
      let housenumber = event.target.dataset.housenumber;
      let emergencycontact = event.target.dataset.emergencycontact;
      let tenantid = event.target.dataset.tenantid;

      document.getElementById("first_name").value = firstname;
      document.getElementById("last_name").value = lastname;
      document.getElementById("id_number").value = idnumber;
      document.getElementById("phone_number").value = phonenumber;
      document.getElementById("house_number").value = housenumber;
      document.getElementById("emergency_contact").value = emergencycontact;
      document.getElementById("tenant_id").value = tenantid;
      
      document.getElementById("overlay").style.display = "block";

  }

  function hide_overlay(){
    document.getElementById("overlay").style.display = "none";
  }



</script>


