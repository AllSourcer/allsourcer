<<<<<<< HEAD

<?php
session_start(); // Start the session.
require_once("connection.php");
 // If no session value is  present,
if (!isset($_SESSION['user_id'])) {
 header("Location: signin.php");
 exit();
}
else {
//you are loged in 
 $page_title = 'Logged In!';
//log out page link
 echo "<p><a href=\"logout.php\">Logout</a></p>";

 //display the tasks that exist on the dashboard
 $query = "select * from tasks";

							 $status = mysqli_query($db,$query);
							if(!$status)
	                			die("task query failed"). mysqli_error();
	            			$row = mysqli_fetch_array($status,MYSQLI_ASSOC);
	            			print_r($row);

	            			mysqli_close();
}
?>

<!DOCTYPE html>
<html>
=======



<html>

>>>>>>> 3d54286bf8778e16db82ea6ef9f1f4163b766d24
<head>
	<title> Project Alpha </title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <link rel="stylesheet" type="text/css" href="css/index.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<!--<script src="js/jquery.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<link rel="stylesheet" href="boostrap/boostrap/css/bootstrap-theme.min.css">

</head>

<body>

	<div class="demo-layout-waterfall mdl-layout mdl-js-layout">
		<header class="mdl-layout__header mdl-layout__header--waterfall">
			<!-- Top row, always visible -->
			<div class="mdl-layout__header-row">
				<!-- Title -->
				<span class="mdl-layout-title">Project Alpha</span>
				<div class="mdl-layout-spacer"></div>


				<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
				mdl-textfield--floating-label mdl-textfield--align-right">
					<label class="mdl-button mdl-js-button mdl-button--icon"
					for="waterfall-exp">
					<i class="material-icons">search</i>
					</label>

					<div class="mdl-textfield__expandable-holder">
						<input class="mdl-textfield__input" type="text" name="sample"
						id="waterfall-exp">
					</div>
				</div>
			</div>
		<!-- Bottom row, not visible on scroll -->
		</header>




		<div class="mdl-layout__drawer">
			<!-- Profile pic
				<div class="demo-card-image mdl-card mdl-shadow--4dp">
  				<div class="mdl-card__title mdl-card--expand"></div>
			</div> -->

			<span class="mdl-layout-title">Project Alpha</span>

			<nav class="mdl-navigation">
				<a class="mdl-navigation__link" href="">Link</a>
				<a class="mdl-navigation__link" href="">Link</a>
				<a class="mdl-navigation__link" href="">Link</a>
				<a class="mdl-navigation__link" href="">Link</a>
				<a class="mdl-navigation__link" href="logout.php"> logout</a>
			</nav>
		</div>

		<main class="mdl-layout__content">
			<div class="container-fluid">

				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--8-col mdl-cell--12-col-tablet">
						<div class="row"><h6>Recent Task</h6></div>

						<div class="row">
							<div id="starter" class="mdl-grid">


								<?php while ($row) {
									# code...
								} { ?>
									<div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet">
										<div class="mdl-card mdl-shadow--4dp">
											<div class="mdl-card__title">
												<h2 class="mdl-card__title-text"><?php $row['title']; ?></h2>
											</div>
											<div class="mdl-card__supporting-text">
												<?php $row['description']; ?>
											</div>
											<div class="mdl-card__actions">
												<button onclick="viewtask()" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
												  	View Task
												</button>
											</div>

											<!-- coming soon -->
										  	<!--<div class="mdl-card__menu">
										    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
										      <i class="material-icons">share</i>
										    </button>
											</div>-->
										</div>
									</div>
								<?php } ?>

							</div>
						</div>
					</div>


					<div class="mdl-cell mdl-cell--4-col mdl-cell--12-col-tablet">
						<div class="row"><h6>Top Unclaimed Task</h6></div>
							<div class="row">
								<div style="" class="mdl-grid">
									
									<?php for($i=0;$i<2;$i++) { ?>
										<div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet">
											<div class="mdl-card mdl-shadow--4dp">
												<div class="mdl-card__title">
													<h2 class="mdl-card__title-text">Type of Task</h2>
												</div>
												<div class="mdl-card__supporting-text">
													A short but well detailed introduction into what this task actually is all about.
												</div>
												<div class="mdl-card__actions">
													<button onclick="viewtask()" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
													  	View Task
													</button>
												</div>

												<!-- coming soon -->
											  	<!--<div class="mdl-card__menu">
											    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
											      <i class="material-icons">share</i>
											    </button>
												</div> -->
											</div>
										</div>
									<?php } ?>

								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</main>
	</div>


	<script>

		function viewtask() {
			window.location.replace("pages/");
		} /*
		for(var i=0;i<4;++i) {
			var content = document.createElement("div");
			content.id = 'alpha'+i;
			content.className = 'mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet';
			var body = document.querySelector("div[id]");
			body.appendChild(content);
		document.getElementById("alpha" + i).innerHTML = "<div class=\"mdl-card mdl-shadow--4dp\"><div class=\"mdl-card__title\"><h2 class=\"mdl-card__title-text\">Type of Task</h2></div><div class=\"mdl-card__supporting-text\">A short but well detailed introduction into what this task actually is all about.</div><div class=\"mdl-card__actions\"><button class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\">View Task</button></div><!-- coming soon --><!--<div class=\"mdl-card__menu\"><button class=\"mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect\"><i class=\"material-icons\">share</i></button></div> --></div>";
		}

		for(var i=0;i<10;++i) {
			var content = document.createElement("div");
			content.id = 'beta'+i;
			content.className = 'mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet';
			var body = document.querySelector("div[style]");
			body.appendChild(content);
		document.getElementById("beta" + i).innerHTML = "<div class=\"mdl-card mdl-shadow--4dp\"><div class=\"mdl-card__title\"><h2 class=\"mdl-card__title-text\">Type of Task</h2></div><div class=\"mdl-card__supporting-text\">A short but well detailed introduction into what this task actually is all about.</div><div class=\"mdl-card__actions\"><button class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\">View Task</button></div><!-- coming soon --><!--<div class=\"mdl-card__menu\"><button class=\"mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect\"><i class=\"material-icons\">share</i></button></div> --></div>";	} */
	</script>
</body>

</html>