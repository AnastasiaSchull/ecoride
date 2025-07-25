<header class="main-header">
  <nav class="navbar">
    <a class="logo" href="/index.php">EcoRide</a>
    <a class="nav-links desktop-only" href="/index.php">Accueil</a>
    <a class="nav-links desktop-only" href="/pages/covoiturages.php">Covoiturages</a>
    <a class="nav-links desktop-only" href="/pages/contact.php">Contact</a>
    <?php if (!isset($_SESSION['user'])): ?>
      <a class="nav-links desktop-only" href="/pages/connexion.php">Connexion</a>
    <?php else: ?>
      <?php
      $photo = $_SESSION['user']['photo'] ?? 'default.png';
      $avatarPath = "/assets/uploads/" . htmlspecialchars($photo);
      ?>
      <?php if (in_array('admin', $_SESSION['user']['roles'])): ?>
        <a class="nav-links with-avatar" href="/pages/admin.php"> <img src="<?= $avatarPath ?>" alt="avatar"
            class="avatar avatar-text"><span class="avatar-text">Admin</span></a>
      <?php endif; ?>
      <?php if (in_array('employe', $_SESSION['user']['roles'])): ?>
        <a class="nav-links with-avatar" href="/pages/employe.php"> <img src="<?= $avatarPath ?>" alt="avatar"
            class="avatar avatar-text"><span class="avatar-text">Espace Employé</span></a>
      <?php endif; ?>

      <?php if (!in_array('admin', $_SESSION['user']['roles']) && !in_array('employe', $_SESSION['user']['roles'])): ?>
        <a class="nav-links with-avatar" href="/pages/mon_espace.php">
          <img src="<?= $avatarPath ?>" alt="avatar" class="avatar avatar-text"><span class="avatar-text">Mon Espace</span>
        </a>
      <?php endif; ?>
      <a class="nav-links with-avatar desktop-only" href="/pages/logout.php">Déconnexion</a>
    <?php endif; ?>

     <!-- Icônes mobiles (n'affectent pas l'ordre) -->
    <div class="mobile-icons mobile-only">
      <a href="/pages/covoiturages.php" class="icon-link">
        <i class="bi bi-truck-front"></i>
      </a>
      <?php if (!isset($_SESSION['user'])): ?>
        <a href="/pages/connexion.php" class="icon-link">
          <i class="bi bi-person"></i>
        </a>
      <!--Si connecté —> avatar-->
  <?php else: ?>
    <?php
      $photo = $_SESSION['user']['photo'] ?? 'default.png';
      $avatarPath = "/assets/uploads/" . htmlspecialchars($photo). '?v=' . time();

      if (in_array('admin', $_SESSION['user']['roles'])) {
        $userLink = '/pages/admin.php';
      } elseif (in_array('employe', $_SESSION['user']['roles'])) {
        $userLink = '/pages/employe.php';
      } else {
        $userLink = '/pages/mon_espace.php';
      }
    ?>
    <a href="<?= $userLink ?>" class="icon-link">
      <img src="<?= $avatarPath ?>" alt="avatar" class="avatar" />
    </a>
  <?php endif; ?>
    <!--  Icône burger -->
    <div id="burger" class="burger mobile-only">
      <i class="bi bi-list"></i>
    </div>
  </nav>
  <!-- Menu burger -->
<div id="burger-menu" class="burger-menu">
  <a href="/index.php">Accueil</a>
  <a href="/pages/contact.php">Contact</a>

  <?php if (isset($_SESSION['user'])): ?>
    <a href="/pages/logout.php">Déconnexion</a>
  <?php endif; ?>
</div>
</header>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const burger = document.getElementById('burger');
    const menu = document.getElementById('burger-menu');

    burger.addEventListener('click', () => {
      menu.classList.toggle('active');
    });
  });
</script>
