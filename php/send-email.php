<?php
// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
require 'phpmailer/PHPMailerAutoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
   $name = $_POST["name"];
   $email = $_POST["email"];
   $subject = $_POST["subject"];
   $message = $_POST["message"];

   // Inicia a classe PHPMailer
   $mail = new PHPMailer();

   // Define os dados do servidor e tipo de conexão
   // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
   $mail->isSMTP(); // Define que a mensagem será SMTP
   $mail->Host = "host.seuhost.com"; // Endereço do servidor SMTP
   $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
   $mail->Username = 'username'; // Usuário do servidor SMTP
   $mail->Password = 'senha'; // Senha do servidor SMTP
   $mail->SMTPSecure = 'ssl'; //Enable TLS encryption, `ssl` also accepted
   //$mail->SMTPDebug  = 1;
   $mail->Port = 500; // TCP port to connect to

   // Define o remetente
   // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
   $mail->From = "email@email.com"; // Seu e-mail
   $mail->FromName = "Site Carnaval 2017"; // Seu nome

   // Define os destinatário(s)
   // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
   $mail->addAddress('email@email.com', 'República Alforria');
   $mail->addBCC('wfelippesilva@gmail.com');

   // Define para quem deve ser respondido o e-mail
   // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
   $mail->addReplyTo($email, $name);

   // Define os dados técnicos da Mensagem
   // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
   $mail->isHTML(true); // Define que o e-mail será enviado como HTML
   $mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)

   // Define a mensagem (Texto e Assunto)
   // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
   $message .= '<br /><b>Responder para</b>: ' . $name . ' (' . $email . ')';
   $mail->Subject  = $subject; // Assunto da mensagem
   $mail->Body = $message;
   $mail->AltBody = $message;

   // Envia o e-mail
   $enviado = $mail->send();

   // Limpa os destinatários e os anexos
   $mail->clearAllRecipients();
   $mail->clearAttachments();

   // Exibe uma mensagem de resultado
   if ($enviado) {
     echo "E-mail enviado com sucesso!";
   }
   else {
     echo "Não foi possível enviar o e-mail. <br /> <b>Informações do erro:</b> " . $mail->ErrorInfo;
  }
}
else {
   echo "Não foi possível enviar o e-mail. <br /> <b>Informações do erro:</b> Erro na requisição post";
}
?>
