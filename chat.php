<?php
	$maxLenght = 200;
	$DEBUG = isset($_GET['debug']);
    
    if($DEBUG)
    {
        $_POST['color'] = "#000000";
    	$_POST['nom'] = "test";                  
    	$_POST['message'] = "haaa";
    } 

    if(isset($_GET['raz'])){
    	$file = fopen('ac.htm',"w");
    	ftruncate($file,0);
    	exit();
    }

    if(!isset($_POST['nom']) || !isset($_POST['message']) || !isset($_POST['color'])) 
    	exit();
   
    if(empty($_POST['nom']) || empty($_POST['message'] || empty($_POST['color'])))
    	exit();
    

    $nom = htmlspecialchars($_POST['nom']);                    //On récupère le pseudo et on le stocke dans une variable
    $message = htmlspecialchars($_POST['message']);            //On fait de même avec le message 
    $color = htmlspecialchars($_POST['color']);

    $id = file('cpt.txt')[0] + 1;
    file_put_contents('cpt.txt', $id);
    $ligne = '<div><font color="'.$color.'" > '.$nom.' > </font>  <span id="'.$id.'">'.$message.'</span></div>';     //Le message est créé 

    if($DEBUG)
    	echo 'Ligne : '.$ligne.'<hr>';

    $leFichier = file('ac.htm');             //On lit le fichier ac.htm et on stocke la réponse dans une variable (de type tableau)

    if(count($leFichier) > $maxLenght) {
    	array_shift($leFichier);
    }

    array_push($leFichier, $ligne."\n");       //On ajoute le texte calculé dans la ligne précédente au début du tableau

    if($DEBUG)
   		print_r($leFichier);

    file_put_contents('ac.htm', $leFichier); //On écrit le contenu du tableau $leFichier dans le fichier ac.htm
?>