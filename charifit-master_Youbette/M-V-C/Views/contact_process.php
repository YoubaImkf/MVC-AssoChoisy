<?php

if(isset($_POST['valider'])) {

    // Si g-token est vide
    if(empty($_POST['g-token'])) { 
        header('Location: vu_contact.php');
    } 
    // Si g-token n'est pas vide
    else {
        // Conversion avec API
        $secret   = '6Lc9TKQdAAAAAN4VespFo5Pc8m4Tcn2g0gxGWX-u';
        $response = $_POST['g-token'];
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $url      = 'https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$response.'&remoteip='.$remoteip;

        $req     = file_get_contents($url);
        $reponse = json_decode($req);

        // Si la réponse est un succès
        if($reponse->success) { 

            $nom     	= strip_tags($_POST['name']);
            $prenom   	= strip_tags($_POST['prenom']);
            $telephone  = strip_tags($_POST['number']);
            $email   	= strip_tags($_POST['email']);
            $objet  	= strip_tags($_POST['subject']);
            $message 	= strip_tags($_POST['message']);
        
            if( empty($nom) && empty($prenom) && empty($number)empty($objet) && empty($email) && empty($message)) {
                $msg = 'Merci de remplir tous les champs';
            } else {
                
                $msg = 'Formulaire soumis avec succès';
            }

        }
        // Si la réponse est un échec
        else {
            header('Location: vu_contact.php');
        }


    }



}


    $to = "spn8@spondonit.com";
    $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $subject = $_REQUEST['subject'];
    $number = $_REQUEST['number'];
    $cmessage = $_REQUEST['message'];

    $headers = "From: $from";
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $subject = "You have a message from your Bitmap Photography.";

    $logo = 'img/logo.png';
    $link = '#';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
	$body .= "<table style='width: 100%;'>";
	$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
	$body .= "</td></tr></thead><tbody><tr>";
	$body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
	$body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
	$body .= "</tr>";
	$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$csubject}</td></tr>";
	$body .= "<tr><td></td></tr>";
	$body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";

    $send = mail($to, $subject, $body, $headers);

?>