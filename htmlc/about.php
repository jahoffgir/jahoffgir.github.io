<!DOCTYPE html>
<html lang="en">
		<!-- The head of the page -->
		 <head> <title>About</title>
		 	<meta charset="utf-8" />

		 	<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
			<link rel="stylesheet" type="text/css" href="assets/css/footer.css">

			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<!-- <link rel="shortcut icon" href="Images/fl.png"> -->
			<link rel="icon" href="assets/images/favicon.png" sizes="16x16 32x32">
			<meta name="viewport" content ="width=device-width, initial-scale=1">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
			<script src="assets/js/typewriter.js"></script>
			<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC|Josefin+Slab:700">
		 	</head>
		 	<!-- Body of the page -->
		 	<body>
			<div id="index-background">
		 		<!-- Navigation of the page -->

				<nav>
				    <div class="handle"><img class="menu" src="assets/images/icons/menu.png" alt="Menu">Menu</div>
					<div class="text_logo" ><a data-hover="CLICK ME"href="index.html"><b>&lt;jahoffgir&gt;</b></a></div>
				    <ul>
				      	<a href="about"><li class="active">About
				      	</li></a><a href="projects"><li>Projects
						</li></a><a href="blog"><li>Blog
				      	</li></a><a href="experiences"><li>Experiences</li></a>
				    </ul>
				</nav>

				<div class="about-wrap">
				<img class="boat" src="assets/images/boat.jpeg" alt="Boat">
				<div class="about-content">

					<!-- <p>Hello, World!</p> -->
					<p>Hello, World!<br> I am<span
     					class="txt-rotate"
     					data-period="2000"
     					data-rotate='[ " an aspiring Software Developer.", " a passionate learner.",
						" GOOFY!", " a minimalist." ]'></span>
					<br>My name is Jahongir, Jahon for short. Welcome to my personal
					website. As you explore my site, you can look forward to a
					showcase of my fun projects, my blog about a variety of
					topics, and the stories of my experiences.</p>
					<section id="section03" class="demo">
  					<a href="#blank-space"><span></span></a>
					</section>
			  	</div>
				</div>
		   </div>
		   <div id="blank-space"></div>
		   <div id="scroll-down">

			   <div class="about-cont">
				   <p>To give a little backstory, I was born in Samarkand, Uzbekistan
						and grew up in Brooklyn. I moved to Rochester when I
						started at R.I.T. Currently, I am a Junior and majoring
						in Computer Science. My hobbies include: learning new things,
						 watching/reading anime/manga, being involved in school
						 activities, and fashion. I am a car enthusiast and I
						  love listening to music. </p>
			   </div>
	       </div>
		   <div align="center" class="follow-me">
			   <p>Follow me on:</p>
			   <div align="center" class="footer">
					<a href="https://www.facebook.com/jahongir.amir" class="fa fa-facebook"></a>
					<a href="https://www.linkedin.com/in/jahongir-amirkulov-274523107/" class="fa fa-linkedin"></a>
					<a href="https://www.instagram.com/jahoffgir/" class="fa fa-instagram"></a>
					<a href="https://github.com/jahoffgir" class="fa fa-github"></a>
				</div>
			</div>
	 		<script>
	 		    $('.handle').on('click', function() {
	 		        $('nav ul').toggleClass("showing");
	 		    });
	 		</script>
		 	</body>
</html>
