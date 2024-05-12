<?php
// Inclure le fichier d'autoloader de PHPMailer
require 'vendor/autoload.php';

$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$objet = $_POST['objet'];
$tel = $_POST['tel'];
$message = $_POST['message'];
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
$mail->setFrom($_POST['email']);
$mail->addAddress('azanmassouhappylouis@gmail.com');
// $mail->addAddress('Contacten@finanscokrediet.com'); 

// Configurer le contenu de l'e-mail
$mail->isHTML(true);
$mail->Subject = 'Finansco : Demande de Contact';

$mail->Body = "Bonjour,\n\n";
$mail->Body .= "Une nouvelle demande de Contact a ete soumise depuis votre site :<br>";
$mail->Body .= "Voornaam : $prenom\n<br>";
$mail->Body .= "Naam : $nom\n<br>";
$mail->Body .= "E-mail : $email\n<br>";
$mail->Body .= "Telefoon : $tel\n<br>";
$mail->Body .= "Object : $objet\n<br>";
$mail->Body .= "Bericht : $message\n<br>";

$mail->AltBody = 'Une nouvelle demande demande de contact a été soumise depuis votre site :\n\n';

// Envoyer l'e-mail
if(!$mail->send()) {
    echo 'Erreur lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
} else {
    header("Location: confirmation/index.html");
    echo '0!';
}
