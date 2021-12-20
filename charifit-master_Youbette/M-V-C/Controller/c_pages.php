<?php     //CONTROLLEUR DE PAGES! . ACTION= DE LA PAGE 
//----------- !! CODE A CHANGER !! --------------

$action = $_REQUEST['action'];

switch ($action)
{
    case 'astronomie':
        {
            include("M-V-C/Views/vu_activiteAstronomie.php");
            break;
        }
    case 'animation':
        {
            include("M-V-C/Views/vu_activiteAnimations.php");
            break;
        }
    case 'jardin':
        {
            include("M-V-C/Views/vu_activiteJardin.php");
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