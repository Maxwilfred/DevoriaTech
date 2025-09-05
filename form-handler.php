<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $service = htmlspecialchars($_POST['service']);
    $message = htmlspecialchars($_POST['message']);
    
    // Destinataire de l'email
    $to = "votre-email@exemple.com";
    
    // Sujet de l'email
    $subject = "Nouveau message de $name - Service: $service";
    
    // Corps du message
    $email_content = "Nom: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Service: $service\n\n";
    $email_content .= "Message:\n$message\n";
    
    // En-têtes
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Envoi de l'email
    if (mail($to, $subject, $email_content, $headers)) {
        // Redirection vers une page de confirmation
        header('Location: merci.html');
        exit;
    } else {
        echo "Une erreur s'est produite lors de l'envoi du message.";
    }
}
?>