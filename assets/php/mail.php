<?php
    header('Content-Type: application/json');
    require_once 'mailing/PHPMailer-master/PHPMailerAutoload.php';
    $mail = new PHPMailer(true);
    $nombre = $_POST['nombres'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $body = $nombre.' '.$telefono.' '.$correo;
    try {
        $mail->isSMTP();                                        // Set mailer to use SMTP
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->Host = 'smtp.gmail.com';                              // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                // Enable SMTP authentication
        $mail->Username = 'lacasadelcarretonecuador@gmail.com';                   // SMTP username
        $mail->Password = 'lacasadelcarreton2020';                             // SMTP password
        $mail->SMTPSecure = 'tls';                              // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                      // TCP port to connect to
        $mail->IsHTML(true);
        $mail->From = 'webpage@lacasadelcarreton.com';
        $mail->FromName = utf8_decode('La Casa del Carreton');
        $mail->AddAddress('johnandrescv@gmail.com');
        $mail->Subject = utf8_decode('Nuevo Cliente Interesado');
        $mail->Body = $body;
        $mail->send();
    } catch (phpmailerException $e) {
        //echo $e->errorMessage(); //Pretty error messages from PHPMailer
        echo json_encode(array("error" => true));
        return;
    } catch (Exception $e) {
        //echo $e->getMessage(); //Boring error messages from anything else!
        echo json_encode(array("error" => true));
        return;
    }
    echo json_encode(array("error" => false));
?>