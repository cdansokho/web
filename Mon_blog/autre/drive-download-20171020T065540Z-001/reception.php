<?php include("config.php");

	if(isset($_FILES['mon_avatar']))
	{
	
		if ($_FILES['mon_avatar']['error'] > 0)
		{ 
			header("Location: index.php");
		}
		else
		{
			//test pour voir si le fichier n'est pas trop gros
			if($_FILES['mon_avatar']['size'] > 5000000)
			{
				$erreur = "Le fichier est trop gros";
				echo $erreur;
			}
			else
			{
				$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
				//1. strrchr renvoie l'extension avec le point (« . »).
				//2. substr(chaine,1) ignore le premier caractère de chaine.
				//3. strtolower met l'extension en minuscules.
				$extension_upload = strtolower(  substr(  strrchr($_FILES['mon_avatar']['name'], '.')  ,1)  );
				
				if ( in_array($extension_upload,$extensions_valides) )
				{                    
						$nom = "image/avatar/".$_SESSION['id'].".jpg";
						$resultat = move_uploaded_file($_FILES['mon_avatar']['tmp_name'],$nom);
						
						if ($resultat)
						{
							header("Location: index.php");
						}
					}
				}
			}
		}
	
?>