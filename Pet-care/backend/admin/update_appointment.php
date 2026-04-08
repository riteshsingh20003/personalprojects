<?php
include 'conn.php';
session_start();

if (!isset($_GET['id'])) {
    $_SESSION['error'] = "No appointment ID provided.";
    header("Location: ShowAppointment.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM appointment_table WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows !== 1) {
    $_SESSION['error'] = "Appointment not found.";
    header("Location: ShowAppointment.php");
    exit();
}

$appointment = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $pet_type = $_POST['Pet_type'];
    $pet_name = $_POST['Pet_name'];
    $date = $_POST['Date'];
    $e_date = $_POST['e-Date'];
    $service_type = $_POST['Service_type'];
    $price = $_POST['Price'];
    $payment_type = $_POST['Payment_type'];
    $description = $_POST['description'];

    $updateSql = "UPDATE appointment_table 
                  SET Name='$name', Pet_type='$pet_type', Pet_name='$pet_name', Date='$date', E_Date='$e_date',
                      Service_type='$service_type', Price='$price', Payment_Type='$payment_type', Comments='$description'
                  WHERE id=$id";

    if ($conn->query($updateSql) === TRUE) {
        $_SESSION['success'] = "Appointment updated successfully.";
    } else {
        $_SESSION['error'] = "Error updating record: " . $conn->error;
    }

    header("Location: ShowAppointment.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Update Appointment</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
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
                                <i class="fa fa-handshake-o"></i>
                            </span> Update Appointment
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Update Appointment</h4>
                                    <?php
                                    if (isset($_SESSION['success'])) {
                                        echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
                                        unset($_SESSION['success']);
                                    }
                                    if (isset($_SESSION['error'])) {
                                        echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
                                        unset($_SESSION['error']);
                                    }
                                    ?>
                                    <form class="forms-sample" method="post">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $appointment['Name']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="Pet_type">Pet Type</label>
                                            <select class="form-select" id="Pet_type" name="Pet_type" required>
                                                <option value="Dog" <?php if($appointment['Pet_type'] == 'Dog') echo 'selected'; ?>>Dog</option>
                                                <option value="Cat" <?php if($appointment['Pet_type'] == 'Cat') echo 'selected'; ?>>Cat</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="Pet_name">Pet Name</label>
                                            <input type="text" class="form-control" id="Pet_name" name="Pet_name" value="<?php echo $appointment['Pet_name']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="Date">Start Date</label>
                                            <input type="date" class="form-control" id="Date" name="Date" value="<?php echo $appointment['Date']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="End-Date">End Date</label>
                                            <input type="date" class="form-control" id="End-Date" name="e-Date" value="<?php echo $appointment['E_Date']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="days">No. of days</label>
                                            <input type="text" class="form-control" id="days" name="Days" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="Service_type">Service Type</label>
                                            <select class="form-select" id="Service_type" name="Service_type" required>
                                                <option value="">Select Service</option>
                                                <option value="House Sitting" <?php if($appointment['Service_type'] == 'House Sitting') echo 'selected'; ?>>House Sitting</option>
                                                <option value="Pet Walker" <?php if($appointment['Service_type'] == 'Pet Walker') echo 'selected'; ?>>Pet Walker</option>
                                                <option value="Pet Tranning" <?php if($appointment['Service_type'] == 'Pet Tranning') echo 'selected'; ?>>Pet Tranning</option>
                                                <option value="Pet Gromming" <?php if($appointment['Service_type'] == 'Pet Gromming') echo 'selected'; ?>>Pet Gromming</option>
                                                <option value="Pet Feeding" <?php if($appointment['Service_type'] == 'Pet Feeding') echo 'selected'; ?>>Pet Feeding</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="Price">Price</label>
                                            <input type="text" class="form-control" id="Price" name="Price" value="<?php echo $appointment['Price']; ?>" readonly required>
                                        </div>

                                        <div class="form-group">
                                            <label for="Payment_type">Payment Type</label>
                                            <select class="form-select" id="Payment_type" name="Payment_type" required>
                                                <option value="">Select Payment type</option>
                                                <option value="UPI" <?php if($appointment['Payment_Type'] == 'UPI') echo 'selected'; ?>>UPI</option>
                                                <option value="Cash" <?php if($appointment['Payment_Type'] == 'Cash') echo 'selected'; ?>>Cash</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="4" required><?php echo $appointment['Comments']; ?></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                                        <a href="appointments.php" class="btn btn-light">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script>
        function calculateDifference() {
            const date1 = new Date(document.getElementById('Date').value);
            const date2 = new Date(document.getElementById('End-Date').value);
            const diffMilliseconds = date2 - date1;
            const diffDays = Math.floor(diffMilliseconds / (1000 * 60 * 60 * 24)) + 1;
            document.getElementById('days').value = diffDays > 0 ? diffDays + ' days' : '0';
            return diffDays > 0 ? diffDays : 0;
        }

        function updatePrice() {
            const service = document.getElementById("Service_type").value;
            const priceField = document.getElementById("Price");
            const priceMap = {
                "House Sitting": 500,
                "Pet Walker": 750,
                "Pet Gromming": 1000,
                "Pet Tranning": 1200,
                "Pet Feeding": 1500,
            };
            const days = calculateDifference();
            const pricePerDay = priceMap[service] || 0;
            priceField.value = days > 0 ? pricePerDay * days : '';
        }

        window.addEventListener('DOMContentLoaded', function () {
            calculateDifference();
            updatePrice();

            document.getElementById('End-Date').addEventListener('blur', updatePrice);
            document.getElementById('Service_type').addEventListener('change', updatePrice);
        });
    </script>
</body>

</html>