<?php
	include('assets/php/db_connect.php');
	$record_count = $db->query("SELECT * FROM post");

	//amount displayed
	$per_page = 2;

	// number of pages
	$pages = ceil($record_count->num_rows/$per_page);


	// get page number
	if (isset($_GET['p']) && is_numeric($_GET['p'])) {
		$page = $_GET['p'];
	} else {
		$page = 1;
	}
	if ($page <= 0) {
		$start = 0;
	} else {
		$start = $page * $per_page - $per_page;
	}

	$prev = $page - 1;

	$next = $page + 1;

	$query = $db->prepare("SELECT  DISTINCT post_id, title, LEFT(body, 100) AS
	body, category, posted FROM post INNER JOIN categories ON
	categories.category_id=post.category_id order by post_id desc limit $start, $per_page");

	$query->execute();
	$query->bind_result($post_id, $title, $body, $category, $posted);
	
?>
<!DOCTYPE html>
<html lang="en">
		<!-- The head of the page -->
		 <head> <title>Blog</title>
		 	<meta charset="utf-8" />

		 	<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
            <link rel="stylesheet" type="text/css" href="assets/css/footer.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="icon" href="assets/images/favicon.png" sizes="16x16 32x32">
			<meta name="viewport" content ="width=device-width, initial-scale=1">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
			<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC|Josefin+Slab:700">
		 	</head>
		 	<!-- Body of the page -->
			<style>
				.blog-links {
					color: #bdcebe;
				}
				.blog-link:hover{
					text-decoration: underline;
				}
                #container {
                    padding: 5%;
                }
                @media screen and (max-width: 580px) {
                    #container {
                        padding-top: 10%;
                    }
                }
			</style>

		 	<body>
				<nav>
				    <div class="handle"><img class="menu" src="assets/images/icons/menu.png" alt="Menu">Menu</div>
					<div class="text_logo" ><a data-hover="CLICK ME"href="index.html"><b>&lt;jahoffgir&gt;</b></a></div>
				    <ul>
				      	<a href="about"><li>About
				      	</li></a><a href="projects"><li>Projects
						</li></a><a href="blog"><li class="active">Blog
				      	</li></a><a href="experiences"><li>Experiences</li></a>
				    </ul>
				</nav>

				<div id=container>
					<?php
						while($query->fetch()):
							$lastspace = strrpos($body, ' ');
					?>
					<article>
                        
						<h2><?php echo "<a class='blog-link' href='./post?id=$post_id'></br>$title</a>"?></h2>
						<?php echo html_entity_decode(substr($body, 0, $lastspace)) ?>
						<?php echo "<a class='blog-link blog-links' href='./post?id=$post_id'>Read More</a>"?>
						<p>Category: <?php echo $category?></p>
						
						<p class='data-format'>Date: <?php echo date_format(new DateTime($posted), "m/d/Y")?></p>

					</article>
					<?php endwhile?>

					<?php if ($prev > 0) {
						echo "<a href ='blog.php?p=$prev'>Prev</a>";
					}

					if ($page < $pages) {
						echo "<a href ='blog.php?p=$next'>Next</a>";
					}
					?>
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
