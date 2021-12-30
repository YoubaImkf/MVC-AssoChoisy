<?php

if(isset($_POST['valider'])) {
           
    if( (empty($_POST['name'])) || (empty($_POST['prenom'])) || (empty($_POST['number'])) || (empty($_POST['email'])) ||  (empty($_POST['subject'])) || (empty($_POST['message'])) ) {
        
        
      echo '<div class="msg-red">Merci de remplir tous les champs</div>';
        
       
        //include("M-V-C/Views/vu_messageFormulaire.php") ;
        
         
    } else {
       
            $nom        = $_POST['name'];
            $prenom     = $_POST['prenom'];
            $tele       = $_POST['number'];
            $email      = $_POST['email'];
            $objet      = $_POST['subject'];
            $message    = $_POST['message'];
            
            $destinaire = 'contact@ahmid-aitouali.fr';
            $sujet      = 'Message en provenance de votre site';
            $contenu    = "Vous avez reçu un nouveau message depuis votre site internet. \n";
            $contenu   .= "Nom: $nom \n";
            $contenu   .= "Email: $email \n";
            $contenu   .= "Message: $message \n";
            
            /*$contenu    = "<html><body><p>Vous avez reçu un nouveau message depuis votre site internet.</p><p>Nom: $nom</p></p><p>Prénom: $prenom</p></p><p>Télé: $tele</p><p>Email: $email</p></p><p>Objet: $objet</p><p>Message: $message</p></body></html>";*/
        
            /*$header = 'From: '.$email. "\r\n" .
                       'Reply-To: '.$email. "\r\n" .
                       'X-Mailer:PHP/' .phpVersion();*/
            $header = "MIME-Version: 1.0 \r\n";	
            $header.= 'From:' .$destinaire.' '."\n";	
            $header.= 'Content-Type:text/html; charset="utf-8"'."\n";
            $header.= 'Content-transfert-Encoding: 8bit';   
            
            mail($destinaire, $sujet, $contenu, $header);
            
            
         
          echo '<div class="msg-green">Votre message a bien été envoyé</div>';
          
           
        
        }               
 }     



?>