const canvas = document.getElementById("bg");
const ctx = canvas.getContext("2d");
const msg = document.querySelector(".success-msg");

if (window.location.search.includes("success")) {
  window.history.replaceState({}, document.title, window.location.pathname);
}

if (msg && msg.innerText.trim() !== "") {
  setTimeout(() => {
    msg.style.opacity = "0";
    msg.style.transition = "0.5s";

    setTimeout(() => {
      msg.style.display = "none";
    }, 500);

  }, 3000); // disappears after 3 seconds
}
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

let particles = [];
let mouse = {
  x: null,
  y: null,
  radius: 120
};

window.addEventListener("mousemove", function(e) {
  mouse.x = e.x;
  mouse.y = e.y;
});

class Particle {
  constructor() {
    this.x = Math.random() * canvas.width;
    this.y = Math.random() * canvas.height;
    this.size = Math.random() * 3 + 1;
    this.speedX = (Math.random() - 0.5) * 1;
    this.speedY = (Math.random() - 0.5) * 1;
    this.color = Math.random() > 0.5 ? "#ff00c8" : "#9d4edd";
  }

  update() {
    this.x += this.speedX;
    this.y += this.speedY;

    // bounce from edges
    if (this.x > canvas.width || this.x < 0) this.speedX *= -1;
    if (this.y > canvas.height || this.y < 0) this.speedY *= -1;

    // mouse interaction
    let dx = mouse.x - this.x;
    let dy = mouse.y - this.y;
    let distance = Math.sqrt(dx * dx + dy * dy);

    if (distance < mouse.radius) {
      this.x -= dx / 10;
      this.y -= dy / 10;
    }
  }

  draw() {
    ctx.fillStyle = this.color;
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
    ctx.fill();
  }
}

// create particles
function init() {
  particles = [];
  for (let i = 0; i < 100; i++) {
    particles.push(new Particle());
  }
}

// connect lines
function connect() {
  for (let a = 0; a < particles.length; a++) {
    for (let b = a; b < particles.length; b++) {
      let dx = particles[a].x - particles[b].x;
      let dy = particles[a].y - particles[b].y;
      let distance = dx * dx + dy * dy;

      if (distance < 12000) {
        ctx.strokeStyle = "rgba(255, 0, 200, 0.2)";
        ctx.lineWidth = 1;
        ctx.beginPath();
        ctx.moveTo(particles[a].x, particles[a].y);
        ctx.lineTo(particles[b].x, particles[b].y);
        ctx.stroke();
      }
    }
  }
}

// animation loop
function animate() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  particles.forEach(p => {
    p.update();
    p.draw();
  });

  connect();
  requestAnimationFrame(animate);
}

init();
animate();

// resize fix
window.addEventListener("resize", () => {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
  init();
});