<?php
// Inclure le fichier d'autoloader de PHPMailer
require 'vendor/autoload.php';

// Vérifier si le formulaire a été soumis
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Définir un tableau de messages d'erreur
//     $errors = [];

//     // Fonction pour nettoyer les données du formulaire
//     function test_input($data) {
//         $data = trim($data);
//         $data = stripslashes($data);
//         $data = htmlspecialchars($data);
//         return $data;
//     }

//     // Vérifier chaque champ du formulaire
//     $champs = array(
//         "projet" => "Le champ 'projet'",
//         "montant" => "Le champ 'montant'",
//         "duree" => "Le champ 'duree'",
//         "emprunt" => "Le champ 'emprunt'",
//         "pays" => "Le champ 'pays'",
//         "adress" => "Le champ 'adresse'",
//         "postal" => "Le champ 'postal'",
//         "ville" => "Le champ 'ville'",
//         "situation_logement" => "Le champ 'situation_logement'",
//         "situation_professionnelle" => "Le champ 'situation_professionnelle'",
//         "revenus" => "Le champ 'revenus'",
//         "situation_famillial" => "Le champ 'situation_famillial'",
//         "etat_civil" => "Le champ 'etat_civil'",
//         "nom" => "Le champ 'nom'",
//         "prenom" => "Le champ 'prenom'",
//         "date" => "Le champ 'date'",
//         "nation" => "Le champ 'nation'",
//         "tel" => "Le champ 'tel'",
//         "email" => "Le champ 'email'"
//     );

//     foreach ($champs as $key => $value) {
//         if (empty($_POST[$key])) {
//             $errors[] = "$value est requis.";
//         } else {
//             ${$key} = test_input($_POST[$key]);
//             // Vous pouvez effectuer d'autres validations spécifiques ici si nécessaire
//         }
//     }

//     // Vérifier s'il y a des erreurs
//     if (!empty($errors)) {
//         // S'il y a des erreurs, rediriger vers la page précédente avec les erreurs
//         $_SESSION['errors'] = $errors; // Stocker les erreurs dans une session
//         header("Location: " . $_SERVER["HTTP_REFERER"]); // Rediriger vers la page précédente
//         exit(); // Arrêter l'exécution du script
//     } else {
//         // Si tout est valide, vous pouvez traiter les données du formulaire ici
//         // Par exemple, enregistrer les données dans une base de données ou envoyer un e-mail
//         // Assurez-vous de nettoyer et valider les données avant de les utiliser pour éviter les attaques XSS et d'injection SQL
//     }
// }

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
