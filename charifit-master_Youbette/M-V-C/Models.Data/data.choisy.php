<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application assochoisy (adaptation du cas lafleur)
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de articles PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 *
 * @package default
 * @author Youba, wayra, ahmid, remy, benedicte
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class Pdoassochoisy
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=assochoisy';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoassochoisy = null;

/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
        private function __construct()
        {
            Pdoassochoisy::$monPdo = new PDO(Pdoassochoisy::$serveur.';'.Pdoassochoisy::$bdd, Pdoassochoisy::$user, Pdoassochoisy::$mdp); 
            Pdoassochoisy::$monPdo->query("SET CHARACTER SET utf8");
        }
        public function _destruct(){
            Pdoassochoisy::$monPdo = null;
        }
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instancePdoHtAuto = PdoHtAuto::getPdoHtAuto();
 * @return l'unique objet de la classe PdoHtAuto
 */

        public  static function getPdoassochoisy()
        {
            if(Pdoassochoisy::$monPdoassochoisy == null)
            {
                Pdoassochoisy::$monPdoassochoisy=new Pdoassochoisy();
            }
            return Pdoassochoisy::$monPdoassochoisy;  

        }


/** GESTIONNAIRE
 * Retourne l'utilisateur connecté sous forme d'un tableau associatif
 *
 * @return l'utisateur 
*/        
public function getUser($login,$mdp)
{
    $mdp = hash('sha256',$mdp);       /* ----php hash le mdp entrer POUR MATCHER LE HASHAGE DU SERVEUR ET LE mdp entrer -------*/
    
    $req = "select * from gestionnaire where login = :login and mdp = :mdp";
    $res =  self::$monPdo->prepare($req);
    $res->bindvalue(':login',$login);
    $res->bindvalue(':mdp',$mdp);
    $res->execute();
    $ligne = $res->fetch(); //fetch = rechercher (fetch : quand on recupere une seul ligne)
   
    return $ligne;

}

//----------------- ! faut savoir si on garde "ARTICLE" ou pas ! ---------------

/**
 * Retourne toutes les types sous forme d'un tableau associatif
 *
 * @return le tableau associatif des types 
*/
        public function getLesarticles()
	{
		$req = "select * from articles"; //faire la requete SQL
        $res=  self::$monPdo->query($req);
		$lesLignes = $res->fetchAll(); //(fetch : quand on recupere plusieur lignes et all pour tout recup)
           
		return $lesLignes;
                
	}



	public function getlesarticlesParAct($idactivite)
	{
        $req="select texte,id from articles where idactivites= :idactivite order by datejour desc"; //du plus recent au plus ancien
        $res =  self::$monPdo->prepare($req);
        $res->bindvalue(':idactivite',$idactivite);
        $res->execute();
		
   //condition si plus de 1 article PDO::FETCH_ASSOC sinon BOTH
        $laLigne = $res->fetchAll();
 

		return $laLigne; 

	}

    public function getArticle($id) //on recup l'id dun article
	{
        $req="select texte from articles where id= :id "; 
        
        $res =  self::$monPdo->prepare($req);
        $res->bindvalue(':id',$id);
        $res->execute();

        $laLigne = $res->fetch();
 

		return $laLigne; 

	}

    // A    rticle le plus recent 
    public function getarticleRecent()
    {
        $req="Select texte FROM articles WHERE datejour=(SELECT max(datejour) FROM articles) "; 
        //faire la requete SQL
        $res =  self::$monPdo->query($req);
		$laLigne = $res->fetch(PDO::FETCH_ASSOC); // on comprend pas mais merci wayra et L'INTERNET( on modifie le mode par défaut en /1 ...)

		return $laLigne; 

    }

    public function getTitreActivites($id)
    {

    $req="select libeler,id from activites where id= :id"; 
    $res =  self::$monPdo->prepare($req);
    $res->bindvalue(':id',$id);
    $res->execute();
    $laLigne = $res->fetchAll();

    return $laLigne; 

    }
                    //////on utilise pas get image pour le moment//////
                    public function getimage($id)
                    {

                    $req="select nomimage from images,imgassocieractivites,activites where images.id = imgassocieractivites.idimage and activites.id = imgassocieractivites.idactivites and idactivites= :id";  // recup les image en fonction de lactivité

                    $res =  self::$monPdo->prepare($req);
                    $res->bindvalue(':id',$id);
                    $res->execute();
                    $laLigne = $res->fetchAll();

                    }

                    
  
 //------------A voir admin-FONCTIONS:  Modifier , Ajouter , Supprimer--------------//

 public function modifierArticle($id ,$texte)
 {

    $req="update articles set texte = '$texte' where id='$id' ";   
    var_dump($req);
    $res=  Pdoassochoisy::$monPdo->exec($req);
    return $res;

  }

}