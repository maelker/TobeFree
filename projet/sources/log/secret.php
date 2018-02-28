<?php
   session_start();
   header ('Location:C:/Bureau/TLI_projet/sources/critere/critere.html');
?>
<?php
    if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "kangourou") // Si le mot de passe est bon
    {
    // On affiche les codes
  
        ob_start();
        header ('Location:C:/Bureau/TLI_projet/sources/critere/critere.html');
        echo "envois des informations";
        ob_end_flush();
    }
    else // Sinon, on affiche un message d'erreur
    {
        echo '<p> Mot de passe incorrect</p>';
    }
    ?>
    
