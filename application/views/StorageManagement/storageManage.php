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
           class="list-group-item list-group-item-action py-2 ripple active"
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
        <i class="fas fa-home fa-fw me-3"></i><span>Home > <b>Storage Management</b></span>
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
      <button href="<?php echo site_url("dashboardController/logout")?>" id="logoutbtn" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-block" style="margin-left: 5px;padding: 5px 10px 5px 10px;">
						Logout
			</button>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 6%;">

    <div style="margin: 3% 3% 3% 3%; padding: 3% 3% 3% 3%; border: 2px solid #0D6EFD; border-radius: 15px;">
      
      <div class="d-flex justify-content-between" style="margin-right: 1%;">
      <div>
          <button class="px-2 py-2 btn btn-primary btn-sm ml-2" id="additembtn"><i class="bi bi-file-earmark-plus" style="font-size: 15px; padding-right: 5px;"></i>Add Item</button>
      </div>
      <div class="d-flex mb-3 pr-2">
          <div class="d-flex align-items-center">

              <select name="status" multiple class="selectpicker mx-1" id="status" data-none-selected-text="Status">
                  <option value="1" selected>Active</option>
                  <option value="0">Inactive</option>
              </select>

              <select name="" id="sortBy" class="selectpicker mx-1 w-70">
                  <!-- <option value="id" selected>ID</option> -->
                  <option value="itemname">Name</option>
                  <option value="type">Type</option>
              </select>

              <select name="" id="sortOrder" class="selectpicker mx-1 w-25">
                  <option value="ASC" selected>ASC</option>
                  <option value="DESC">DESC</option>
              </select>

              <input type="number" name="" id="limit" class="form-control mx-1" style="width: 200px;" value="5" placeholder="Limit....">

              <input type="text" name="" id="search" class="form-control mx-1" style="width: 200px;" placeholder="Search....">

              <button id="searchbtn" class="btn btn-primary text-light me-2 mx-1">Filter</button>

          </div>
      </div>

      </div>
              
      <table class="table table-striped table-hover" style="width: 100%; border-color: grey;">
        <tr>
            <!-- <th>ID</th> -->
            <th style="font-size: 12px;">Item Name</th>
            <th style="font-size: 12px;">Quantity</th>
            <th style="font-size: 12px;">Type</th>
            <th style="font-size: 12px;">Created By</th>
            <th style="font-size: 12px;">Created Date</th>
            <th style="font-size: 12px;">Updated By</th>
            <th style="font-size: 12px;">Updated Date</th>
            <th style="font-size: 12px;">Status</th>
            <th style="font-size: 12px;">Action</th>
        </tr>
        <tbody id="tblitembody">
            <tr>
                <td colspan="14" class="text-center fs-4">Loading Data....</td>
            </tr>
        </tbody>
      </table>

        <div class="d-flex justify-content-between">
          <div class="ml-2 mt-3" id="pagination_controls"></div>
        <div class="align-self-start text-light px-2 py-2 mr-2 mt-3 border-0 rounded bg-primary">Total Records found: <span id="recordcount"></span></div>
    </div>
    
    </div>


    <!-- Modal -->
<div class="modal" id="additemmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-light" id="modaltitle">Add Item</h5>
        <button type="button" class="btn btn-danger" onclick="$('#additemmodal').modal('hide')">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

          <div class="position-relative">
            <div class="card bg-glass">
              <div class="card-body px-4 py-5">
                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="itemname" class="form-control" />
                    <label class="form-label" for="itemname">Item name</label>
                  </div>
                
                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="number" id="qty" class="form-control" />
                    <label class="form-label" for="qty">Quantity</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="type" class="form-control" />
                    <label class="form-label" for="type">Type</label>
                  </div>

                  <div class="text-center" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block align-items-center" style="padding: 10px 50px; display: block;" id="additem">
                        Submit
                    </button>
                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block align-items-center" style="padding: 10px 50px; display: none;" id="edititem">
                        Submit Changes
                    </button>
                </div>
              </div>
            </div>
          </div>

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary align-item-start" onclick="$('#additemmodal').modal('hide')">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- MODAL -->

<div class="modal" id="promptMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header prompheader" id="prompheader">
        <h5 class="modal-title text-light" id="prompttitle"></h5>
        <button type="button" class="btn btn-danger" onclick="$('#promptMessage').modal('hide')">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <div style="padding: 5% 5% 5% 5%">
        <h3>Are you sure?</h3>
        
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" id="disableitem">Yes</button>
        <button class="btn btn-primary" id="activateitem">Yes</button>
        <button class="btn btn-danger" onclick="$('#promptMessage').modal('hide')">No</button>
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
<script type="text/javascript" src="<?= base_url() ?>JS/storageManageJS.js"></script>
</html>