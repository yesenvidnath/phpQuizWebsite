<?php 
    //including the header file 
    require'header.inc'; 
    //include the database connection file
    require'connect.inc';
?>

		<main>
			<section class="banner">
				<div class="slider">
					<img src="images/contact.png" alt="banner_image" />
				</div>
			</section>
			<section class="contact-form">
				<div class="container">
					<div class="form-wrapper">
						<div class="contact-details">
							<ul>
								<li>
									<img
										src="images/location.png"
										alt="location_icon"
									/>
									<p>
										John St, Hawthorn VIC<br />
										3122,Australia.
									</p>
								</li>
								<li>
									<img
										src="images/phone.png"
										alt="phone_icon"
									/>
									<p>+94 77 676 3524</p>
								</li>
								<li>
									<img
										src="images/email.png"
										alt="email_icon"
									/>
									<p>compsysproj@gmail.com</p>
								</li>
							</ul>
						</div>
						<span class="line"></span>
						<form method="post" id="contact-form">
							<fieldset>
								<legend>Contact us</legend>
								<input
									type="text"
									id="name"
									name="name"
									required
									placeholder="Enter your name"
								/>
								<input
									type="text"
									id="email"
									name="email"
									required
									placeholder="Enter your email"
								/>
								<textarea
									name=""
									rows="4"
									placeholder="Enter your message"
								></textarea>
							</fieldset>
							<input type="submit" value="Submit" />
						</form>
					</div>
				</div>
			</section>
			<section class="social-media-links">
				<div class="container">
					<h2>Follow us on social media</h2>
					<ul>
						<li>
							<a
								href="https://www.facebook.com/swinburneuniversityoftechnology/"
								><img src="images/" alt=""
							/></a>
						</li>
						<li>
							<a href="https://www.instagram.com/swinburne/reels/"
								><img src="" alt=""
							/></a>
						</li>
						<li>
							<a href="https://twitter.com/Swinburne"
								><img src="" alt=""
							/></a>
						</li>
						<li>
							<a href="https://www.youtube.com/user/swinburne"
								><img src="" alt=""
							/></a>
						</li>
					</ul>
				</div>
			</section>
			<section class="map-secrtion">
				<img src="images/map.png" alt="map_image" />
			</section>
		</main>
		
<?php 
    //including the Footer file 
    require'footer.inc'; 
?>
