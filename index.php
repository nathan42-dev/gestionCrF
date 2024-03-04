<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $age = htmlspecialchars($_POST["age"]);
    $sexe = htmlspecialchars($_POST["sexe"]);
    $intervention = htmlspecialchars($_POST["intervention"]);
    $description = htmlspecialchars($_POST["description"]);
    $bpm = htmlspecialchars($_POST["bpm"]);
    $saturation = htmlspecialchars($_POST["saturation"]);
    $tension = htmlspecialchars($_POST["tension"]);
    $pupilles = htmlspecialchars($_POST["pupilles"]);
    $reponse = htmlspecialchars($_POST["reponse"]);
    $devenir = isset($_POST["devenir"]) ? implode(", ", $_POST["devenir"]) : "";
    $hosp_nom = htmlspecialchars($_POST["hosp_nom"]);
    $hosp_service = htmlspecialchars($_POST["hosp_service"]);
    $hosp_comment = htmlspecialchars($_POST["hosp_comment"]);

    // Adresse e-mail de destination
    $to = "votre_email@example.com";

    // Sujet de l'e-mail
    $subject = "Nouvelle intervention de la Croix Rouge";

    // Corps de l'e-mail
    $message = "
    Nom: $nom
    Prénom: $prenom
    Âge: $age
    Sexe: $sexe
    Type d'intervention: $intervention
    Description de l'intervention: $description
    BPM: $bpm
    Saturation en oxygène: $saturation
    Tension: $tension
    Symétrie des pupilles: $pupilles
    Réponse cohérente: $reponse
    Devenir de la victime: $devenir
    Nom de l'hôpital: $hosp_nom
    Service: $hosp_service
    Commentaires supplémentaires: $hosp_comment
    ";

    // En-têtes additionnels
    $headers = "From: votre_email@example.com" . "\r\n" .
               "Reply-To: votre_email@example.com" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Envoi de l'e-mail
    if (mail($to, $subject, $message, $headers)) {
        echo "Votre message a été envoyé avec succès.";
    } else {
        echo "Une erreur s'est produite lors de l'envoi du message.";
    }
}
?>
