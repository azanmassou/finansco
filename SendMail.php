<?php

// error_reporting(E_ALL & ~E_DEPRECATED);
// ini_set("display_errors", 1);

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
$email = $_POST['email'];

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'azanmassouhappylouis@gmail.com';                     //SMTP username
    $mail->Password   = 'grge pler zqoi jpyr';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email, $email);
    $mail->addAddress('Contacten@finanscokrediet.com', 'finanscokrediet');     //Add a recipient
    // $mail->addAddress('azanmassouhappylouis@gmail.com');               //Name is optional
    // $mail->addReplyTo('azanmassouhappylouis@gmail.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Finansco : Soumission du formulaire de Pret';

    $mail->Body = "Bonjour,\n\n";
    $mail->Body .= "Une nouvelle demande de credit a ete soumise depuis votre site :<br>";
    $mail->Body .= "Projet : $projet\n<br>";
    $mail->Body .= "Montant : $montant\n<br>";
    $mail->Body .= "Durer : $duree\n<br>";
    $mail->Body .= "Emprunt : $emprunt\n<br>";
    $mail->Body .= "Pays de residence: $pays\n<br>";
    $mail->Body .= "Adress : $adress\n<br>";
    $mail->Body .= "Postal : $postal\<br>";
    $mail->Body .= "Ville : $ville\n<br>";
    $mail->Body .= "Situation Logement : $situation_logement\n<br>";
    $mail->Body .= "Situation Professionnelle : $situation_professionnelle\n<br>";
    $mail->Body .= "Situation Familliale : $situation_famillial\n<br>";
    $mail->Body .= "Etat Civil : $etat_civil\n<br>";
    $mail->Body .= "Nom : $nom\n<br>";
    $mail->Body .= "Date : $date\n<br>";
    $mail->Body .= "Pays de naissance : $nation\n<br>";
    $mail->Body .= "Telephone : $tel\n<br>";
    $mail->Body .= "Email : $email\n<br>";
    $mail->Body .= "Merci.";
    $mail->AltBody = 'Une nouvelle demande de crédit a été soumise depuis votre site :\n\n';
    $mail->send();
    header('Location:confirmation/index.html');
    // header("Location: https://finanscokrediet.com/confirmation/index.html");

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
