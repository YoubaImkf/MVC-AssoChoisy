<?php     //CONTROLLEUR DE PAGES! . ACTION= DE LA PAGE 
//----------- !! CODE A CHANGER !! --------------

$action = $_REQUEST['action'];

switch ($action)
{
    
    case 'jardin':
        {
            $unarticle = $pdo->getunarticle(1);
            include("M-V-C/Views/vu_activiteJardin.php");
            break;
        }
    case 'astronomie':
        {
            $unarticle = $pdo->getunarticle(2);
            include("M-V-C/Views/vu_activiteAstronomie.php");
            break;
        }
    case 'animations':
        {
            $unarticle = $pdo->getunarticle(3);
            include("M-V-C/Views/vu_activiteAnimations.php");
            break;
        }
  
        
//----------------------------------------------------------------------


    case 'adhesion':
        {
            include("M-V-C/Views/vu_adhesion.php");
            break;
        }

    case 'apropos':
        {
            include("M-V-C/Views/vu_apropos.php");
            break;
        }
        
    case 'contact':
        {
            include("M-V-C/Views/vu_contact.php");
            break;
        }
    case 'interAsso':
        {
            include("M-V-C/Views/vu_interAsso.php");
            break;
        }                 
    case 'reservation':
        {
            include("M-V-C/Views/vu_reservation.php");
            break;
        } 
                        
                
}