<h2>Les membres</h2>
<?php

require_once(dirname(__FILE__) . "/../src/utils/readUsers.php");

$users = read_users();

if (isset($_GET["sort"])) {
  if (isset($_GET["order"])) {
    sortUsers($users, $_GET["sort"], $_GET["order"]); 
  }
}

dumpTableUsers($users);
function dumpTableUsers($users)
{
  // Récupération des l'ordre en fonction de ce qui a déjà été cliqué
  $sorts = getSortOrder();
  echo '<table class="table">';
  echo "\n" . ' <tr>';
  echo "\n" . '   <th><a href="/index.php?page=lesmembres&sort=Prenom&order=' . $sorts["Prenom"] . '">Prenom</a></th>';
  echo "\n" . '   <th><a href="/index.php?page=lesmembres&sort=nom&order=' . $sorts["nom"] . '">Nom</a></th>';
  echo "\n" . '   <th><a href="/index.php?page=lesmembres&sort=Email&order=' . $sorts["Email"] . '">Email</a></th>';
  echo "\n" . ' </tr>';

  foreach ($users as $key => $users) {
    echo "\n" . ' <tr>';
    foreach ($users as $value) {
      echo "\n" . '   <td>' . $value . '</td>';
    }
    echo "\n" . ' </tr>';
  }
  echo '</table>';
}
/**
 * Trie les nom prénom et mail
 *
 * @param array $users le tableau des utilisateur à trier
 * @param string $sort : l'info à partir de laquelle on trie (name ou type)
 * @param string $order asc pour ordre alphabétique sinon desc
 * @return array
 */
function sortUsers(&$users, $sort, $order)
{
  $cmp = function ($a, $b) use ($sort, $order) {
    $aVal = isset($a[$sort]) ? $a[$sort] : '';
    $bVal = isset($b[$sort]) ? $b[$sort] : '';
    if ($order === 'asc') return strcmp($aVal, $bVal);
    else return strcmp($bVal, $aVal);
  };
  usort($users, $cmp);
}

/**
 * Récupère l'ordre en fonction de ce qui a déjà été cliqué via $_GET
 * @return (Array) Le tableau avec l'ordre à venir
 */
function getSortOrder()
{
  $sorts = [
    "nom" => "asc",
    "Prenom" => "asc",
    "Email" => "asc"
  ];

  // on teste si on peut récupérer les clés sort et order depuis la querystring
  if (isset($_GET["sort"])) {
    if (isset($_GET["order"])) {
      $sorts[$_GET["sort"]] = $_GET["order"] === "asc" ? "desc" : "asc";
    }
  }
  return $sorts;
}
?>