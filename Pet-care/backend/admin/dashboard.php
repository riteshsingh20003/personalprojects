<?php
include 'conn.php';
session_start();
$userCountResult = $conn->query("SELECT COUNT(*) AS total_users FROM login_table");
$totalUsers = 0;

if ($userCountResult && $row = $userCountResult->fetch_assoc()) {
  $totalUsers = $row['total_users'];
}

$appointmentResult = $conn->query("SELECT COUNT(*) AS total_appointments FROM appointment_table");
$totalAppointments = 0;

if ($appointmentResult && $row = $appointmentResult->fetch_assoc()) {
  $totalAppointments = $row['total_appointments'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Purple Admin</title>
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">

  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <?php include "navbar.php" ?>
    <div class="container-fluid page-body-wrapper">
      <?php include "sidebar.php" ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
              </span> Dashboard
            </h3>
          </div>
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-primary card-img-holder text-white">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Update Your Details <i
                      class="mdi mdi-account-edit mdi-24px float-end"></i></h4>
                  <h2 class="mb-3">Personal Information</h2>
                  <h6 class="card-text mb-3">Click below to update your contact details, password, and more.</h6>
                  <a href="update_details.php" class="btn btn-light btn-sm">Update Now</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Total Registered Users <i
                      class="mdi mdi-account-multiple mdi-24px float-end"></i></h4>
                  <h2 class="mb-5"><?php echo $totalUsers; ?></h2>
                  <h6 class="card-text">User data display only</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Total Appointments <i
                      class="mdi mdi-calendar-check mdi-24px float-end"></i></h4>
                  <h2 class="mb-5"><?php echo $totalAppointments; ?></h2>
                  <h6 class="card-text">Overall appointments booked</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/vendors/chart.js/chart.umd.js"></script>
  <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <script src="assets/js/jquery.cookie.js"></script>
  <script src="assets/js/dashboard.js"></script>
</body>

</html>