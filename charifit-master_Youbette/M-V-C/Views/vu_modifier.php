 <!-- Code a venir -->
 <div align ='center'><h1>Modification</b></div>

 <link rel="stylesheet" href="css/style.css">
 <link rel="stylesheet" href="css/connexion.css"> 

 <div id="container">
<form action="index.php?uc=administrer&action=enregModification" method='post'>

    <br><h4>MODIFIER <br></h4>

    <h4>Article: <br> 
    <br><h4>id=<?= $id?><br></h4>
     <textarea type = 'text' name = 'texte' cols="50" rows="20"
     value='<?= $texte ?>'><?= $texte ?> </textarea> <br></h4>

   
    <input type='hidden' name = 'id' size = 7 value='<?= $id ?>'>

    <button type = 'submit' name='modifier'>modifier</button> <br>
    <button type = 'reset' value = 'Annuler'>Annuler</button> 

</form>
</div>