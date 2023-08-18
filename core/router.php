<?php
$page = 'accueil.php';
if (isset($_GET["page"])) {
  switch ($_GET["page"]) {
    case 'lesmembres':
      $page = 'Les_membres.php';
      break;
    case 'quisommesnous':
      $page = 'qui_sommes_nous.php';
      break;
    case 'admin':
      $page = 'admin.php';
      break;
    default:
      $page = 'accueil.php';
      break;
  }
}
require_once(dirname(__FILE__) . '/../pages/' . $page);
