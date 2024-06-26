            <div class="container">
                <a href="index.php" class="logo"><h2>NodeGenius</h2></a>
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="topic.php">Overview</a></li>
                        <li><a href="quiz.php">Quiz</a></li>
                        <!--<li><a href="enhancements.php">Updates</a></li>-->
                        <li class="dropdown">
                            <a href="#" class="dropbtn">Updates</a>
                            <div class="dropdown-content">
                                <a href="enhancements1.php">HTML enhancements</a>
                                <a href="phpenhancements.php">PhP enhancements</a>
                            </div>
                        </li>
                        <li><a href="topic1.php">About</a></li>
                        <li><a href="topic2.php">Contact</a></li>
                        <li><?php
                            session_start();

                            // Check if the user is logged in
                            if (isset($_SESSION['user_id'])) {
                                echo '<a href="logout.php">LogOut</a>';

                            } elseif (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
                                echo '<a href="logout.php">LogOut</a>';

                            } else {
                                echo '<a href="login.php">Login</a>';
                            }
                        ?></li>
                    </ul>

                </nav>
            </div>