<?php
require_once(dirname(__FILE__) . '/../core/security.php');
?>
<h2>Admin</h2>
<?php if (isset($_POST["user"]) && isset($_POST["password"])) : ?>
  Gestion du mot de passe ici
  <?php
  connect();
  ?>
<?php elseif (isset($_SESSION['user']) && $_SESSION['user']) : ?>
  <h3>Utilisateur connecté</h3>
<?php else : ?>
  <form action="index.php?page=admin" method="post">
    <div class="d-flex">
      <label for="user">Login</label>
      <input type="text" id="user" name="user">
    </div>
    <div class="d-flex">
      <label for="password">Mot de passe</label>
      <input type="password" name="password" id="password">
      <input type="hidden" name="connexion" value="connect">
    </div>
    <input type="submit" value="Envoyer">
  </form>
<?php endif ?>