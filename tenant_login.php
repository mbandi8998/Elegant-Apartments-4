<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="https://res.cloudinary.com/wine-talks-show/image/upload/v1655114315/Wine%20Talks%20LOgo/winetalk_logo_from_liz-removebg-preview_1_pcn05v.png">
  <link rel="apple-touch-icon" sizes="200x200" href="https://res.cloudinary.com/wine-talks-show/image/upload/v1655114315/Wine%20Talks%20LOgo/winetalk_logo_from_liz-removebg-preview_1_pcn05v.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
      Elegant Apartments
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="Wine Talks Show, Online Wine Shop/Store, Simply the best wines, Everything at affordable prices, ">
  <meta property="og:site_name" content="Wine Talks | Online Wine Shop/Store.">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="application-name" content="Wine Talks | Online Wine Shop/Store.">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-title" content="Wine Talks | Online Wine Shop/Store.">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
  <link rel="stylesheet" href="https://res.cloudinary.com/dm0hew9tr/raw/upload/v1610528725/static/trees/style_vsjhsd.css">
  <link rel="stylesheet" href="https://res.cloudinary.com/nishowkenya/raw/upload/v1620198889/css%20links/base_xlidfl.css">
  <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<style>
  .gradient-custom-2 {
      /* fallback for old browsers */
      background: #fccb90;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
      }

      @media (min-width: 768px) {
      .gradient-form {
      height: 100vh !important;
      }
      }
      @media (min-width: 769px) {
      .gradient-custom-2 {
      border-top-right-radius: .3rem;
      border-bottom-right-radius: .3rem;
      }
  }
</style>


<section class="h-100 gradient-form" style="background-image: url('rental004.jpg');background-size: cover;">
  <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="elegant_apartments_logo.webp"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Elegant Apartments</h4>
                </div>

                <form action="check_tenant_login.php" method="POST" id="landlord_login" >
                  <p class="h6" style="color:#d8363a">Tenant Login</p>

                  <!-- Start of php error display code -->
                  <!------------------------------------->
                  <?php
                  if(isset($_GET['errcode'])){
                      if($_GET['errcode']==1){
                          echo '<span style="color: red;">Invalid username or password.</span>';
                      }elseif($_GET['errcode']==2){
                          echo '<span style="color: red;">Please login.</span>';
                      }elseif($_GET['errcode']==3){
                        echo '<span style="color: red;">Please login.</span>';
                      }
                      
                  }

                  ?>
                  <!-- end of php error display code -->
                  <!----------------------------------->

                  <div class="form-outline mb-2">
                    <label class="form-label" for="form2Example11">ID Number:</label>
                    <input name="id_number" type="text"  id="form2Example11" class="form-control"
                      placeholder="ID Number" required/>
                  </div>

                  <div class="form-outline mb-2">
                    <label class="form-label" for="form2Example22">Password:</label>
                    <input id="the_password" name="password" type="password" id="form2Example22"  class="form-control" required/>
                    
                  </div>

                  <div class="text-center pt-1 mb-2 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Login</button>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">At Elegant Apartments, we have always put transparency , accountability and the tenants's needs first, that is what has propelled us this far. Rent with us , we ensure you get a house tastefully designed to cater to all of your needs.</p>
                <br>
                <br>
                <span class="fa fa-quote-left px-2"></span> <span class="font-size: 1.2 rem !important;">Your home should tell a story of who you are and be a collection of what you love </span><span class="fa fa-quote-right px-2"></span> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  
