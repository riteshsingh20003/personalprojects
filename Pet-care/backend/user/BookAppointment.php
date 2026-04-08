<?php
include 'conn.php';
session_start();

$Sname = $_SESSION['name'];
$usrneme = $_SESSION['username'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $pet_type = mysqli_real_escape_string($conn, $_POST['Pet_type']);
    $pet_name = mysqli_real_escape_string($conn, $_POST['Pet_name']);
    $date = $_POST['Date'];
    $e_date = $_POST['e-Date'];
    $service_type = mysqli_real_escape_string($conn, $_POST['Service_type']);
    $price = mysqli_real_escape_string($conn, $_POST['Price']);
    $payment_type = mysqli_real_escape_string($conn, $_POST['Payment_type']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $sql = "INSERT INTO appointment_table (Name, Pet_type, Pet_name, Date, Service_type, Price, Payment_type, Comments, Status, E_Date, Username) 
            VALUES ('$name', '$pet_type', '$pet_name', '$date', '$service_type', '$price', '$payment_type', '$description', 'Pending', '$e_date', '$usrneme')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "Appointment booked successfully.";
    } else {
        $_SESSION['error'] = "Error: " . $sql . "<br>" . $conn->error;
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
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
                                <i class="fa fa-handshake-o"></i>
                            </span> Book Appointment
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Book Appointment</h4>
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
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Your Name" value="<?php echo $Sname; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="Pet_type">Pet Type</label>
                                            <select class="form-select" id="Pet_type" name="Pet_type" required>
                                                <option value="Dog">Dog</option>
                                                <option value="Cat">Cat</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="Pet_name">Pet Name</label>
                                            <input type="text" class="form-control" id="Pet_name" name="Pet_name"
                                                placeholder="Pet's Name" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="Date">Select start Date</label>
                                            <input type="date" class="form-control" id="Date" name="Date" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="Date">Select end Date</label>
                                            <input type="date" class="form-control" id="End-Date" name="e-Date"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">No. of days</label>
                                            <input type="text" class="form-control" id="days" name="Days"
                                                placeholder="Your Name" readonly required>
                                        </div>

                                        <div class="form-group">
                                            <label for="Service_type">Service Type</label>
                                            <select class="form-select" id="Service_type" name="Service_type"
                                                onchange="updatePrice()" required>
                                                <option value="">Select Service</option>
                                                <option value="House Sitting">House Sitting</option>
                                                <option value="Pet Walker">Pet Walker</option>
                                                <option value="Pet Tranning">Pet Tranning</option>
                                                <option value="Pet Gromming">Pet Gromming</option>
                                                <option value="Pet Feeding">Pet Feeding</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="Price">Price</label>
                                            <input type="text" class="form-control" id="Price" name="Price"
                                                placeholder="Price" required readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="Payment_type">Payment Type</label>
                                            <select class="form-select" id="Payment_type" name="Payment_type" required>
                                                <option value="">Select Payment type</option>
                                                <option value="UPI">UPI</option>
                                                <option value="Cash">Cash</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="4"
                                                required></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                                        <button class="btn btn-light">Cancel</button>
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
    <script src="assets/vendors/chart.js/chart.umd.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/jquery.cookie.js"></script>
    <script src="assets/js/dashboard.js"></script>

    <script>
        function setDate() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('Date').value = today;
            document.getElementById('End-Date').value = today;
        }

        function disablePreviousDates() {
            const today = new Date();
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0');
            const dd = String(today.getDate()).padStart(2, '0');
            const formattedDate = `${yyyy}-${mm}-${dd}`;

            document.getElementById('Date').setAttribute('min', formattedDate);
            document.getElementById('End-Date').setAttribute('min', formattedDate);
        }

        function calculateDifference() {
            const date1 = new Date(document.getElementById('Date').value);
            const date2 = new Date(document.getElementById('End-Date').value);

            if (isNaN(date1) || isNaN(date2)) {
                return 0;
            }

            const diffMilliseconds = Math.abs(date2 - date1);
            const diffDays = Math.floor(diffMilliseconds / (1000 * 60 * 60 * 24));

            const dayText = diffDays === 1 ? '1 day' : `${diffDays} days`;
            document.getElementById('days').value = dayText;

            return diffDays;
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

            if (days > 0 && pricePerDay > 0) {
                priceField.value = pricePerDay * days;
            } else {
                priceField.value = "";
            }
        }

        window.addEventListener('DOMContentLoaded', function () {
            setDate();
            disablePreviousDates();

            document.getElementById('End-Date').addEventListener('blur', updatePrice);
            document.getElementById('Service_type').addEventListener('change', updatePrice);
        });
    </script>

</body>

</html>