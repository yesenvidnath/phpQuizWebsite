<?php 
    //including the header file 
    require 'header.inc'; 

    error_reporting(0);
    ini_set('display_errors', 0);

    //include the database connection file
    require 'connect.inc';

    session_start(); // Start or resume the session
    
    $user_id = $_SESSION['user_id']; // Retrieve user ID from the session
    
    // Define the function to get the number of attempts
    function getNumberOfAttempts($user_id, $conn) {
        $sql = "SELECT COUNT(*) AS num_attempts FROM quiz_responses WHERE user_id = '$user_id'";
        $result = $conn->query($sql);
    
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['num_attempts'];
        }
    
        return 0;
    }
    
    // Get number of attempts
    $num_attempts = getNumberOfAttempts($user_id, $conn);

    // Initialize the error message variable
    $error_message = '';

    // Check if there's an error message in the session
    if (isset($_SESSION['error_message'])) {
        $error_message = $_SESSION['error_message'];
        // Clear the error message from the session
        unset($_SESSION['error_message']);
    }

    // Retrieve scores for the user's attempts
    $scores_query = "SELECT attempt_date, score, q1_correct, q2_correct, q3_correct, q4_correct, q5_correct
                     FROM quiz_scores
                     WHERE user_id = '$user_id'
                     ORDER BY attempt_date DESC"; // Display the latest attempt first
    $scores_result = $conn->query($scores_query);
