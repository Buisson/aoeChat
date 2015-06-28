<?php
    $nom = $_POST['nom'];                    //On récupère le pseudo et on le stocke dans une variable
    $message = $_POST['message'];            //On fait de même avec le message   
    
    if(empty($message) || empty($nom)) {
    	exit();
    }

    $nom = htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

    $id = file('cpt.txt')[0] + 1;
    file_put_contents('cpt.txt', $id);

    $ligne = '<div>'.$nom.' > <span id="'.$id.'">'.$message.'</span></div>';     //Le message est créé 


    $leFichier = file('ac.htm');             //On lit le fichier ac.htm et on stocke la réponse dans une variable (de type tableau)



    array_unshift($leFichier, $ligne);       //On ajoute le texte calculé dans la ligne précédente au début du tableau

    $leFichier = array_reverse($leFichier);
    file_put_contents('ac.htm', $leFichier); //On écrit le contenu du tableau $leFichier dans le fichier ac.htm
?>