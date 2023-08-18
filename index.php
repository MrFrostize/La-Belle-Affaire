<?php
?>
<!DOCTYPE html>
<html lang="fr">
<?php
require_once(dirname(__FILE__) . '/templates/head.php');
?>

<body>
  <?php
  require_once(dirname(__FILE__) . '/templates/header.php');
  ?>
  <main class="container">
    <!-- Récupération du router qui s'occupe de charger la bonne page -->
    <?php require_once(dirname(__FILE__) . '/core/router.php') ?>
  </main>
  <?php
  require_once(dirname(__FILE__) . '/templates/footer.php');
  ?>

</body>

</html>