<?php
// Mostrar errores PHP (Desactivar en producción)


// Incluir la libreria PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function enviarEmail($correo)
{
    // Inicio
    $mail = new PHPMailer(true);

    try {
        // Configuracion SMTP                        // Mostrar salida (Desactivar en producción)
        $mail->isSMTP();                                               // Activar envio SMTP
        $mail->Host  = 'smtp.gmail.com';                     // Servidor SMTP
        $mail->SMTPAuth  = true;                                       // Identificacion SMTP
        $mail->Username  = 'vito96200@gmail.com';                  // Usuario SMTP
        $mail->Password  = 'bjxqhnlesochylim';              // Contraseña SMTP
        $mail->SMTPSecure = 'tls';
        $mail->Port  = 587;
        $mail->setFrom('vito96200@gmail.com', 'Oscar');                // Remitente del correo

        // Destinatarios
        $mail->addAddress($correo[0]->Correo, $correo[0]->Nombre);  // Email y nombre del destinatario

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Reparacion';
        $mail->Body  = 'Reparacion';
        $mail->AltBody = 'Contenido del correo en texto plano para los clientes de correo que no soporten HTML';
        $mail->send();
        echo 'El mensaje se ha enviado';
    } catch (Exception $e) {
        echo "El mensaje no se ha enviado. Mailer Error: {$mail->ErrorInfo}";
    }
}
