<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/jpg" href=".\images\logo.png">
	<title>Conference Management System</title>
	<link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="/css/styles.css">
</head>

<body>
	<!-- header -->
	<?php include_once('../components/header.html'); ?>

	<!-- main content -->
	<main class="form-page">
		<h1 id="formTitle">Add New Conference</h1>
		<form id="conferenceForm">
			<label for="name">Conference Name:</label>
			<input type="text" id="name" name="name" required placeholder="Enter conference name">

			<label for="description">Conference Description:</label>
			<input type="text" id="description" name="description" required placeholder="Enter conference description">

			<label for="date">Date:</label>
			<input type="date" id="date" name="date" required>

			<label for="host">Host:</label>
			<input type="text" id="host" name="host" required placeholder="Enter the name of the organization hosting the conference">

			<label for="location">Location:</label>
			<input type="text" id="location" name="location" required placeholder="Enter the location of the conference">


			<button type="submit">Save Conference</button>
			<button type="reset" id="rst">Reset Conference</button>
			
		</form>
	</main>

	<script>
		// get form data
		const conferenceForm = document.getElementById('conferenceForm');
		conferenceForm.addEventListener('submit', (event) => {
			event.preventDefault();
			const name = document.getElementById('name').value;
			const description = document.getElementById('description').value;
			const date = document.getElementById('date').value;
			const host = document.getElementById('host').value;
			const location = document.getElementById('location').value;

			// create form data
			const formData = new FormData();
			formData.append('name', name);
			formData.append('description', description);
			formData.append('date', date);
			formData.append('host', host);
			formData.append('location', location);

			// save conference to database using fetch
			fetch('/api/add.php', {
					method: 'POST',
					body: formData
				})
				.then(response => response.json())
				.then(data => {
					if (data.message) {
						alert('Conference saved successfully');
						conferenceForm.reset();
					} else {
						alert('Error saving conference');
					}
				})
				.catch(error => console.error(error));
		});
	</script>

	<!-- footer -->
	<?php include_once('../components/footer.html'); ?>

</body>

</html>