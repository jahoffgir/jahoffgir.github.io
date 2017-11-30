<!DOCTYPE html>
<html lang="en">
		<!-- The head of the page -->
		 <head> <title>Homepage</title>
		 	<meta charset="utf-8" />

		 	<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
			<!-- <link rel="shortcut icon" href="Images/fl.png"> -->
			<link rel="icon" href="assets/images/favicon.png" sizes="16x16 32x32">
			<meta name="viewport" content ="width=device-width, initial-scale=1">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
			<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC|Josefin+Slab:700">
		 	</head>
		 	<!-- Body of the page -->
		 	<body>
				<nav>
					<div class="handle"><img class="menu" src="assets/images/icons/menu.png" alt="Menu">Menu</div>
					<div class="text_logo" ><a data-hover="CLICK ME"href="index.html"><b>&lt;jahoffgir&gt;</b></a></div>
					<ul>
						<a href="about"><li>About
						</li></a><a href="projects"><li>Projects
						</li></a><a href="blog"><li>Blog
						</li></a><a href="experiences"><li class="active">Experiences</li></a>
					</ul>
				</nav>
				<p>Coming soon</p>

		   		<footer></footer>


		 		<script>
		 		    $('.handle').on('click', function() {
		 		        $('nav ul').toggleClass("showing");
		 		    });
		 		</script>
		 	</body>
</html>
