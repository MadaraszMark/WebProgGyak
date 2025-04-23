<section class="section" id="gallery">
  <div class="container" data-aos="fade-up">
    <h2>Galéria</h2>
    <p>Nézz körül képgalériánkban, ahol a flottánk legszebb pillanatait láthatod!</p>

    <div class="gallery-grid" data-aos="zoom-in" data-aos-delay="100">
      <?php
      require_once 'db.php';
      $stmt = $pdo->query("SELECT * FROM gallery ORDER BY uploaded_at DESC");
      $images = $stmt->fetchAll();

      if (count($images) > 0):
        foreach ($images as $img): ?>
          <div class="gallery-item">
            <img src="uploads/<?= htmlspecialchars($img['filename']) ?>" alt="Galéria kép">
          </div>
        <?php endforeach;
      else:
        echo "<p>Még nincs feltöltött kép.</p>";
      endif;
      ?>
    </div>

    <?php if (isset($_SESSION['user'])): ?>
      <div class="upload-form" data-aos="fade-up" data-aos-delay="200">
        <h3>Kép feltöltése</h3>
        <form action="upload.php" method="post" enctype="multipart/form-data">
          <input type="file" name="image" accept="image/*" required>
          <button type="submit" class="btn">Feltöltés</button>
        </form>
      </div>
    <?php endif; ?>
  </div>
</section>


