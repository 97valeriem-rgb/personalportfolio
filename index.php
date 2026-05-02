<!DOCTYPE html>
<html>
<head>
  <title>My Portfolio</title>

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

 <link rel="stylesheet" href="css/style.css">
</head>

<body>
<canvas id="bg"></canvas>
<!-- NAVBAR -->
<nav>
  <h2>MyPortfolio</h2>
  <ul>
    <li><a href="#about">About</a></li>
    <li><a href="#skills">Skills</a></li>
    <li><a href="#projects">Projects</a></li>
    <li><a href="#contact">Contact</a></li>
    
  </ul>
</nav>

<!-- HERO -->
<header class="hero">
 <img src="image/profile.jpg.jpeg">
<h1>Hi, I'm Valerie Miranda <span id="typing"></span></h1>
  <p>Full Stack Web Developer | 3rd Year IT Student </p>
  <a href="resume.pdf" download class="btn">Download Resume</a>
</header>

<!-- ABOUT -->
<section id="about" class="about">
  <h2>About Me</h2>
  <p>
    I am a passionate Full Stack Web Developer and a 3rd Year student who loves creating beautiful and functional websites.
    I enjoy learning new technologies and turning ideas into real-world projects.
    Currently, I am building my skills in full-stack development and exploring creative UI design.
  </p>
</section>

<!-- SKILLS -->
<section id="skills">
  <h2>Skills</h2>
  <ul>
    <li>HTML</li>
    <li>CSS</li>
    <li>JavaScript</li>
    <li>PHP</li>
    <li>MySQL</li>
    <li>Figma</li>
     <li>Canva</li>
  </ul>
</section>

<!-- PROJECTS -->
<section id="projects">
  <h2>Projects</h2>

  <div class="project-card">
    <h3>Portfolio Website</h3>
    <p>Built using HTML, CSS, JavaScript, PHP & MySQL.</p>
    <a href="#" class="btn">View Project</a>
  </div>

</section>

<section id="contact">
  <h2>Contact Me</h2>

  <form action="contact.php" method="POST">
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="email" name="email" placeholder="Your Email" required>
    <textarea name="message" placeholder="Your Message"></textarea>

    <button type="submit">Send Message</button>
  </form>

  <p class="success-msg">
  <?php if(isset($_GET['success'])) echo "✅ Message sent successfully!"; ?>
</p>
</section>

<footer>
  <p>© 2026 Valerie Miranda</p>

  <div class="socials">
  <a href="https://www.instagram.com/valerie__97" target="_blank">Instagram</a>
  <a href="https://github.com/97valeriem-rgb" target="_blank">GitHub</a>
  <a href="https://www.linkedin.com/in/valerie-miranda-755a0b313" target="_blank">LinkedIn</a>
</div>
</footer>

<script src="js/script.js"></script>
</body>
</html>