<?php

session_start();

//include( la base de donnée )<
include("M-V-C/Models.Data/data.choisy.php");



//-----on mettera des if( condition )
//-----si accueil include...

if(!isset($_REQUEST['uc'])) //"!isset" si cest pas vrai...  ( empty() )
{
     $uc = 'accueil';	
}
else
{
	$uc = $_REQUEST['uc'];
}

$pdo=  Pdoassochoisy::getPdoassochoisy();

// controle uc selon l'uc=... ↓
switch($uc)   					
{

    
	case 'accueil':
	{
        $articleRecent = $pdo->getarticleRecent();
        include("M-V-C/Views/vu_header.php") ;
        include("M-V-C/Views/vu_banniere.php") ;
		include("M-V-C/Views/vu_articleVideo.php");
		include("M-V-C/Views/vu_lesActivites.php");
        include("M-V-C/Views/vu_footer.php") ;
		break;
	}

    case 'pages':
    {
        include("M-V-C/Views/vu_header.php") ;
        include("M-V-C/Controller/c_pages.php");
        include("M-V-C/Views/vu_footer.php") ;
        break;
    }

    case 'administrer': //on changeras le ?uc=... pour cacher la page connexion 
    {
        include("M-V-C/Controller/c_administrer.php");  
        break;
    }


}




 
?>