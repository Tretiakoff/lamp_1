<?php
session_start();
$choice = rand(0,100);
$response = null;


if(empty($_SESSION['choice'])){
    $_SESSION['choice'] = $choice;
    $_SESSION['compteur'] = 1;
    $_SESSION['meilleur_coup'] = null;
    $_SESSION['nombres_coups'] = null;
}
else{
    $choice = $_SESSION['choice'];
}

if(!isset($_POST['guess']) || empty($_POST['guess'])){
    $response = "Pas de nombre";
    $_SESSION['compteur']= 1;
}
else{
    $guess = $_POST['guess'];
    if($guess > $choice){
        $response = "C'est moins";
        $_SESSION['compteur']++;
    }
    elseif($guess < $choice){
        $response = "C'est plus";
        $_SESSION['compteur']++;
    }
    else{
        $response = "C'est gagné en ".$_SESSION['compteur']." fois<br>";
        $_SESSION['meilleur_coup'] = "meilleur coup: ".$_SESSION['compteur'];
        unset($_SESSION['choice']);
        unset($_SESSION['compteur']);



    }

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Des papiers dans un bol</title>
</head>
<body>
<?php echo$response;?>
<?php echo$_SESSION['compteur'];?>
<?php echo$_SESSION['meilleur_coup'];?>

<form method="post">
    <input type="text" name="guess">
    <input type="submit" name="btn">
    ( La reponse est <?php echo $choice?>)
</form>
</body>
</html>