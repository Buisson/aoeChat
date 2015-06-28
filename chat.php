<?php
    $nom = $_POST['nom'];                    //On r�cup�re le pseudo et on le stocke dans une variable
    $message = $_POST['message'];            //On fait de m�me avec le message   
    
    if(empty($message) || empty($nom)) {
    	exit();
    }

    $nom = htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

    $id = file('cpt.txt')[0] + 1;
    file_put_contents('cpt.txt', $id);

    $ligne = '<div>'.$nom.' > <span id="'.$id.'">'.$message.'</span></div>';     //Le message est cr�� 


    $leFichier = file('ac.htm');             //On lit le fichier ac.htm et on stocke la r�ponse dans une variable (de type tableau)



    array_unshift($leFichier, $ligne);       //On ajoute le texte calcul� dans la ligne pr�c�dente au d�but du tableau

    $leFichier = array_reverse($leFichier);
    file_put_contents('ac.htm', $leFichier); //On �crit le contenu du tableau $leFichier dans le fichier ac.htm
?>