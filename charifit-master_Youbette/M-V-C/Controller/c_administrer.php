<?php //-----------CODE A VENIR POUR CONTROLEUR ADMIN -------------

$action = $_REQUEST['action'];


switch ($action)
{
    case 'connexion' ://le case cest la valeur attribuer a Action=..
        include("M-V-C/Views/vu_connexion.php");
        break;

    case 'controler'://le case cest la valeur attribuer a Action=..
        $login = $_REQUEST['login'];
        $mdp = $_REQUEST['mdp'];
        $user = $pdo->getUser($login,$mdp);
        if($user == 0){
            include("M-V-C/Views/vu_connexion.php");
            $message = ' <p class="yo"> Erreur de login et/ou de mot de passe </p> ';
            include("M-V-C/Views/vu_message.php");
        }
        // else{
        //     $_SESSION['admin'] = $login;
        //     $lesVoitures=$pdo->getLesVoitures();
        //     include ('M-V-C/Views/v_listeVoituresAdmin.php');    
        // }
        break;

        











    case 'liste'://le case cest la valeur attribuer a Action=..
        if(isset($_SESSION['admin'])){
            $lesVoitures=$pdo->getLesVoitures();
            include ('vues/v_listeVoituresAdmin.php');    

        }
        else{
            include("vues/v_connexion.php");   
    }
    break;


    case 'modifier'://le case cest la valeur attribuer a Action=..
        if(isset($_SESSION['admin'])){
            $numImma = $_REQUEST['numImma'];
            $voiture = $pdo->getLaVoiture($numImma);
            $couleur = $voiture['couleur'];
            $marque = $voiture['marque'];
            $type = $voiture['type'];
            $prix = $voiture['prix'];
            $annee = $voiture['annee'];
            $image = $voiture['image'];

            
        
            include("vues/v_modification.php");
        }
        else{
            include("vues/v_connexion.php");   
        }
        break;

    case 'enregModification' ://le case cest la valeur attribuer a Action=..
        if(isset($_SESSION['admin'])){
           $prix = $_REQUEST['prix'];
           $image = $_REQUEST['image'];
           $couleur = $_REQUEST['couleur'];
           $numImma = $_REQUEST['numImma'];
           $res = $pdo->modifierVoiture($numImma, $couleur, $image, $prix); 
           if($res != 0)
                $message = "Mise à jour effectuée";
           else
                $message = "Veuillez réessayer plus tard";
           include("vues/v_message.php");
           echo "<br><a href='index.php?uc=administrer&action=liste'>Retour à la liste des voitures</a>";
        }
        else{
            include("vues/v_connexion.php");   
        }
        break;

    case 'supprimer' ://le case cest la valeur attribuer a Action=..
        if(isset($_SESSION['admin'])){
            $numImma = $_REQUEST['numImma'];
            $res = $pdo->supprimerVoiture($numImma);
            if($res != 0)
                $message = "Suppression effectuée";
            else
                $message = "Veuillez réessayer plus tard";
            include("vues/v_message.php");
            echo "<br><a href='index.php?uc=administrer&action=liste'>Retour à la liste des voitures</a>";
        }
        else{
            include("vues/v_connexion.php");   
        }
        break;


        //---------------------------!!!!!!!AJOUTER!!!!!!!!------------------------------

    case 'ajouter' ://le case cest la valeur attribuer a Action=..
        if(isset($_SESSION['admin'])){
            $LesMarques = $pdo->getLesMarques();
            $LesTypes = $pdo->getLesTypes(); 
            include("vues/v_ajout.php"); 
         }
        else{
            include("vues/v_connexion.php");   
        }  
        
        break;
    case 'enregAjout' ://le case cest la valeur attribuer a Action=..
        if(isset($_SESSION['admin'])){
            $prix = $_REQUEST['prix'];
            $image = $_REQUEST['photo'];
            $couleur = $_REQUEST['couleur'];
            $annee = $_REQUEST['annee'];
            $numImma = $_REQUEST['numImma'];
            $marque = $_REQUEST['marque'];
            $type = $_REQUEST['type'];

            if( strlen($numImma) != 7 )
                {
                    $msgErreurs[0] = " Format non valide numero immatriculation";  
                    include ("vues/v_erreurs.php");
                }
            else{
                
            // }
            // if(checkdate($annee) == 0)
            //     {
            //         $msgErreurs[1] = " Format non valide Date ";  
            //     }
            
            $res = $pdo->ajouterVoiture($numImma,$marque,$type,$annee,$prix,$couleur,$image);
            if($res != 0)
                $message = "Voiture ajoutée";
            else
                $message = "Veuillez réessayer plus tard";
        
            include("vues/v_message.php");
            }
            echo "<br><a href='index.php?uc=administrer&action=liste'>Retour à la liste des voitures</a><br>";
        }
        else
            include("vues/v_connexion.php");   
             
        break;


        //-------------AJOUT TYPE----------------
        case 'ajouterType' ://le case cest la valeur attribuer a Action=..
            if(isset($_SESSION['admin'])){                            
                include("vues/v_ajouterType.php"); 
            }
            else{
                include("vues/v_connexion.php");   
            }  
            
            break;

            case 'enregAjouTYPE' ://le case cest la valeur attribuer a Action=..
                if(isset($_SESSION['admin'])){

                    $type = $_REQUEST['type']; //name de ajouter type du formulaire
                    $res = $pdo->ajouterType($type);
                    if($res != 0)
                        $message = "Nouveau type ajoutée";

                    else
                        $message = "Veuillez réessayer plus tard";
                
                    include("vues/v_message.php");
                    }
            break;



              //-------------AJOUT MARQUE ----------------

            case 'ajouterMarque' ://le case cest la valeur attribuer a Action=..
                if(isset($_SESSION['admin'])){
    
                    include("vues/v_ajouterMarque.php"); 
                }
                else{
                    include("vues/v_connexion.php");   
                }  
                
                break;

    
                case 'enregAjouMarque' ://le case cest la valeur attribuer a Action=..
                    if(isset($_SESSION['admin'])){
    
                        $marque= $_REQUEST['marque'];
                        $res = $pdo->ajouterMarque($marque);
                        if($res != 0)
                            $message = "Nouvelle marque ajoutée";
    
                        else
                            $message = "Veuillez réessayer plus tard";
                    
                        include("vues/v_message.php");
                        }
                break;

                case 'findCar' :

                 

                        
                
}