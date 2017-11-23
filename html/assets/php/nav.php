<?php
// all these variables to make the link active
// $isIndex = (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'class="active"' : '';
// $isKey = (basename($_SERVER['PHP_SELF']) == '#') ? 'class="active"' : '';
// $isLargo = (basename($_SERVER['PHP_SELF']) == 'keylargo.php') ? 'class="active"' : '';
// $isIslamorada = (basename($_SERVER['PHP_SELF']) == 'islamorada.php') ? 'class="active"' : '';
// $isMarathon = (basename($_SERVER['PHP_SELF']) == 'marathon.php') ? 'class="active"' : '';
// $isBig = (basename($_SERVER['PHP_SELF']) == 'biglow.php') ? 'class="active"' : '';
// $isWest = (basename($_SERVER['PHP_SELF']) == 'keywest.php') ? 'class="active"' : '';
// $isUnder = (basename($_SERVER['PHP_SELF']) == 'under.php') ? 'class="active"' : '';
// $isBeaches = (basename($_SERVER['PHP_SELF']) == 'beaches.php') ? 'class="active"' : '';
// $isHistory = (basename($_SERVER['PHP_SELF']) == 'history.php') ? 'class="active"' : '';
// $isExp = (basename($_SERVER['PHP_SELF']) == 'experience.php') ? 'class="active"' : '';
// $isGrading = (basename($_SERVER['PHP_SELF']) == 'grading.php') ? 'class="active"' : '';
// $isGrading2 = (basename($_SERVER['PHP_SELF']) == 'grading2.php') ? 'class="active"' : '';
// $isQuiz = (basename($_SERVER['PHP_SELF']) == 'quiz.php') ? 'class="active"' : '';
// $isBlog = (basename($_SERVER['PHP_SELF']) == 'blog.php') ? 'class="active"' : '';
// the actual navigation for the website
echo <<<END
<nav>
    <div class="handle"><img class="menu" src="assets/images/icons/menu.png" alt="Menu"></a>Menu</div>
    <ul>
      <a href="index.php"><li>Home
      </li></a><a href="projects.php"><li>Projects</li></a>
      <a href="blogs.php"><li>Blogs
      </li></a><a href="experiences.php"><li>Experiences</li></a>
      <a href="resume.php"><li>Resume
      </li></a><a href="contact.php"><li>Contact</li></a>
    </ul>
    
</nav>
END;
?>