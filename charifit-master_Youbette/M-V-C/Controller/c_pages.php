<?php     //CONTROLLEUR DE PAGES! . ACTION= DE LA PAGE 
//----------- !! CODE A CHANGER !! --------------

$action = $_REQUEST['action'];

switch ($action)
{
    

        case 'jardin':
            {
                $titreActivite = $pdo->getTitreActivites(1);
                $desArticles  = $pdo->getlesarticlesParAct(1);
                include("M-V-C/Views/vu_activites.php");
                break;
            }
        case 'astronomie':
            {
                $titreActivite =  $pdo->getTitreActivites(2);
                $desArticles  = $pdo->getlesarticlesParAct(2);
                include("M-V-C/Views/vu_activites.php");
                break;
            }
        case 'animations':
            {
                $titreActivite =  $pdo->getTitreActivites(3);
                $desArticles = $pdo->getlesarticlesParAct(3);
                include("M-V-C/Views/vu_activites.php");
                break;
            }

            //------------- EXEMPLE : --------------
                    //--Dans route--
                // Route::get('quelquechose/{id}',[  
                //         'as'=>'chemin_quelquechose',
                //         'uses'=>'quelquechoseController@quelquechosetruc'
                // ]);

                     //--Dans controller--
                // function quelquechosetruc(Request $request,$id){ ...

                    //--Dans vue--
                    // ##Calling Route:##
                // {{ route('admin.editIndustry',[$id]) }}




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