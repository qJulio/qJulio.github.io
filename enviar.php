<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mensaje = htmlspecialchars(trim($_POST['message']));

    // Validación básica
    if (empty($nombre) || empty($email) || empty($mensaje)) {
        die("Por favor, completa todos los campos.");
    }

    // Configuración del correo
    $to = "tu_correo@ejemplo.com"; // Cambia esto por tu dirección de correo electrónico
    $subject = "Nuevo mensaje de contacto";
    $body = "Nombre: $nombre\n";
    $body .= "Email: $email\n";
    $body .= "Mensaje:\n$mensaje\n";

    $headers = "From: $nombre <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado con éxito!";
    } else {
        echo "Error al enviar el mensaje.";
    }
} else {
    die("Método de solicitud no permitido.");
}
?>
