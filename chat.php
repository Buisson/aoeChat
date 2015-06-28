<?php
	$maxLenght = 200;
	$DEBUG = isset($_GET['debug']);
    
    if($DEBUG)
    {
    	$_POST['nom'] = "test";                  
    	$_POST['message'] = "haaa";
    } 

    if(isset($_GET['raz'])){
    	$file = fopen('ac.htm',"w");
    	ftruncate($file,0);
    	exit();
    }

    if(!isset($_POST['nom']) || !isset($_POST['message'])) 
    	exit();
   
    if(empty($_POST['nom']) || empty($_POST['message']))
    	exit();
    

    $nom = htmlspecialchars($_POST['nom']);                    //On r�cup�re le pseudo et on le stocke dans une variable
    $message = htmlspecialchars($_POST['message']);            //On fait de m�me avec le message  
    $id = file('cpt.txt')[0] + 1;
    file_put_contents('cpt.txt', $id);
    $ligne = '<div>'.$nom.' > <span id="'.$id.'">'.$message.'</span></div>';     //Le message est cr�� 

    if($DEBUG)
    	echo 'Ligne : '.$ligne.'<hr>';

    $leFichier = file('ac.htm');             //On lit le fichier ac.htm et on stocke la r�ponse dans une variable (de type tableau)

    if(count($leFichier) > $maxLenght) {
    	array_shift($leFichier);
    }

    array_push($leFichier, $ligne."\n");       //On ajoute le texte calcul� dans la ligne pr�c�dente au d�but du tableau

    if($DEBUG)
   		print_r($leFichier);

    file_put_contents('ac.htm', $leFichier); //On �crit le contenu du tableau $leFichier dans le fichier ac.htm
?>