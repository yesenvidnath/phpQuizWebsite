<?php
// Include the header and database connection
require 'header.inc';
require 'connect.inc';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}


if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Initialize the delete message variable
$deleteMessage = '';

// Check if the delete button was clicked
if (isset($_POST['delete_record'])) {
    $recordIdToDelete = $_POST['record_id'];

    // SQL query to get the attempt_date of the record to be deleted
    $getAttemptDateQuery = "SELECT attempt_date FROM quiz_responses WHERE quiz_responses_id = $recordIdToDelete";
    $attemptDateResult = $conn->query($getAttemptDateQuery);

    if ($attemptDateResult->num_rows > 0) {
        $row = $attemptDateResult->fetch_assoc();
        $attempt_date = $row['attempt_date'];

        // SQL query to delete the response record from the database
        $deleteResponseQuery = "DELETE FROM quiz_responses WHERE quiz_responses_id = $recordIdToDelete";
        
        // SQL query to delete the score record from the database based on the attempt_date
        $deleteScoreQuery = "DELETE FROM quiz_scores WHERE attempt_date = '$attempt_date'";
        
        // Perform deletion of both records
        if ($conn->query($deleteResponseQuery) === TRUE && $conn->query($deleteScoreQuery) === TRUE) {
            // Records deleted successfully
            $deleteMessage = "Record and associated score deleted successfully.";
        } else {
            // Error occurred while deleting the records
            $deleteMessage = "Error deleting record and associated score: " . $conn->error;
        }
    }
}


// SQL query to fetch quiz responses and scores using a JOIN
$query = "SELECT qr.quiz_responses_id, qr.user_id, qr.first_name, qr.last_name, qr.student_number, 
                 qr.q1, qr.q2, qr.q3, qr.q4, qr.q5, 
                 qs.score, qs.q1_correct, qs.q2_correct, qs.q3_correct, qs.q4_correct, qs.q5_correct
          FROM quiz_responses qr
          LEFT JOIN quiz_scores qs ON qr.attempt_date = qs.attempt_date";
$result = $conn->query($query);


// Close the database connection
$conn->close();

?>

