<?php session_start()?>
<?php require_once('php/functions.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/bootstrap.css"/>
    <link rel="stylesheet" href="assets/profile_page.css"/>
	<link rel="stylesheet" href="assets/cookies.css"/>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="assets/main.js" defer></script>
    <script src="https://kit.fontawesome.com/78d03b3312.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title><?php echo $_SESSION['username_search']; ?>'s profile page</title>
</head>
<body>
    <nav>
        <div class="navigation">
			<div class="logo">
				<a class="no-underline" href="index.php">InstaKilogram</a>
			</div>
            <div class="navigation-search-container">
                    <a href="user_search_page.php"><i class="fa fa-search"></i></a>
                    <!-- <form action="php/search.php" method="get" enctype="multipart/form-data">
                        <button type="submit" name="search">Search</button>
                        <i class="fa fa-search"></i>
                        <input class="search-field" name='user_search' type="text" placeholder="Search" id="search-bar">
                        <div class="search-container">
                            <div class="search-container-box">
                                    <div class="search-results">
                                    </div>
                            </div>
                        </div>
                    </form> -->
                </div>
            <div class="navigation-icons">
            <a href="newsfeed.php" class="navigation-link">
                    <i class="fa-solid fa-house"></i>
                </a>
                <a href="#" class="navigation-link">
                    <i class="fa-brands fa-facebook-messenger"></i>
                </a>
                <a href="#" class="navigation-link">
                    <i class="fa-solid fa-heart" id="heart_nav">
                    </i>
                </a>
                <a href="profile_page.php" class="navigation-link user-icon">
					<img src="<?php echo get_profile_img($_SESSION['username']); ?>" onerror="this.src='assets/default_image/default_image.jpeg';" height='30' width='30' alt='avatar' class='rounded-circle'>
                </a>
            </div>
        </div>
    </nav>
<header>

	<div class="container my-5 border-bottom">

		<div class="profile">

			<div class="profile-image">
				<img src="<?php echo get_profile_img($_SESSION['username_search']); ?>" onerror="this.src='assets/default_image/default_image.jpeg';" height='150' width='150' alt=''>
			</div>

			<div class="profile-user-settings">
				<p></p>
				<h1 class="profile-user-name"><?php echo $_SESSION['username_search']; ?></h1>

				<button type="button" class="profile-btn profile-edit-btn">Add friend</button>

				<!-- <button type="button" class="profile-btn profile-settings-btn" aria-label="profile settings"><i class="fas fa-cog" aria-hidden="true"></i></button> -->

			</div>

			<div class="profile-stats">

				<ul>
					<li><span class="profile-stat-count">925</span> posts</li>
					<li><span class="profile-stat-count">925</span> followers</li>
					<li><span class="profile-stat-count">925</span> following</li>
				</ul>

			</div>

			<div class="profile-bio">
				<span class="profile-real-name"><?php echo $_SESSION['fname_search']." ".$_SESSION['lname_search']; ?></span>
				<p> Lorem ipsum dolor sit, amet consectetur adipisicing elit 📷✈️🏕️</p>

			</div>

		</div>
		<!-- End of profile section -->

	</div>
	<!-- End of container -->

</header>

<main>

	<div class="container">

		<div class="gallery">
			<?php 
			$data = retrieve_data("../UserData/UserUpload/posts.db");
			for ($i = (count($data) - 1); $i >= 0; $i--){
				$username = '';
				$caption = '';
				$sharing_level = '';
				$image = '';
				foreach ($data[$i] as $key => $value) {
					$username = get_name_via_email($data[$i]['email']);
					$caption = $data[$i]['caption'];
					$sharing_level = $data[$i]['sharing_level'];
					$image = $data[$i]['image_location'];
				}
				if ($username == $_SESSION['username_search']){
					if ($_SESSION['login'] === false) {
						if ($sharing_level == 'public') {
							echo 
							'<div class="gallery-item" tabindex="0">
								<img src="../UserData/UserUpload/Images/'.$image.'" class="gallery-image" alt="image">
							<div class="gallery-item-info">
								<ul>
									<li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i>925,529</li>
									<li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 925</li>
								</ul>
								</div>
							</div>';
						} else {
							continue;
						}
					} else {
						if ($sharing_level == 'private') {
							continue;
						} else {
							echo 
							'<div class="gallery-item" tabindex="0">
								<img src="../UserData/UserUpload/Images/'.$image.'" class="gallery-image" alt="image">
							<div class="gallery-item-info">
								<ul>
									<li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i>925,529</li>
									<li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 925</li>
								</ul>
								</div>
							</div>';
						}
					}
				}
				else{
					continue;
				}
			}
			?>

		</div>

	</div>
	<!-- End of container -->

    <!-- Cookies modal -->
    <div id="cookies">
        <div class="container">
            <div class="subcontainer">
                <h3>Our website will use cookies</h3>
                <div class="cookies">
                    <p>This website uses your cookies to improve the performance of our website as well as your
                        experiences at our website. This cookies consent is only appear one, if you accept it, it will not appear again across pages.</p>
                    <a href="https://gdpr-info.eu/">Learn More</a>
                    <button id="cookies-btn">I accept</button>
                </div>
            </div>
        </div>
    </div>
	<script src="assets/cookies.js"></script>
</main>
</body>
</html>