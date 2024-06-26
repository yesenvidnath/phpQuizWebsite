<?php 
    //including the header file 
    require'header.inc'; 

?>
        <div class="preloader">
            <div class="loader"></div>
        </div>
        <div class="banner">
            <div class="slider">
                <img src="images/phpl-mysql-banner.jpg" alt="banner_image" />
            </div>
		</div>

		<br>

		<h2 style="text-align: center; text-decoration: underline; margin-bottom: 30px">Here are the Special Enchancements that we have used in PHP and MySQL</h2>

		<h2 style="text-align: center;"> Quiz Page and PhP functions </h2>
		<div class="image-gallery-container">
			<section class="center-image-gallery">

				<div class="row-enhas">

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss1.png" alt="Image 1" />
							<img src="images/ss2.png" alt="Image 2" />
							<img src="images/ss3.png" alt="Image 2" />
							<h3>Quiz Attempts Indicator</h3>
							<p> A indicator wich shows the amout of attempts/entryes put in to the database by a spesific user, this indicator will be green for 4 quiz attempts and will be turn red after 4 attempts wlong with an error meesage saying they have reached the limitation</p>
							<!-- <a href="enhancements.html" class="button-link">VIEW</a> -->
						</div>
					</div>

					<div class="col-enhsas">
						<div class="center-image-card">
							<!-- <img src="images/ss4.png" alt="Image 2" /> -->
							<img src="images/ss7.png" alt="Image 2" />
							<img src="images/ss5.png" alt="Image 2" />
							<h3>Display Quiz Scores </h3>
							<p>the quiz page will display a table in the bottom of the page displaying all 4 attempts the attendee took and scores according to that attempts</p>
							<!-- <a href="enhancements.html#icon" class="button-link">VIEW</a> -->
						</div>
					</div>

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss8.png" alt="Image 3" />
							<img src="images/ss6.png" alt="Image 3" />
							<h3>Clear Button</h3>
							<p>Clear button is a button in the bottm of the quiz wich allows users to clear the whole quiz feeilds at once</p>
							<!-- <a href="enhancements.html" class="button-link">VIEW</a> -->
						</div>
					</div>

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss9.png" alt="Image 4" />
							<img src="images/ss10.png" alt="Image 4" />
							<h3>Log Out Button</h3>
							<p>The log out button will help the user to log out after attending to the quiz, when someone clicks on te log out button it will carry the user to the logout.php and bounce back to the index.php after the  user logged out </p>
							<!-- <a href="enhancements.html" class="button-link">VIEW</a> -->
						</div>
					</div>
				</div>

				<div class="row-enhas">
					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss11.png" alt="Image 5" />
							<img src="images/ss12.png" alt="Image 5" />
							<h3>Log In button</h3>
							<p>he log IN button will help the user to log In and attendi to the quiz, or log in to the admin panel if the user is admin when someone clicks on the log in it will carry the user to the login.php and there users can input logins or sign them selves to the system or log in as a admin if the user have access</p>
							<!-- <a href="index.html#feature-item-wrapper" class="button-link">VIEW</a> -->
						</div>
					</div>
					<div class="col-enhsas" style="width: 27.2em !important"></div>
					<div class="col-enhsas" style="width: 27.2em !important"></div>
					<div class="col-enhsas" style="width: 27.2em !important"></div>
				</div>

				<h2 style="text-align: center;"> Admin panel </h2>

				<div class="row-enhas">

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss13.png" alt="Image 6" />
							<h3>Admin Pnel</h3>
							<p>The admin panel is a place where allows Admin to handle users and the inputs added by users to the system </p>
							<!-- <a href="index.html#video-wrapper" class="button-link">VIEW</a> -->
						</div>
					</div>

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss14.png" alt="Image 7" />
							<h3>Quiz Responds management</h3>
							<p>The Responds management allows the admin to see what are the already given quiz responds who inputed the responds and how scores for that responds, theadmin have te ability to delete the respoends along with the scores by clicking on the "delete button" </p>
							<!-- <a href="enhancements.html" class="button-link">VIEW</a> -->
						</div>
					</div>

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss15.png" alt="Image 8" />
							<h3>Quiz User management</h3>
							<p>This allows users to manage the users who are in the system and the admin have the authority to change the user details inculding thire names and passowrds.</p>
							<!-- <a href="enhancements.html" class="button-link">VIEW</a> -->
						</div>
					</div>

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss16.png" alt="Image 8" />
							<img src="images/ss17.png" alt="Image 8" />
							<h3>Quiz User delete</h3>
							<p> The admmin can also delete the user form the system and when the users are deleted entyer recodes belong to that user will be deleted instently form the database </p>
							<!-- <a href="enhancements.html" class="button-link">VIEW</a> -->
						</div>
					</div>

				</div>

				<div class="row-enhas">

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss18.png" alt="Image 9" />
							<h3>Tab Mode</h3>
							<p>The interfaces in the Admin panel Have Tabs once the admin click on a tab in the lest side panel it will show the content inside that tab</p>
							<!-- <a href="enhancements.html" class="button-link">VIEW</a> -->
						</div>
					</div>

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss19.png" alt="Image 10" />
							<h3>Admin Logout</h3>
							<p>The log out button will help the admin to log out form the admin panel, when the admin clicks on te log out button it will carry the admin to the logout.php and bounce back to the index.php after the  admin logged out </p>
							<!-- <a href="enhancements.html" class="button-link">VIEW</a> -->
						</div>
					</div>

					<div class="col-enhsas" style="width: 27.2em !important"></div>
					<div class="col-enhsas" style="width: 27.2em !important"></div>

				</div>


				<h2 style="text-align: center;"> MySQLi Database </h2>

				<div class="row-enhas">

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss20.png" alt="Image 6" />
							<h3>Created using xampp</h3>
							<p> The Database for this was created using xampp with 3 table database to store all  the information form the quiz page </p>
							<!-- <a href="index.html#video-wrapper" class="button-link">VIEW</a> -->
						</div>
					</div>

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss21.png" alt="Image 7" />
							<h3>Logical Diagrem of the database</h3>
							<p>The Logical DB Diagrem of this database shows how the tables are structured in the database </p>
							<!-- <a href="enhancements.html" class="button-link">VIEW</a> -->
						</div>
					</div>

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss22.png" alt="Image 8" />
							<h3>Quiz Responds Table</h3>
							<p>This tabe is the table that store all the given quiz inputs inside of the database. the User ID is the ID belong to the User who enters the entrys to the system</p>
							<!-- <a href="enhancements.html" class="button-link">VIEW</a> -->
						</div>
					</div>

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss23.png" alt="Image 8" />
							<h3>Quiz Score Table</h3>
							<p> This table will store all the scores per each quistion and the total score for all the quistion for the each quiz attempt tryed by the user </p>
							<!-- <a href="enhancements.html" class="button-link">VIEW</a> -->
						</div>
					</div>

				</div>

				<div class="row-enhas">

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss24.png" alt="Image 8" />
							<h3>User Table</h3>
							<p> This table will store all the User information including user names and passwords this table will automatically alocate a user ID per each user  </p>
							<!-- <a href="enhancements.html" class="button-link">VIEW</a> -->
						</div>
					</div>

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss25.png" alt="Image 8" />
							<h3>Admin Table</h3>
							<p> This table will store all the admin information including user name and passwords this table will automatically alocate a admin ID per each user  </p>
							<!-- <a href="enhancements.html" class="button-link">VIEW</a> -->
						</div>
					</div>

					<div class="col-enhsas" style="width: 27.2em !important"></div>
					<div class="col-enhsas" style="width: 27.2em !important"></div>

				</div>

				<h2 style="text-align: center;"> PhP Funtions </h2>


				<div class="row-enhas">

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss29.png" alt="Image 8" />
							<h3>User login and sign up funtion</h3>
							<p> This funtion allows someone to log in to the system if they have logins else users can register via using the same form but clicking on the "Registration" button</p>
							<!-- <a href="enhancements.html" class="button-link">VIEW</a> -->
						</div>
					</div>

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss30.png" alt="Image 8" />
							<h3>Limited Quiz attempts  funtion</h3>
							<p> This funtion will help to limit the quiz attempts that one user can have and will privent any above limit responds going to the database </p>
							<!-- <a href="enhancements.html" class="button-link">VIEW</a> -->
						</div>
					</div>

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss27.png" alt="Image 7" />
							<h3>Database Connection</h3>
							<p>For the database connection is done by connect.inc it's a commen file for  the entyer website wich allows ot establish the database connection for the website  </p>
							<!-- <a href="enhancements.html" class="button-link">VIEW</a> -->
						</div>
					</div>
					
					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss28.png" alt="Image 8" />
							<h3>Log in & log out buttons</h3>
							<p>the login logout button have the ability to identify if the user is logged in to the system or not and based on that the button can display the logout or log in for the visitor </p>
							<!-- <a href="enhancements.html" class="button-link">VIEW</a> -->
						</div>
					</div>

				</div>

				<div class="row-enhas">

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss31.png" alt="Image 8" />
							<h3>Limited Quiz Score  funtion</h3>
							<p> This funtion will help tget  the score for each quiz attempts based on the answers that insrted in the quiz form </p>
							<!-- <a href="enhancements.html" class="button-link">VIEW</a> -->
						</div>
					</div>

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss26.png" alt="Image 6" />
							<h3>File Structure</h3>
							<p> The system is fully converted to php by changing the exentons, .html to .php and there is a global header and footer for the entyer web site </p>
							<!-- <a href="index.html#video-wrapper" class="button-link">VIEW</a> -->
						</div>
					</div>

					<div class="col-enhsas" style="width: 27.2em !important"></div>
					<div class="col-enhsas" style="width: 27.2em !important"></div>

				</div>

				<h2 style="text-align: center;"> Global Files in the PhP website </h2>

				<div class="row-enhas">

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss32.png" alt="Image 8" />
							<h3> Global Header File </h3>
							<p> This is the gobal header for the entryer site and ths contain all the header Elements of the website </p>
							<!-- <a href="enhancements.html" class="button-link">VIEW</a> -->
						</div>
					</div>

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss33.png" alt="Image 8" />
							<h3> Global Footer File </h3>
							<p> This is the gobal Footer for the entryer site and ths contain all the Footer Elements of the website </p>
							<!-- <a href="enhancements.html" class="button-link">VIEW</a> -->
						</div>
					</div>

					<div class="col-enhsas">
						<div class="center-image-card">
							<img src="images/ss34.png" alt="Image 8" />
							<h3> Global Menu File </h3>
							<p> This is the gobal Menue for the entryer site and ths contain all the Menu Elements of the website </p>
							<!-- <a href="enhancements.html" class="button-link">VIEW</a> -->
						</div>
					</div>
					<div class="col-enhsas" style="width: 27.2em !important"></div>
				</div>

			</section>
		</div>
		
<?php 
    //including the Footer file 
    require'footer.inc'; 
?>