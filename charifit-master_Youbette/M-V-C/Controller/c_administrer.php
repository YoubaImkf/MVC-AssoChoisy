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
            $message = ' <p class="yo"> Erreur de login et/ou de mot de passe T-T </p> ';
            include("M-V-C/Views/vu_message.php");
        }
        else{
            $_SESSION['admin'] = $login;
            $message = ' <p class="yo"> Connecter!! TU PEUX FAIRE CQUE TU VEUX </p> ';
            include("M-V-C/Views/vu_message.php");   
            
        }
        break;


//partie admin modif vu_astro 
        case 'astronomie':
            {
                $desArticles = $pdo->getlesarticlesParAct(2);
                include("M-V-C/Views/vu_header.php") ;
                include("M-V-C/Views/vu_banniere.php") ;
                include("M-V-C/Views/vu_articleMODIF.php");
                include("M-V-C/Views/vu_footer.php") ;
                break;
            }
        
            

            
        case 'modifier'://le case cest la valeur attribuer a Action=..
            if(isset($_SESSION['admin'])){
                $id = $_REQUEST['id'];
                var_dump($id);
                $article = $pdo->getArticle($id);

                $texte = $article['texte'];
                
                include("M-V-C/Views/vu_modifier.php");
            }
            else{

                include("M-V-C/Views/vu_connexion.php");   
            }
            break;


            case 'enregModification' ://le case cest la valeur attribuer a Action=..
                if(isset($_SESSION['admin'])){
                    $texte = $_REQUEST['texte'];
                    $id= $_REQUEST['id'];   
                  
                    $res = $pdo->modifierArticle($id,$texte); 
                    
                    if($res != 0)
                        $message = "Article mis à jour";
                    else
                        $message = "Veuillez réessayer plus tard";
                    include("M-V-C/Views/vu_message.php");                  
                }
                else{
                    include("M-V-C/Views/vu_connexion.php");   
                }
                break;

                    
                
}