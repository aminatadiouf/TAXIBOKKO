<?php session_start();?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSCRIPTION ET BIENVENUE</title>

    <!--CSS-->
    <link rel="stylesheet" href="style.css">

    <!--Boxicons CSS-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <!--<form action="" method="post" class="conteneur">-->
          <!-- <form action="" method="post" class="champ"> -->
 
                   
                
 <form action="" method="post" >
           <div  class="Inscription" >
                   <em><h2>INSCRIPTION</h2></em>
                    <h1>CONNEXION</h1><br />
                    <h2>Votre chauffeur en un clic ! </h2><br />
                <div class="media-options">
                    <a href="#" class="field facebook">
                        <i class='bx bxl-facebook facebook-icon'></i>
                        <span>Continuer avec facebook</span>
                    </a>
                </div>
                
          
<h5>---------------------------- Or -----------------------------------</h5>
                
                
            
            <div class="champ">
       
                  <br> <label for> E-mail : </label>
                   <input type = "mail" name="E-mail" required /></br>
            </div>

        <div class=" input">
          <br><label for > MOT DE PASSE : </label>
          <input type ="password" name ="MOT_DE_PASSE">
         <i class='bx bx-hide eye-icon'></i>
        </div>
    
      <h5> <p>J'ai déjà un compte</p> </h5>
       <div >
      <button ><input type= "submit" value = "S'inscrire➡" name="connexion" class="inscrire1" > </button> 
    </div>
    </div>




</form>


        <!--<form action="" method="post" class="champ2" -->
    <form action=""  method="post" >
        <div class="champ2"> 
          <h1> INSCRIPTION </h1>
          <h2>Finalisez votre inscription en reiseignant les informations manquantes</h2>

        <br> <label>PRENOM : </label>
        <input type ="text" name = "prenom" ></br>
        <br> <label>NOM : </label>
         <input type = "text" name = "nom" ></br>
        <br> <label>Numéro de téléphone : </label>
        <input type ="number" name = "numero_de_telephone" ></br >
        <div class=" input">
           <br><label for > MOT DE PASSE : </label>
           <input type ="password" name ="MOT_DE_PASSE">
          <i class='bx bx-hide eye-icon'></i>
       </div>
                <br> <label for> E-mail : </label>
                   <input type = "mail" name="E-mail" ></br>
            
            <br><label> Date : </label>
            <input type ="Date" name="Date"  ></br>

          <h5><p>Ajouter un code promo</p> </h5> 
      <div >
         <button> <input type= "submit" value = "S'inscrire➡ " name="Inscription" class="inscrire2"> </button><br />
      </div>
     

    </div>
</form>


<!--</form>-->
 <?php
 

 include('connexion.php');
if ($_SERVER["REQUEST_METHOD"]==='POST') {
     
if (isset($_POST["Inscription"])) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $tel = $_POST['numero_de_telephone'];
    $mail = $_POST['E-mail'];
    $password = $_POST['MOT_DE_PASSE'];
    $date =$_POST['Date'];

   
   
    $amina = "INSERT INTO users( Nom,Prenom,E_mail,Tel, Mot_de_passe, dateIns)VALUES(:nom, :prenom, :E_mail, :numero_de_telephone, :MOT_DE_PASSE, :Date)";
       $mya = $conn->prepare($amina);
       $mya->bindValue(':nom', $nom);
       $mya->bindValue(':prenom', $prenom);
       $mya->bindValue(':E_mail',$mail);
       $mya->bindValue(':numero_de_telephone', $tel);
       $mya->bindValue(':MOT_DE_PASSE', $password);
       $mya->bindValue(':Date', $date);

      if ( $mya->execute()) {
        echo "vos donnes sont enregistrer avec succes";
      }else {
        echo "oups erreur connexion";
      }
     
   }elseif (isset($_POST['connexion'])) {
    $mail = $_POST['E-mail'];
    $password = $_POST['MOT_DE_PASSE'];
    $bou = "SELECT * FROM users where E_mail=:E_mail";
    $mya = $conn->prepare($bou);
    $mya->bindValue(':E_mail',$mail);
    $mya->execute();
    $user=$mya->fetch();
    if ($user && $password ===$user['Mot_de_passe']) {
        echo "vous vous êtes connecté avec succés";
    }else {
        echo "Veuillez vous s'inscrire";
    }
  }
}
  
                
              
                   
                
                    

                
                





               /*'/^[A-Z][\p{L}-]*$/'
                  $nom = $_POST['nom'];
                  if(!empty ($nom) && preg_match ("/^[A-Za-z '-]+$/", $nom)){
                    echo $nom;
                  }else{
                    echo "veuillez remplir un nom correct";
                  }

                  $prenom = $_POST['prenom'];
                   if(!empty ($prenom) && preg_match("/^[A-Za-z '-]+$/", $prenom)){
                    echo $prenom;
                    }else{
                    echo "veuillez remplir un prenom correct";
                   }
                 
                   $tel = $_POST['numero_de_telephone'];
                  if(!empty($tel) /*&& ( is_numeric($_POST['numero_de_telephone']) ) && preg_match('/^(77|78|75|70|76)+[0-9]/'
                  "/^[7][0678][0-9]{7}$/", $tel)){
                    echo $tel;
                  } else{
                    echo "saissisez un numéro valide au sénégal";
                  }

                  $mail = $_POST['E-mail'];
                  if(!empty($mail) && preg_match('/^[a-zA-Z0-9+.-]+@[a-zA-Z0-9.-]+$/', $email))
                  {
                    echo $mail;
                  } else{
                    echo "saissisez un E_mail correct";
                  }
                  
                  $password = $_POST['MOT_DE_PASSE'];
                      if(!empty($password) && /*preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/"
                    , $password) strlen($password)<=8){
                      echo $password;
                    }else{
                      echo "votre mot de passe est incorrect";
                    }
                    
                    ?>
                   /* <?php
                  $sql = "SELECT * FROM users";
                  $stmt = $mya->prepare($conn,$sql);
                  $stmt = $mya->execute();
                  while($row = db2_fetch_array($stmt)){

                 $row++;
                    print_r($arr);
                  }*/
                    ?>
                    <?php
                    g
                    ?>



                      
                     


</body>
</html>
      
