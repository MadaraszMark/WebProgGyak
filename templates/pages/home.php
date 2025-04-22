<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Autókereskedés & Flottakezelő</title>
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <!-- Hero szekció -->
  <section class="hero">
    <div class="hero-content" data-aos="fade-up">
      <h1><span>Autót keresel?</span><br>Bérelj tőlünk most!</h1>
      <p>Modern, megbízható flottakezelési szolgáltatás cégeknek és magánszemélyeknek egyaránt.</p>
      <div class="cta-buttons">
        <a href="#cars" class="btn">Autóink</a>
        <a href="#contact" class="btn secondary">Kapcsolat</a>
      </div>
    </div>
    <div class="hero-image" data-aos="fade-left">
      <img src="assets/images/hero-car.png" alt="Hero Autó">
    </div>
  </section>

  <!-- Autók szekció -->
  <section id="cars" class="section" data-aos="fade-up">
    <h2>Autóink</h2>
    <div class="card-grid">
      <div class="card">
        <img src="assets/images/car1.jpg" alt="BMW">
        <h3>BMW 320d</h3>
        <p>2021 • Dízel • Automata</p>
      </div>
      <div class="card">
        <img src="assets/images/car2.jpg" alt="Audi">
        <h3>Audi A6</h3>
        <p>2020 • Benzin • Manuális</p>
      </div>
      <div class="card">
        <img src="assets/images/car3.jpg" alt="Tesla">
        <h3>Tesla Model 3</h3>
        <p>2022 • Elektromos • Autopilot</p>
      </div>
    </div>
  </section>

  <!-- Videó szekció -->
  <section class="section" data-aos="zoom-in">
    <h2>Flotta animáció</h2>
    <video controls width="100%">
      <source src="assets/videos/intro.mp4" type="video/mp4">
      A böngésződ nem támogatja a videó lejátszást.
    </video>
  </section>

  <!-- Térkép szekció -->
  <section class="section" data-aos="fade-up">
    <h2>Hol találsz minket?</h2>
    <iframe src="https://www.google.com/maps/embed?..." width="100%" height="450" style="border:0; border-radius: 16px;" allowfullscreen="" loading="lazy"></iframe>
  </section>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 1000 });
  </script>
</body>
</html>