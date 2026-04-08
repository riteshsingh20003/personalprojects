<?php
include 'conn.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../../user_login.php");
    exit();
}

$username = $_SESSION['username'];

if (isset($_GET['cancel'])) {
    $cancelId = intval($_GET['cancel']);
    $stmt = $conn->prepare("UPDATE appointment_table SET Status = 'Cancelled' WHERE id = ? AND Username = ?");
    $stmt->bind_param("is", $cancelId, $username);
    $stmt->execute();
    $stmt->close();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$stmt = $conn->prepare("SELECT id, Name, Pet_type, Pet_name, Date, Service_type, Comments, Status, Price, Payment_Type, Username, E_Date FROM appointment_table WHERE Username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
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
                                <i class="fa fa-calendar"></i>
                            </span> Show Appointments
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Appointment Table</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td>No.</td>
                                                    <th>Name</th>
                                                    <th>Pet Type</th>
                                                    <th>Pet Name</th>
                                                    <th>Date</th>
                                                    <th>End Date</th>
                                                    <th>Service Type</th>
                                                    <th>Price</th>
                                                    <th>Payment Type</th>
                                                    <th>Comments</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT id, Name, Pet_type, Pet_name, Date, Service_type, Comments, Status, Price, Payment_Type, Username, E_Date FROM appointment_table WHERE Username= '$username'";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                    $count = 1;
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $count++ . "</td>";
                                                        echo "<td>" . $row['Name'] . "</td>";
                                                        echo "<td>" . $row['Pet_type'] . "</td>";
                                                        echo "<td>" . $row['Pet_name'] . "</td>";
                                                        echo "<td>" . $row['Date'] . "</td>";
                                                        echo "<td>" . $row['E_Date'] . "</td>";
                                                        echo "<td>" . $row['Service_type'] . "</td>";
                                                        echo "<td>" . $row['Price'] . "</td>";
                                                        echo "<td>" . $row['Payment_Type'] . "</td>";
                                                        echo "<td>" . $row['Comments'] . "</td>";
                                                        echo "<td>" . $row['Status'] . "</td>";
                                                        echo "<td>
                              <a href='?cancel=" . $row['id'] . "' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure you want to cancel this appointment?');\">Cancel</a>
                            </td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='12'>No appointments found</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- end .table-responsive -->

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