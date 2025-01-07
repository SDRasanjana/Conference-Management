<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/jpg" href="/images/logo.png">
	<title>Conference Management System</title>
	<link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="/css/styles.css">
</head>

<body>
	<!-- header -->
	<?php include_once('./components/header.html'); ?>

	<!-- main content -->
	<main>
		<section class="hero">
			<div class="hero-content">
				<h1>Welcome to Conference Management System</h1>
				<p>Manage your conferences with ease using our state-of-the-art system.</p>
				<a href="./conferences/index.php" class="btn btn-primary">View Conferences</a>
			</div>
			<div class="container">
				<div class="left-section">
					<h2>A better way to manage your events</h2>
					<ul class="features">
						<li>Find hotels and venues</li>
						<li>Plan and promote your event</li>
						<li>Engage your attendees</li>
					</ul>
					<div class="cta-buttons">
						<a href="#" class="btn btn-primary">Explore the platform</a>
					</div>
				</div>
				<div class="right-section">
					<img src="https://www.cvent.com/sites/default/files/styles/max_1170w/public/image/2023-07/HP2023.webp?itok=STzfS3lr" alt="Conference management illustration" class="platform-image">
				</div>
			</div>
		</section>
	</main>

	<!-- footer -->
	<?php include_once('./components/footer.html'); ?>
</body>

</html>