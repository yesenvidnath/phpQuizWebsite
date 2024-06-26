<?php
session_start();

require 'connect.inc'; // Include the database connection

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$student_number = $_POST['student-number'];

// Retrieve the user's id from the users table using the student number
$user_id_query = "SELECT id FROM users WHERE student_number = '$student_number'";
$result = $conn->query($user_id_query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $row['id'];
} else {
    // If user is not found, create a new user record
    $create_user_query = "INSERT INTO users (first_name, last_name, student_number)
                          VALUES ('$first_name', '$last_name', '$student_number')";

    if ($conn->query($create_user_query) === TRUE) {
        $user_id = $conn->insert_id;
    } else {
        echo "Error creating user account: " . $create_user_query . "<br>" . $conn->error;
        exit;
    }
}

// Check the number of quiz attempts for the user
$max_attempts = 4;  // Set the maximum number of attempts
$attempts_query = "SELECT COUNT(*) AS attempts FROM quiz_responses WHERE user_id = '$user_id'";
$attempts_result = $conn->query($attempts_query);
$attempts_row = $attempts_result->fetch_assoc();
$attempts = $attempts_row['attempts'];

if ($attempts >= $max_attempts) {
    // Log in the user
    $_SESSION['user_id'] = $user_id;

    // Set the error message
    $_SESSION['error_message'] = "You have reached the maximum limit of $max_attempts attempts.";

    // Redirect to the quiz.php page
    header("Location: quiz.php");
    exit();

} else {
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];

    // Calculate the total score for this attempt and insert into quiz_scores table
    $total_score = 0;
    $score_per_question = 1;

    // Check correctness of each question
    $q1_correct = (strcasecmp($q1, 'Web Development') === 0) ? $score_per_question : 0;

    $q2_correct = ($q2 === 'A. Node Package Manager') ? $score_per_question : 0;


    // Calculate selected options for Question 3
    $q3_selected_options = array();

    if (isset($_POST['q3-a'])) {
        $q3_selected_options[] = 'A. fs';
    }

    if (isset($_POST['q3-b'])) {
        $q3_selected_options[] = 'B. HTTP';
    }

    if (isset($_POST['q3-c'])) {
        $q3_selected_options[] = 'C. js';
    }

    if (isset($_POST['q3-d'])) {
        $q3_selected_options[] = 'D. css';
    }

    // Combine selected options into a single string
    $q3_selected_options_text = implode(', ', $q3_selected_options);

    // Calculate correctness based on selected options
    $q3_correct = 0;

    // Check if both 'A' and 'B' are selected
    if (isset($_POST['q3-a']) && isset($_POST['q3-b']) && !isset($_POST['q3-c']) && !isset($_POST['q3-d'])) {
        $q3_correct = 1;
    }


    $q4 = $_POST['q4'];
    $q4_correct = ($q4 === 'npm install' ) ? $score_per_question : 0;

    $q5 = $_POST['q5'];
    $q5_correct = ($q5 === 'console.log("Hello, Node.js!");') ? $score_per_question : 0;

    // Insert data into the quiz_responses table
    $sql_quiz = "INSERT INTO quiz_responses (user_id, first_name, last_name, student_number, q1, q2, q3, q4, q5)
                 VALUES ('$user_id', '$first_name', '$last_name', '$student_number', '$q1', '$q2', '$q3_selected_options_text', '$q4', '$q5')";

    if ($conn->query($sql_quiz) === TRUE) {
        // Calculate total score
        $total_score = $q1_correct + $q2_correct + $q3_correct + $q4_correct + $q5_correct;

        // Insert score into quiz_scores table
        $sql_score = "INSERT INTO quiz_scores (user_id, attempt_date, score, q1_correct, q2_correct, q3_correct, q4_correct, q5_correct)
                      VALUES ('$user_id', NOW(), '$total_score', '$q1_correct', '$q2_correct', '$q3_correct', '$q4_correct', '$q5_correct')";

        if ($conn->query($sql_score) === TRUE) {
            // Log in the user
            $_SESSION['user_id'] = $user_id;

            // Redirect to the quiz.php page
            header("Location: quiz.php");
            exit();
        } else {
            echo "Error inserting quiz score: " . $sql_score . "<br>" . $conn->error;
        }
    } else {
        echo "Error inserting quiz response: " . $sql_quiz . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
