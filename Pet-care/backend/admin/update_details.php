<?php
include 'conn.php';
session_start();

$adminQuery = "SELECT * FROM admin_login LIMIT 1";
$result = $conn->query($adminQuery);

if ($result->num_rows > 0) {
    $admin = $result->fetch_assoc();
} else {
    $_SESSION['error'] = "Admin data not found.";
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $conn->real_escape_string($_POST['username']);
    $new_password = $_POST['password'];

    if (empty($new_password)) {
        $new_password = $admin['password'];
    } else {
        $new_password = $conn->real_escape_string($new_password);
    }

    $updateQuery = "UPDATE admin_login SET username='$new_username', password='$new_password'";

    if ($conn->query($updateQuery) === TRUE) {
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['error'] = "Error updating details: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Admin Details</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container-scroller">
        <?php include "navbar.php"; ?>
        <div class="container-fluid page-body-wrapper">
            <?php include "sidebar.php"; ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white me-2">
                                <i class="mdi mdi-account-edit"></i>
                            </span> Update Your Details
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Update Details</h4>

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
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                value="<?php echo htmlspecialchars($admin['username']); ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">New Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Leave blank to keep current password">
                                        </div>

                                        <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                                        <button type="button" class="btn btn-light"
                                            onclick="window.location.href='dashboard.php'">Cancel</button>
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
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/misc.js"></script>
</body>

</html>