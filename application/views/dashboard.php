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
        font-family: "Poppins", sans-serif;
        background-color: #ede8e8;
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


        #chartContainerUsers,
        #chartContainerPIE,
        #chartContainerBooking,
        #chartContainerPayment {
          margin: 0.2% 0.5% 1% 0.5%;
          border: 10px solid #0D6EFD;
          border-radius: 15px; 
          transition: transform 0.3s ease; 
        }

        #chartContainerUsers:hover,
        #chartContainerPIE:hover,
        #chartContainerBooking:hover,
        #chartContainerPayment:hover {
          transform: scale(1.01); 
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
           class="list-group-item list-group-item-action py-2 ripple active"
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
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-chart-line fa-fw me-3"></i
          ><span>Booking</span></a
          >
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
        <i class="fas fa-home fa-fw me-3"></i><span>Home > <b>Dashboard</b></span>
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

<?php      
  $dataPoints = array();

  $months = [
      "January", "February", "March", "April", "May", "June", 
      "July", "August", "September", "October", "November", "December"
  ];

  foreach ($months as $month) {
      $count = 0;
      foreach ($usercount as $user) {
          if ($user['month'] == $month) {
              $count = $user['user_count'];
              break;
          }
      }
      $dataPoints[] = array("y" => $count, "label" => $month);
  }


    $dataPoints2 = array();

    foreach ($itemcount as $item) {
        $quantity = is_numeric($item['qty']) ? $item['qty'] : 0;
        $dataPoints2[] = array(
            "label" => $item['itemname'], 
            "y" => $quantity
        );
    }

    $datapointsBooking = array();

      $monthsbooking = [
          "January", "February", "March", "April", "May", "June", 
          "July", "August", "September", "October", "November", "December"
      ];

      foreach ($monthsbooking as $month) {
          $count = 0;
          foreach ($bookingcount as $booking) {
              if ($booking['month'] == $month) {
                  $count = $booking['BookingCount'];
                  break;
              }
          }
          $datapointsBooking[] = array("y" => $count, "label" => $month);
      }


      $dataPointsPayments = array();

      $monthspayments = [
          "January", "February", "March", "April", "May", "June", 
          "July", "August", "September", "October", "November", "December"
      ];

      foreach ($monthspayments as $monthpay) {
        $count = 0;
        foreach ($paymentcount as $payment) {
            if ($payment['month'] == $monthpay) {
                $count = $payment['paidCount'];
                break;
            }
        }
        $dataPointsPayments[] = array("y" => $count, "label" => $monthpay);
    }



?>
  <script>
    window.onload = function() {
      // Render Users Bar Graph
      var chartUsers = new CanvasJS.Chart("chartContainerUsers", {
        animationEnabled: true,
        theme: "light2",
        title:{
          text: "User Count"
        },
        data: [{
          type: "column",
          yValueFormatString: "",
          dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
      });
      chartUsers.render();

      // Render Items Pie Chart
      var chartItems = new CanvasJS.Chart("chartContainerPIE", {
        animationEnabled: true,
        title: {
          text: "Storage"
        },
        data: [{
          type: "pie",
          yValueFormatString: "#,##0.00\"%\"",
          indexLabel: "{label} ({y})",
          dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
        }]
      });
      chartItems.render();

      // Render Users Bar Graph BOOKING
      var chartBooking = new CanvasJS.Chart("chartContainerBooking", {
        animationEnabled: true,
        theme: "light2",
        title:{
          text: "Booking Count"
        },
        data: [{
          type: "column",
          yValueFormatString: "",
          dataPoints: <?php echo json_encode($datapointsBooking, JSON_NUMERIC_CHECK); ?>
        }]
      });
      chartBooking.render();


      //Render payments
      var chartPayment = new CanvasJS.Chart("chartContainerPayment", {
        title: {
          text: "Received payments for the year"
        },
        axisY: {
          title: "Payments"
        },
        data: [{
          type: "line",
          dataPoints: <?php echo json_encode($dataPointsPayments, JSON_NUMERIC_CHECK); ?>
        }]
      });
      chartPayment.render();
    
    }
  </script>

<div class="recentrecordsContainer d-flex flex-row">
</div>

<div class="bookingpaymentContainer d-flex flex-row">
</div>

<span style="font-size: 24px; font-weight: bold; margin-left: 10px;"> Booking </span>
<hr style="width: 90%; margin-left: 10px;">
<div class="maintenanceContainer d-flex flex-row justify-content-center">
  <div id="chartContainerBooking" style="height: 250px; width: 100%;"></div>
</div>

<span style="font-size: 24px; font-weight: bold; margin-left: 10px;"> Payments </span>
<hr style="width: 90%; margin-left: 10px;">
<div class="maintenanceContainer d-flex flex-row justify-content-center">
  <div id="chartContainerPayment" style="height: 250px; width: 100%;"></div>
</div>


<span style="font-size: 24px; font-weight: bold; margin-left: 10px;"> Maintenance</span>
<hr style="width: 90%; margin-left: 10px;">
<div class="maintenanceContainer d-flex flex-row justify-content-center">
  <div id="chartContainerUsers" style="height: 200px; width: 70%;"></div>
  <div id="chartContainerPIE" style="height: 200px; width: 30%;"></div>
</div>
<!-- ITEMS BAR GRAPH END -->
</main>

</body>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="<?= base_url() ?>JS/dashboardJS.js"></script>
</html>