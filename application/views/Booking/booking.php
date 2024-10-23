<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Movers</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Maintenance</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<!-- for multiple select -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous">

	<style type="text/css">
        body {
        background-color: #fbfbfb;
        font-family: "Poppins", sans-serif;
        }
        @media (min-width: 991.98px) {
        main {
            padding-left: 240px;
        }
        }

        /* Sidebar */
        .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        padding: 58px 0 0; /* Height of navbar */
        box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
        width: 240px;
        z-index: 600;
        }

        @media (max-width: 991.98px) {
        .sidebar {
            width: 100%;
        }
        }
        .sidebar .active {
        border-radius: 5px;
        box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
        }

        .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: 0.5rem;
        overflow-x: hidden;
        overflow-y: auto;
        }

        #mapContainer,
        #formContainer{
            margin: 2% 2% 2% 2%;
        }

        #bookingContainer{
            margin: 5% 2% 2% 2%;
        }

    </style>

</head>
<body>

<!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <nav
       id="sidebarMenu"
       class="collapse d-lg-block sidebar collapse bg-white"
       >
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a
           href="<?php echo site_url("dashboardController")?>"
           class="list-group-item list-group-item-action py-2 ripple"
           aria-current="true"
           >
          <i class="fas fa-tachometer-alt fa-fw me-3"></i
            ><span>Dashboard</span>
        </a>
        <a
           href="<?php echo site_url("usermaintenanceController")?>"
           class="list-group-item list-group-item-action py-2 ripple"
           >
          <i class="fas fa-chart-area fa-fw me-3"></i
            ><span>User Maintenance</span>
        </a>
        <a
            href="<?php echo site_url("storageManageController")?>"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-lock fa-fw me-3"></i><span style="font-size: 13px;">Storage Management</span></a
          >
        <a
           href="<?php echo site_url("bookingController")?>"
           class="list-group-item list-group-item-action py-2 ripple active"
           ><i class="fas fa-chart-line fa-fw me-3"></i
          ><span>Booking</span></a>
       <a
           href="<?php echo site_url("bookingpaymentController")?>"
           class="list-group-item list-group-item-action py-2 ripple"
           >
          <i class="fas fa-chart-pie fa-fw me-3"></i><span style="font-size: 10px;">Booking & Payment History</span>
        </a>
        <!-- <a
           href="#"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-chart-bar fa-fw me-3"></i><span>------</span></a
          >
        <a
           href="#"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-globe fa-fw me-3"></i
          ><span>------</span></a
          >
        <a
           href="#"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-building fa-fw me-3"></i
          ><span>------</span></a
          >
        <a
           href="#"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-calendar fa-fw me-3"></i
          ><span>------</span></a
          >
        <a
           href="#"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-users fa-fw me-3"></i><span>------</span></a
          >
        <a
           href="#"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-money-bill fa-fw me-3"></i><span>------</span></a
          > -->
      </div>
    </div>
  </nav>
  <!-- Sidebar -->

  <!-- Navbar -->
  <nav
       id="main-navbar"
       class="navbar navbar-expand-lg navbar-light bg-white fixed-top"
       >
    <!-- Container wrapper -->
    <div class="container-fluid">

      <!-- Brand -->
      <a class="navbar-brand" href="#">
        <img
             src="<?= base_url('/assets/images/logo.png');?>"
             height="25"
             alt=""
             loading="lazy"
             />
      </a>

      <span>Hello! <?php echo $this->session->userdata('user_name') ?></span>

      <div style="margin-left: 4%;">
        <i class="fas fa-home fa-fw me-3"></i><span>Home > <b>Booking</b></span>
      </div>

      <!-- Right links -->
      <ul class="navbar-nav ms-auto d-flex flex-row">
        <!-- Notification dropdown -->
        <li class="nav-item dropdown">
          <a
             class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow"
             href="#"
             id="navbarDropdownMenuLink"
             role="button"
             data-mdb-toggle="dropdown"
             aria-expanded="false"
             >
            <i class="fas fa-bell"></i>
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
          </a>
        </li>

        <!-- Icon -->
         
      </ul>
      <button id="logoutbtn" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-block" style="margin-left: 5px;padding: 5px 10px 5px 10px;">
						Logout
			</button>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px">