?>

        <main>
            <div class="banner">
                <img src="images/quiz.png" alt="banner_image" />
            </div>
            <br>
            <h2 style="text-align: center;">Fill the given form from yor knowledge of NodeJS</h2>
            <div class="form-section">
                <div class="container">
  
                    <form action="markquiz.php" method="post" id="quiz-form">

                        <div class="alert-succes">
                            <!-- Display the number of attempts the student have attemptd -->
                            <p class="attempts-msg">Your Number of quiz attempts: <?php echo $num_attempts; ?></p>
                            <p class="hidden-message attempts-msg">*<a href="#scores">Scroll bottom</a> to see your Scores</p>
                            <p class="hidden-message attempts-msg">*you can only attempt 4 times</p>

                            <!-- Displaying the error message -->
                            <?php if (!empty($error_message)) : ?>
                                <div class="alert-error">
                                    <p><?php echo $error_message; ?></p>
                                    <!-- hide the  -->
                                    <p class="hidden-message">*<a href="#scores">Scroll bottom</a> to see your Scores</p>
                                    <style>
                                        .attempts-msg{
                                            display: none;
                                        }
                                        .form-section .alert-succes{
                                            background: #F8D7DA !important;
                                            border: 1px solid #F5C6CB !important;
                                            padding: 20px 15px;
                                            border-radius: 15px;
                                            margin-bottom: 20px;
                                        }
                                    </style>
                                </div>
                            <?php endif; ?>
                        </div>

                        <fieldset>
                            <legend>Personal Information</legend>
                            <label for="first-name">First Name:</label>
                            <input type="text" id="first-name" name="first-name" required pattern="[A-Za-z -]{1,30}" />
                            <label for="last-name">Last Name:</label>
                            <input type="text" id="last-name" name="last-name" required pattern="[A-Za-z -]{1,30}" />
                            <label for="student-number">Student Number:</label>
                            <input type="text" id="student-number" name="student-number" required pattern="[0-9]{7}|[0-9]{10}" />
                        </fieldset>
                        <fieldset>
                            <legend>
                                Question 1: What is Node.js used for?
                            </legend>
                            <input type="text" id="q1" name="q1" required />
                        </fieldset>
                        <fieldset>
                            <legend>Question 2: What is npm short for?</legend>
                            <div class="group">
                                <input type="radio" id="q2-a" name="q2" value="A. Node Package Manager" required />
                                <label for="q2-a">A. Node Package Manager</label>
                            </div>
                            <div class="group">
                                <input type="radio" id="q2-b" name="q2" value="B. New Programming Method" />
                                <label for="q2-b">B. New Programming Method</label>
                            </div>
                            <div class="group">
                                <input type="radio" id="q2-c" name="q2" value="C. Node Programming Module" />
                                <label for="q2-c">C. Node Programming Module</label>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Question 3: Which of the following are core modules in Node.js?</legend>
                            <div class="group">
                                <input type="checkbox" id="q3-a" name="q3-a" value="A. fs" />
                                <label for="q3-a">A. fs</label>
                            </div>
                            <div class="group">
                                <input type="checkbox" id="q3-b" name="q3-b" value="B. HTTP" />
                                <label for="q3-b">B. HTTP</label>
                            </div>
                            <div class="group">
                                <input type="checkbox" id="q3-c" name="q3-c" value="C. js" />
                                <label for="q3-c">C. js</label>
                            </div>
                            <div class="group">
                                <input type="checkbox" id="q3-d" name="q3-d" value="D. css" />
                                <label for="q3-d">D. css</label>
                            </div>

                        </fieldset>
                        <fieldset>
                            <legend>
                                Question 4: Which command is used to install a package using npm?
                            </legend>
                            <label for="q4"></label>
                            <select id="q4" name="q4" required>
                                <option value="">Select an option</option>
                                <option value="npm install">npm install</option>
                                <option value="npm add">npm add</option>
                                <option value="npm create">npm create</option>
                                <option value="npm get">npm get</option>
                            </select>
                        </fieldset>
                        <fieldset>
                            <legend>Question 5: How do you print "Hello, Node.js!" to the console?</legend>
                            <input type="text" id="q5" name="q5" required />
                        </fieldset>

                        <input type="submit" value="Submit" />
                        <button type="button" id="clear-button">Clear</button>
                    </form>

                    <!-- Display Responses -->

                    <?php
                    
                    // Using the "$user_id" variyable to see if the user have loged in to the system 
                    if (isset($user_id)) {
                    
                        // Display the quiz scores only for logged-in users
                        ?>
                        <div class="scores" id="scores-section">
                            <h3>Your Quiz Scores</h3>
                            <?php if ($scores_result->num_rows > 0) { ?>
                                <table>
                                    <tr>
                                        <th>Attempt No</th>
                                        <th>Score</th>
                                        <th>Question 1</th>
                                        <th>Question 2</th>
                                        <th>Question 3</th>
                                        <th>Question 4</th>
                                        <th>Question 5</th>
                                    </tr>
                                    <?php
                                    $attempt_number = 1; // Initialize attempt number
                                    while ($row = $scores_result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $attempt_number++; ?></td>
                                            <td><?php echo $row['score']; ?></td>
                                            <td><?php echo ($row['q1_correct'] === '1') ? 'Correct' : 'Incorrect'; ?></td>
                                            <td><?php echo ($row['q2_correct'] === '1') ? 'Correct' : 'Incorrect'; ?></td>
                                            <td><?php echo ($row['q3_correct'] === '1') ? 'Correct' : 'Incorrect'; ?></td>
                                            <td><?php echo ($row['q4_correct'] === '1') ? 'Correct' : 'Incorrect'; ?></td>
                                            <td><?php echo ($row['q5_correct'] === '1') ? 'Correct' : 'Incorrect'; ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            <?php } else { ?>
                                <!-- <p>No quiz scores available.</p> -->
                            <?php } ?>
                        </div>
                    <?php
                    } else {
                        
                    }
                    ?>

                </div>
            </div>
        </main>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Check if the student has attempted the quiz (you can use your own condition)
            var hasAttemptedQuiz = <?php echo ($num_attempts > 0) ? 'true' : 'false'; ?>;
            
            // Get references to the form and clear button
            var quizForm = document.getElementById("quiz-form");
            var clearButton = document.getElementById("clear-button");
            // Show the scores section if the student has attempted the quiz
            if (hasAttemptedQuiz) {
                document.getElementById("scores-section").style.display = "block";
            }
            // Function to reset the form fields
            function clearForm() {
                quizForm.reset(); // Reset the form to its initial state
            }
            // Add a click event listener to the clear button
            clearButton.addEventListener("click", clearForm);
        });
    </script>

<?php 
    // Close the database connection
    $conn->close();

    //including the Footer file 
    require'footer.inc'; 
?>