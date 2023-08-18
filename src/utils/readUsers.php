<?php
/**
 * Lit les utilisateur du fichier csv
 *
 * @return array
 */
function read_users()
{
  $users = [];
  $file_path = dirname(__FILE__) . '/../../src/datas/users.csv';
  if (file_exists($file_path)){

    $file_pointer = fopen($file_path, 'r');
    while ($data = fgetcsv($file_pointer, null, ";")) {
      $users[] = [
        "Prenom" => $data[0],
        "nom" => $data[1],
        "Email" => $data[2]
      ];
    }
  }
  return $users;
}