<div class="d-flex flex-row" id="bookingContainer" style="margin-top: 5 %; border: 5px solid #0D6EFD; border-radius: 15px;">

    <div class="d-flex flex-column" id="mapContainer">
        <span style="font-size: 24px; font-weight: bold;"> MAP GUIDE - METRO MANILA</span>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247138.79240879638!2d120.85583411249158!3d14.568070710163116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c8d26026386d%3A0x5fed23daac9278d0!2sMetro%20Manila!5e0!3m2!1sen!2sph!4v1728628647253!5m2!1sen!2sph" width="600" height="645" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="d-flex flex-column w-100" id="formContainer">
                <span style="font-size: 24px; font-weight: bold;"> Booking form </span>
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                        <div class="card bg-glass">
                            <div class="card-body px-4 py-5 px-md-5">
                    

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="drivername" class="form-control" />
                                    <label class="form-label" for="drivername">Driver name</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="clientname" class="form-control" />
                                    <label class="form-label" for="clientname">Client name</label>
                                </div>
                            
                                <div data-mdb-input-init class="d-flex flex-row form-outline">
                                    <input type="text" id="tripfrom" class="form-control" />
                                    <input type="text" id="tripto" class="form-control" />
                                    <select name="" id="service" class="selectpicker w-50">
                                        <option value="" selected disabled>Please select</option>
                                        <option value="4">4 seater car</option>
                                        <option value="6">6 seater car</option>
                                        <option value="2">Moto-taxi</option>
                                    </select>
                                </div>

                                    <label class="form-label" for="tripfrom">Trip from</label>
                                    <label class="form-label" style="margin-left: 32%;" for="tripto">Trip to</label>
                                    <label class="form-label" style="margin-left: 35%;" for="service">Service</label>
                                

                                <div data-mdb-input-init class="d-flex flex-row form-outline mt-4">
                                    <input type="number" id="amount" class="form-control" />
                                    <select name="" id="tips" class="selectpicker w-50">
                                        <option value="">No</option>
                                        <option value="10" selected>10%</option>
                                        <option value="30">30%</option>
                                        <option value="50">50%</option>
                                    </select>
                                </div>

                                <label class="form-label" for="password">Amount &</label>
                                <label class="form-label" for="tips">Tips</label>

                                <div data-mdb-input-init class="form-outline mt-4">
                                    <input type="number" id="totalamount" class="form-control" readonly/>
                                    <label class="form-label" for="totalamount">Total Amount</label>
                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-block" style="padding: 10px 50px 10px 50px;" id="bookingdraft">
                                        Book
                                    </button>
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block" style="padding: 10px 50px 10px 50px;" id="payment">
                                        Book and Proceed to payment
                                    </button>
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-block" style="padding: 10px 50px 10px 50px;" id="clear">
                                        Clear
                                    </button>
                                </div>                
                    </div>
                </div>
            
        
    </div>
</div>

<div class="modal fade" id="paymentmodal" tabindex="-1" role="dialog" aria-labelledby="paymentmodal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title text-light" id="paymentmodaltitle">Payment</h5>
        <button type="button" class="close btn btn-danger" data-dismiss="modal" onclick="$('#paymentmodal').modal('hide')" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="d-flex flex-column modal-body">
        <!-- <h3>GCASH Payment</h3>
        <img src="<?= base_url('/assets/images/logo.png');?>" alt="" height="100" width="100"/>
        <span>test name</span> -->

        <button class="btn btn-primary mb-3" id="cashonhandpay">Cash on hand</button>
        <button class="btn btn-primary" id="gcashpay">GCASH</button>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="cashonhand" tabindex="-1" role="dialog" aria-labelledby="paymentmodal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title text-light" id="paymentmodaltitle">Cash on hand</h5>
        <button type="button" class="close btn btn-danger" data-dismiss="modal" onclick="$('#cashonhand').modal('hide')" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="d-flex flex-column modal-body">

            <div data-mdb-input-init class="form-outline mb-4">
                <input type="number" id="cash" class="form-control" step="0.01" />
                <label class="form-label" for="cash">Cash</label>
            </div>

            <div data-mdb-input-init class="form-outline mb-4">
                <input type="number" id="totalfare" class="form-control" disabled/>
                <label class="form-label" for="totalfare">Total fare</label>
            </div>

            <div data-mdb-input-init class="form-outline mb-4">
                <input type="number" id="change" class="form-control" disabled/>
                <label class="form-label" for="change">Change</label>
            </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-success paybtn">Pay</button>
      </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="gcashmodal" tabindex="-1" role="dialog" aria-labelledby="paymentmodal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title text-light" id="paymentmodaltitle">Payment</h5>
        <button type="button" class="close btn btn-danger" data-dismiss="modal" onclick="$('#gcashmodal').modal('hide')" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="d-flex flex-column modal-body">
                <span style="font-size: 24px; font-weight: bold;">GCASH Payment</span>
                <img src="<?= base_url('/assets/images/QRCODE.png');?>" alt="" height="640" width="480"/>
        <div class="modal-footer">
            <button type="button" class="btn btn-success gcash_paybtn">Paid</button>
        </div>
      </div>
    </div>
  </div>
</div>

</main>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="<?= base_url() ?>JS/bookingJS.js"></script>
</html>