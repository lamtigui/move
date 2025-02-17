<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Google reCAPTCHA secret key
    $secretKey = "6Lels9kqAAAAABNjURWWtVsfNSzTiegSqsAC1hsm"; // Replace with your actual secret key

    // Verify reCAPTCHA response
    $recaptchaResponse = $_POST["g-recaptcha-response"];
    $verifyURL = "https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}";

    $response = file_get_contents($verifyURL);
    $responseKeys = json_decode($response, true);

    if (!$responseKeys["success"]) {
        echo "Échec de la vérification reCAPTCHA. Veuillez réessayer.";
        exit;
    }

    // Get form data and sanitize it
    $name = htmlspecialchars(trim($_POST["senderName"]));
    $ville = htmlspecialchars(trim($_POST["senderVille"]));
    $tel = htmlspecialchars(trim($_POST["senderTel"]));
    $email = filter_var(trim($_POST["senderEmail"]), FILTER_SANITIZE_EMAIL);
    $typeLocal = htmlspecialchars(trim($_POST["ProOrPar"]));
    $message = htmlspecialchars(trim($_POST["senderMessage"]));

    // Validate required fields
    if (empty($name) || empty($ville) || empty($tel) || empty($email) || empty($typeLocal) || empty($message)) {
        echo "Tous les champs sont obligatoires.";
        exit;
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Adresse email invalide.";
        exit;
    }

    // Validate phone number (10 digits)
    if (!preg_match('/^[0-9]{10}$/', $tel)) {
        echo "Numéro de téléphone invalide.";
        exit;
    }

    // Prepare email content
    $to = "votreemail@example.com"; // Replace with your email
    $subject = "Nouvelle demande de devis";
    $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8\r\n";
    
    $email_body = "Nom/Prénom: $name\n";
    $email_body .= "Ville: $ville\n";
    $email_body .= "Téléphone: $tel\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Type de local: " . ($typeLocal == 1 ? "Particulier" : "Professionnel") . "\n";
    $email_body .= "Message:\n$message\n";

    // Send email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Votre demande a été envoyée avec succès.";
    } else {
        echo "Erreur lors de l'envoi du message.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>
