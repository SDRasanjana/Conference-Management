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
	<?php include_once('../components/header.html'); ?>

	<!-- main content -->
	<main class="conferences-page">
		<h1>Conference List</h1>
		<table id="conferenceTable">
			<thead>
				<tr>
					<th>Name</th>
					<th>Date</th>
					<th>Location</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody id="conferenceList">
				<!-- database information should be appear here let's do together -->
			</tbody>
		</table>
		<!-- Please create body content here -->
	</main>

	<!-- update pop up -->
	<div id="updatePopup" class="hidden">
		<div class="popup-content">
			<span class="close" onclick="closeUpdatePopup()">&times;</span>
			<h4>Update Conference</h4>
			<form id="updateForm">
				<input type="hidden" id="id" name="id">
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

				<button type="submit">Update Conference</button>
			</form>
		</div>
	</div>

	<!-- delete pop up -->
	<div id="deletePopup" class="hidden">
		<div class="popup-content">
			<span class="close" onclick="closeDeletePopup()">&times;</span>
			<h4>Delete Conference</h4>
			<p>Are you sure you want to delete this conference?</p>
			<div class="buttons">
				<button id="deleteButton">Delete</button>
				<button id="cancelButton">Cancel</button>
			</div>
		</div>
	</div>

	<script>
		// get conferences from database using fetch
		fetch('/api/get_conferences.php')
			.then(response => response.json())
			.then(data => {
				const conferenceList = document.getElementById('conferenceList');
				data.forEach(conference => {
					const tr = document.createElement('tr');
					tr.innerHTML = `
						<td>${conference.name}</td>
						<td>${conference.date}</td>
						<td>${conference.location}</td>
						<td>
							<button class="edit"
								onclick="showUpdatePopup(
									{
										id: ${conference.id},
										name: '${conference.name}',
										description: '${conference.description}',
										date: '${conference.date}',
										host: '${conference.host}',
										location: '${conference.location}'
									}
								)">Edit</button>
							<button class="delete" 
								onclick="showDeletePopup(${conference.id})"
							>Delete</button>
						</td>
					`;
					conferenceList.appendChild(tr);
				});
			})
			.catch(error => console.error(error));

		// update popup event show
		const showUpdatePopup = (data) => {
			const updatePopup = document.getElementById('updatePopup');
			const updateForm = document.getElementById('updateForm');

			// set form data
			document.getElementById('id').value = data.id;
			document.getElementById('name').value = data.name;
			document.getElementById('description').value = data.description;
			document.getElementById('date').value = data.date;
			document.getElementById('host').value = data.host;
			document.getElementById('location').value = data.location;

			// show update popup
			updatePopup.classList.remove('hidden');

			// submit form
			updateForm.addEventListener('submit', (event) => {
				event.preventDefault();
				const id = document.getElementById('id').value;
				const name = document.getElementById('name').value;
				const description = document.getElementById('description').value;
				const date = document.getElementById('date').value;
				const host = document.getElementById('host').value;
				const location = document.getElementById('location').value;

				// create form data
				const formData = new FormData();
				formData.append('id', id);
				formData.append('name', name);
				formData.append('description', description);
				formData.append('date', date);
				formData.append('host', host);
				formData.append('location', location);

				// update conference in database using fetch
				fetch('/api/update.php', {
						method: 'POST',
						body: formData
					})
					.then(response => response.json())
					.then(data => {
						if (data.message) {
							alert('Conference updated successfully');
							updatePopup.style.display = 'none';
							window.location.reload();
						} else {
							alert('Error updating conference');
						}
					})
					.catch(error => console.error(error));
			});
		}

		// close edit popup
		const closeUpdatePopup = () => {
			const updatePopup = document.getElementById('updatePopup');
			updatePopup.classList.add('hidden');
		}

		// delete popup event show
		const showDeletePopup = (id) => {
			const deletePopup = document.getElementById('deletePopup');
			const deleteButton = document.getElementById('deleteButton');
			const cancelButton = document.getElementById('cancelButton');

			// show delete popup
			deletePopup.classList.remove('hidden');
			const formData = new FormData();
			formData.append('id', id);

			// delete conference
			deleteButton.addEventListener('click', () => {
				// delete conference from database using fetch
				fetch(`/api/delete.php`, {
						method: 'POST',
						body: formData
					})
					.then(response => response.json())
					.then(data => {
						if (data.message) {
							alert('Conference deleted successfully');
							deletePopup.classList.add('hidden');
							window.location.reload();
						} else {
							alert('Error deleting conference');
						}
					})
					.catch(error => console.error(error));
			});

			// cancel delete
			cancelButton.addEventListener('click', () => {
				deletePopup.classList.add('hidden');
			});
		}

		// close delete popup
		const closeDeletePopup = () => {
			const deletePopup = document.getElementById('deletePopup');
			deletePopup.classList.add('hidden');
		}
	</script>

	<!-- footer -->
	<?php include_once('../components/footer.html'); ?>

</body>

</html>