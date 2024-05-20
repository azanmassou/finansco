<?php
// Inclure le fichier d'autoloader de PHPMailer
require 'vendor/autoload.php';

$projet = $_POST['projet'];
$montant = $_POST['montant'];
$duree = $_POST['duree'];
$emprunt = $_POST['emprunt'];
$pays = $_POST['pays'];
$adress = $_POST['adress'];
$postal = $_POST['postal'];
$ville = $_POST['ville'];
$situation_logement = $_POST['situation_logement'];
$situation_professionnelle = $_POST['situation_professionnelle'];
$revenus = $_POST['revenus'];
$situation_famillial = $_POST['situation_famillial'];
$etat_civil = $_POST['etat_civil'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$date = $_POST['date'];
$nation = $_POST['nation'];
$tel = $_POST['tel'];


if (!isset($_POST['email']) || empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    header("Location: {$_SERVER['HTTP_REFERER']}?error=email&email={$_POST['email']}");
    exit;
}


$email = $_POST['email'];


// Créer une nouvelle instance de PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();

// Configurer les paramètres du serveur SMTP
$mail->isSMTP();
$mail->Host = 'mail.credito-mas-simple.com';
$mail->SMTPAuth = true;
$mail->Username = 'support@credito-mas-simple.com';
$mail->Password = 'Happylouis66'; // Remplacez par votre mot de passe
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

// Configurer l'expéditeur et le destinataire
$mail->setFrom($email);
// $mail->addAddress('azanmassouhappylouis@gmail.com');
$mail->addAddress('Contacten@finanscokrediet.com');

// Configurer le contenu de l'e-mail
$mail->isHTML(true);
$mail->Subject = 'Finansco Krediet';
$mail->Body = "Hallo,\n\n";
$mail->Body .= "Er is een nieuwe kredietaanvraag ingediend vanaf uw site :<br>";
$mail->Body .= "Project : $projet\n<br>";
$mail->Body .= "Bedrag : $montant\n<br>";
$mail->Body .= "Looptijd van de lening : $duree\n<br>";
$mail->Body .= "met schulden : $emprunt\n<br>";
$mail->Body .= "Land van verblijf: $pays\n<br>";
$mail->Body .= "Adres : $adress\n<br>";
$mail->Body .= "Postcode : $postal\<br>";
$mail->Body .= "Stad : $ville\n<br>";
$mail->Body .= "Huisvestingssituatie : $situation_logement\n<br>";
$mail->Body .= "Professionele situatie : $situation_professionnelle\n<br>";
$mail->Body .= "Gezinssituatie : $situation_famillial\n<br>";
$mail->Body .= "Burgerlijke staat : $etat_civil\n<br>";
$mail->Body .= "Naam : $nom\n<br>";
$mail->Body .= "Datum : $date\n<br>";
$mail->Body .= "Geboorteland : $nation\n<br>";
$mail->Body .= "Telefoon : $tel\n<br>";
$mail->Body .= "E-mail : $email\n<br>";
$mail->Body .= "Bedankt voor uw tijd.";
$mail->AltBody = 'Er is een nieuwe kredietaanvraag ingediend vanaf uw site :\n\n';

// Envoyer l'e-mail
if(!$mail->send()) {
    echo 'Erreur lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
} else {
    header("Location: bevestiging/index.html");
    // echo '0!';
}
