<?php
$errors = [];

// TODO 3 - Get the data from the form and check for errors
if(isset($_POST)) {
    $data = array_map('trim', $_POST);

    // validation
    if (empty($data['companyName'])) {
        $errors[] = 'The companyName is mandatory';
    }
    if (empty($data['name'])) {
        $errors[] = 'The name is mandatory';
    }
    if (empty($data['email'])) {
        $errors[] = 'The email is mandatory';
    }
    if (empty($data['contactMessage'])) {
        $errors[] = 'The contactMessage is mandatory';
    }
    if (strlen($data['contactMessage']) < 30) {
        $errors[] = 'The contactMessage length should be greatter than 30 characters';
    }
    if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
        $errors[] = "L'adresse mail n’est pas au bon format.";
    }

    $companyName = $data['companyName'];
    $name = $data['name'];
    $email = $data['email'];
    $contactMessage = $data['contactMessage'];
}
else {
    $errors[] = "Aucun formulaire n'a été envoyé.";
}

if (!empty($errors)) {
    require 'error.php';
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif - Réclamation</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <h1>Nous traitons votre retour.</h1>
        <img src="images/logo_dunder.png" alt="Logo Dunder Mifflin">
    </header>

    <main>
        <div class="summary">
            <!-- BONUS -->
            <p>
                <img src="images/placeholder.png" alt="">
                <span>Votre vendeur</span>
            </p>
            

            <!-- TODO 2 - Replace those placeholders by the values sent from the form -->
            <ul>
                <li>Votre entreprise : <span><?= htmlentities($companyName); ?></span></li>
                <li>Votre nom : <span><?= htmlentities ($name); ?></span></li>
                <li>Votre email : <span><?php echo htmlentities ($email); ?></span></li>
                <li>Votre message :
                    <p><?php echo htmlentities ($contactMessage); ?>
                    </p>
                </li>
            </ul>
        </div>
    </main>
</body>

</html>