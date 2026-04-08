<?php
include 'conn.php';
session_start();

if (!isset($_GET['id'])) {
    echo "Invalid user ID.";
    exit();
}

$id = intval($_GET['id']);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $update_sql = "UPDATE login_table SET name='$name', username='$username', password='$hashed_password' WHERE id=$id";
    } else {
        $update_sql = "UPDATE login_table SET name='$name', username='$username' WHERE id=$id";
    }

    if ($conn->query($update_sql) === TRUE) {
        $_SESSION['message'] = "User updated successfully.";
        header("Location: ShowUsers.php");
        exit();
    } else {
        echo "Error updating user: " . $conn->error;
    }
}


$user_sql = "SELECT * FROM login_table WHERE id = $id";
$result = $conn->query($user_sql);

if ($result->num_rows != 1) {
    echo "User not found.";
    exit();
}

$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h2 class="mb-4">Update User</h2>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-success"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">New Password (leave blank to keep existing):</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
            <a href="your_user_list_page.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
