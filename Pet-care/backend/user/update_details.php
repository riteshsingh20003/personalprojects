<?php
include 'conn.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../user_login.php");
    exit();
}

$currentUsername = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_name = mysqli_real_escape_string($conn, $_POST['name']);
    $new_username = mysqli_real_escape_string($conn, $_POST['email']);
    $new_password = !empty($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : null;

    if ($new_password) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_sql = "UPDATE login_table SET name='$new_name', username='$new_username', password='$hashed_password' WHERE username='$currentUsername'";
    } else {
        $update_sql = "UPDATE login_table SET name='$new_name', username='$new_username' WHERE username='$currentUsername'";
    }

    if ($conn->query($update_sql) === TRUE) {
        $_SESSION['username'] = $new_username;
        $_SESSION['name'] = $new_name;
        $_SESSION['success'] = "Your details have been updated successfully.";


    } else {
        $_SESSION['error'] = "Error updating details: " . $conn->error;
    }

    header("Location: dashboard.php");
    exit();
}

// Fetch current user data
$sql = "SELECT name, username FROM login_table WHERE username='$currentUsername'";
$result = $conn->query($sql);
$current_user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Update Details</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" />
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
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $current_user['name']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Username</label>
                                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $current_user['username']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">New Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep current password">
                                        </div>
                                        <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                                        <button type="button" class="btn btn-light" onclick="window.location.href='user_dashboard.php'">Cancel</button>
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
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
</body>
</html>