<div class="admin-dashboard">
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <!-- Add links to manage records -->
        <br>
        <a class="admin-logout" href="logout.php">Log Out</a>
        <br>

        <ul class="tabs">
            <li><a href="#" class="active" onclick="showTab('responses')">View Responses</a></li>
            <li><a href="#" onclick="showTab('records')">Manage Records</a></li>
            <!-- Add more tabs as needed -->
        </ul>
    </div>

    <div id="responses" class="tab-content content">

        <h2>View Quiz Responses</h2>

        <!-- Display delete message above the table -->
        <?php if (!empty($deleteMessage)) : ?>
            <div class="delete-message">
                <?php echo $deleteMessage; ?>
            </div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Student Number</th>
                    <th>Q1</th>
                    <th>Q2</th>
                    <th>Q3</th>
                    <th>Q4</th>
                    <th>Q5</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Loop through each quiz response record
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['user_id']}</td>";
                        echo "<td>{$row['first_name']} {$row['last_name']}</td>";
                        echo "<td>{$row['student_number']}</td>";
                        echo "<td>{$row['q1']}<br>";
                        echo "<br/>";
                        echo " <b> Pass: " . ($row['q1_correct'] == 1 ? "<span class='pass'> Yes </span> </b>" : "<span class='fail'> No </span> </b>") . "<br>";
                        
                        echo "</td>";
                        
                        echo "<td>{$row['q2']}<br>";
                        echo "<br/>";
                        echo " <b> Pass: " . ($row['q2_correct'] == 1 ? "<span class='pass'> Yes </span> </b>" : "<span class='fail'> No </span> </b>") . "<br>";
                        
                        echo "</td>";
                        
                        echo "<td>{$row['q3']}<br>";
                        echo "<br/>";
                        echo " <b> Pass: " . ($row['q3_correct'] == 1 ? "<span class='pass'> Yes </span> </b>" : "<span class='fail'> No </span> </b>") . "<br>";
                        
                        echo "</td>";
                        
                        echo "<td>{$row['q4']}<br>";
                        echo "<br/>";
                        echo " <b>  Pass: " . ($row['q4_correct'] == 1 ? "<span class='pass'> Yes </span> </b>" : "<span class='fail'> No </span> </b>") . "<br>";
                        
                        echo "</td>";
                        
                        echo "<td>{$row['q5']}<br>";
                        echo "<br/>";
                        echo " <b> Pass: " . ($row['q5_correct'] == 1 ? "<span class='pass'> Yes </span> </b>" : "<span class='fail'> No </span> </b>") . "<br>";
                        
                        echo "</td>";

                        // Add the delete button and form
                        echo "<td>";
                        echo "<form action='' method='post'>";
                        echo "<input type='hidden' name='record_id' value='{$row['quiz_responses_id']}'>";
                        echo "<button type='submit' class='delete_record' name='delete_record'>Delete</button>";
                        echo "</form>";
                        echo "</br>";
                        echo "<b> Score: " . $row['score'] ."</b>";
                        echo "</td>";

                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>

    </div>

    <div id="records" class="tab-content content">
        
        <h2> User Records </h2>

        <?php

            error_reporting(0);
            ini_set('display_errors', 0);
            require 'connect.inc';

            $action = '';
            $user_id = '';
            $first_name = '';
            $last_name = '';
            $registration_datetime = ''; // Change the variable name to reflect the combined datetime field
            $student_number = '';
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $action = $_POST['action'];
                $user_id = $_POST['user_id'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $registration_datetime = $_POST['registration_datetime']; // Update the variable name
                $student_number = $_POST['student_number'];
            
                switch ($action) {
                    case 'insert':
                        $sql = "INSERT INTO users (first_name, last_name, registration_date, student_number) VALUES (?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ssss", $first_name, $last_name, $registration_datetime, $student_number); // Update the binding here
                        $stmt->execute();
                        break;
            
                    case 'delete':
                        // Retrieve all the attempt_date values associated with the user_id
                        $getAttemptDatesQuery = "SELECT DISTINCT attempt_date FROM quiz_responses WHERE user_id = ?";
                        $stmt = $conn->prepare($getAttemptDatesQuery);
                        $stmt->bind_param("i", $user_id);
                        $stmt->execute();
                        $attemptDateResult = $stmt->get_result();

                        if ($attemptDateResult->num_rows > 0) {
                            // Initialize a flag to check if any records were deleted
                            $recordsDeleted = false;

                            while ($row = $attemptDateResult->fetch_assoc()) {
                                $attempt_date = $row['attempt_date'];

                                // SQL query to delete the responses records for the user_id and attempt_date
                                $deleteResponseQuery = "DELETE FROM quiz_responses WHERE user_id = ? AND attempt_date = ?";
                                $stmt = $conn->prepare($deleteResponseQuery);
                                $stmt->bind_param("is", $user_id, $attempt_date);

                                // SQL query to delete the score records based on the attempt_date
                                $deleteScoreQuery = "DELETE FROM quiz_scores WHERE attempt_date = ?";
                                $stmt2 = $conn->prepare($deleteScoreQuery);
                                $stmt2->bind_param("s", $attempt_date);

                                // Perform deletion of both records
                                if ($stmt->execute() && $stmt2->execute()) {
                                    // Records deleted successfully
                                    $recordsDeleted = true;
                                }
                            }

                            if ($recordsDeleted) {
                                // Now, delete the user record itself
                                $deleteUserQuery = "DELETE FROM users WHERE id = ?";
                                $stmt3 = $conn->prepare($deleteUserQuery);
                                $stmt3->bind_param("i", $user_id);
                                if ($stmt3->execute()) {
                                    echo "<div class='delete-message'>User record and associated records deleted successfully.</div>";
                                } else {
                                    echo "<div class='delete-message'>Error deleting user record: " . $stmt3->error . "</div>";
                                }
                            } else {
                                // Error occurred while deleting the records
                                echo "<div class='delete-message'>Error deleting records and associated scores: " . $conn->error . "</div>";
                            }
                        } else {
                            echo "<div class='delete-message'>No quiz responses found for the given user ID</div>";
                        }
                        break;
 
            
                    case 'search':
                        $sql = "SELECT * FROM users WHERE id=?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $user_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $user_id = $row['id'];
                            $first_name = $row['first_name'];
                            $last_name = $row['last_name'];
                            $registration_datetime = $row['registration_date']; // Update the variable name
                            $student_number = $row['student_number'];
                        } else {
                            echo "<div class='delete-message'>No user found with the given ID</div>";
                        }
                        break;
            
                    case 'update':
                        $sql = "UPDATE users SET first_name=?, last_name=?, registration_date=?, student_number=? WHERE id=?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ssssi", $first_name, $last_name, $registration_datetime, $student_number, $user_id); // Update the binding here
                        $stmt->execute();
                        break;
                }
            }
            
        ?>

        <div class="container">
            <div class="left-column">
                <form method="POST">
                    <div class="form-group">
                        <label for="user_id">User ID:</label>
                        <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $user_id; ?>" >
                    </div>

                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $first_name; ?>">
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $last_name; ?>">
                    </div>

                    <div class="form-group">
                        <label for="registration_date">Registration Date:</label>
                        <input type="datetime-local" class="form-control" id="registration_datetime" name="registration_datetime" value="<?php echo $registration_datetime; ?>">
                    </div>

                    <div class="form-group">
                        <label for="student_number">Student Number:</label>
                        <input type="text" class="form-control" id="student_number" name="student_number" value="<?php echo $student_number; ?>">
                    </div>

                    <div class="modal-footer">
                        <div class="container-fluid button-container-custom">
                            <div class="">
                                <div><input type="submit" name="action" value="insert"></div>
                                <div><input type="submit" name="action" value="delete"></div>
                            </div>
                            <div class="btn-container">
                                <div><input type="submit" name="action" value="search"></div>
                                <div><input type="submit" name="action" value="update"></div>
                            </div>
                            <div class="btn-container">
                                <div><input type="button"onclick="clearForm()" value="clear"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="right-column">
                <?php
                $result = $conn->query("SELECT * FROM users");
                if ($result->num_rows > 0) {
                ?>
                    <div class="table-responsive mt-5">
                        <table class="table-responsive">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Registration Date</th>
                                    <th>Student Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['first_name']; ?></td>
                                        <td><?php echo $row['last_name']; ?></td>
                                        <td><?php echo $row['registration_date']; ?></td>
                                        <td><?php echo $row['student_number']; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                <?php
                } else {
                    echo "<div class='alert alert-info mt-5'>No users found</div>";
                }
                ?>
            </div>
        </div>

        <script>
            function clearForm() {
                document.getElementById("user_id").value = "";
                document.getElementById("first_name").value = "";
                document.getElementById("last_name").value = "";
                document.getElementById("registration_datetime").value = ""; // Update the ID for the datetime-local input
                document.getElementById("student_number").value = "";
            }
        </script>

    </div>
</div>

<?php
// Include the footer
require 'footer.inc';
?>
