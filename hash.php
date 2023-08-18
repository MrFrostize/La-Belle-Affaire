<?php
echo password_hash("admin", PASSWORD_DEFAULT);

$result = password_verify("admin", '$2y$10$juhIQEphZOrsNA.c0xA6w.hmJMY3w28XDDcq..Eud2F.TAGnkq9Na');
echo PHP_EOL;
if($result) {
  echo "Pwd ok";
}else {
  echo "Pb de mot de passe";
}