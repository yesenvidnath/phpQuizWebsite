<?php
error_reporting(0);
ini_set('display_errors', 0);

// Include the database connection file
require 'connect.inc';

// Initialize error messages and registration success message
$login_error = "";
$registration_success = "";

$login_error_admin = "";
$registration_success_admin  = "";


// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the "User Login" button was clicked
    if (isset($_POST['login'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $user_password = $_POST['user_password'];

        // Check user credentials
        $check_user_query = "SELECT id, first_name, student_number FROM users WHERE first_name = '$first_name' AND last_name = '$last_name' AND student_number = '$user_password'";
        $user_result = $conn->query($check_user_query);

        if ($user_result->num_rows === 1) {
            $row = $user_result->fetch_assoc();
            // Start a session for the logged-in user
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['first_name'];

            // Redirect to user dashboard
            header("Location: index.php");
            exit();
        } else {
            $login_error = "Invalid user information or password.";
        }
    } elseif (isset($_POST['register'])) {
        // Check if the "Register" button was clicked
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $user_password = $_POST['user_password'];

        // Check if all required fields are provided
        if (!empty($first_name) && !empty($last_name) && !empty($user_password)) {
            // Perform user registration logic by inserting the user into the database
            $insert_user_query = "INSERT INTO users (first_name, last_name, student_number) VALUES ('$first_name', '$last_name', '$user_password')";
            if ($conn->query($insert_user_query) === TRUE) {
                $registration_success = "Registration successful. You can now log in.";
            } else {
                $login_error = "Error registering user: " . $conn->error;
            }
        } else {
            $login_error = "Please provide all required information for registration.";
        }
    }
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check admin credentials
    $check_admin_query = "SELECT id, name FROM admin WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($check_admin_query);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION['admin_id'] = $row['id'];
        $_SESSION['admin_name'] = $row['name'];
        $_SESSION['admin_logged_in'] = true; // Set the admin session variable

        // Redirect to admin dashboard
        header("Location: manage.php");
        exit();
    } else {
        $login_error_admin  = "Invalid email or password.";
    }
}

// Close the database connection
$conn->close();

?>

<?php 
    //including the header file 
    require 'header.inc'; 
?>

<div class="log-cont-wrap">
    <div class="login-container">

        <div class="login-column">
        <h2>Login as Admin</h2>
        <?php if (!empty($login_error_admin)) { ?>
            <p class="error-message"><?php echo $login_error_admin; ?></p>
        <?php } ?>
        <form action="login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>
        </div>

        <div class="login-column">
            <h2>Login or Register as User</h2>
            <?php if (!empty($login_error)) { ?>
                <p class="error-message"><?php echo $login_error; ?></p>
            <?php } ?>
            <?php if (!empty($registration_success)) { ?>
                <p class="success-message"><?php echo $registration_success; ?></p>
            <?php } ?>
            <form action="" method="post">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
                <label for="user_password">Password (Student Number):</label>
                <input type="password" id="user_password" name="user_password" required>
                <button type="submit" name="login">Login</button> or 
                <button type="submit" name="register">Register</button>
            </form>
        </div>

    </div>
</div>

<?php
    //including the Footer file 
    require 'footer.inc'; 
?>