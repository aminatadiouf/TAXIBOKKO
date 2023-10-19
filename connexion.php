<?php
/*$username ='localhost';
$username ='root' ;
$password = 'root';*/

try{
$conn = new PDO(
    'mysql:host=localhost;dbname=utilisateurs;charset=utf8',
    'root',
    ''
);

$conn->setAttribute (PDO::ATTR_ERRMODE,
PDO::ERRMODE_EXCEPTION);
/*echo "Connexion réussie" ;*/
}

catch( \Throwable $th) {
    echo "ERREUR :" . $th->getMessage();
}
?>