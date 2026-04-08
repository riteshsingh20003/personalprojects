<?php
include 'conn.php';
session_start();

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $delSql = "DELETE FROM appointment_table WHERE id = $id";
    if ($conn->query($delSql) === TRUE) {
        $_SESSION['message'] = "User deleted successfully.";
    } else {
        $_SESSION['message'] = "Error deleting user: " . $conn->error;
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_POST['update_status'])) {
    $id = intval($_POST['appointment_id']);
    $new_status = $_POST['new_status'];

    $stmt = $conn->prepare("UPDATE appointment_table SET Status = ? WHERE id = ?");
    $stmt->bind_param("si", $new_status, $id);
    $stmt->execute();
    $stmt->close();

    // Redirect to prevent resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$sql = "SELECT id, Name, Pet_type, Pet_name, Date, Service_type, Comments FROM appointment_table";
$result = $conn->query($sql);
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
                                <i class="fa fa-calendar"></i>
                            </span> Show Appointments
                        </h3>
                    </div>
                    <div class="row">
                        <?php
                        include 'conn.php';

                        $sql = "SELECT id, Name, Pet_type, Pet_name, Date, Service_type, Comments, Status, Price, Payment_Type, E_Date FROM appointment_table";
                        $result = $conn->query($sql);
                        ?>

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Appointment Table</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Name</th>
                                                    <th>Pet Type</th>
                                                    <th>Pet Name</th>
                                                    <th>Date</th>
                                                    <th>End date</th>
                                                    <th>Service Type</th>
                                                    <th>Price</th>
                                                    <th>Payment Type</th>
                                                    <th>Status</th>
                                                    <th>Comments</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
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
                                                        echo "<td>" . $row['Status'] . "</td>";
                                                        echo "<td>" . $row['Comments'] . "</td>";
                                                        echo "<td>
            <a href='update_appointment.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning'>Update</a>
            <a href='?delete=" . $row['id'] . "' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure you want to delete this appointment?');\">Delete</a>
            <button class='btn btn-sm btn-info' data-bs-toggle='modal' data-bs-target='#statusModal" . $row['id'] . "'>Change Status</button>

            <!-- Modal to change status -->
            <div class='modal fade' id='statusModal" . $row['id'] . "' tabindex='-1' aria-labelledby='statusModalLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='statusModalLabel'>Change Appointment Status</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <form method='POST'>
                                <input type='hidden' name='appointment_id' value='" . $row['id'] . "'>
                                <div class='form-group'>
                                    <label for='statusSelect'>Select Status</label>
                                    <select name='new_status' id='statusSelect' class='form-select'>
                                        <option value='Pending' " . ($row['Status'] == 'Pending' ? 'selected' : '') . ">Pending</option>
                                        <option value='Completed' " . ($row['Status'] == 'Completed' ? 'selected' : '') . ">Completed</option>
                                        <option value='Cancelled' " . ($row['Status'] == 'Cancelled' ? 'selected' : '') . ">Cancelled</option>
                                    </select>
                                </div>
                                <button type='submit' name='update_status' class='btn btn-primary'>Update Status</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </td>";

                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='11'>No appointments found</td></tr>";
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div> <!-- End .table-responsive -->
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