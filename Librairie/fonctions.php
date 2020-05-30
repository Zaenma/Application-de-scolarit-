<?php
// session_start();


/**
 * insertMessages : inseret un message dans la base de donnée 
 *
 * @param  mixed $nom
 * @param  mixed $sujet
 * @param  mixed $message
 * @param  mixed $telephone
 * @param  mixed $email
 * @return string
 */
function insertMessages($nom, $sujet, $message, $telephone, $email): string
{
  $pdo = connectionDB();
  $insert_donnees = $pdo->prepare("INSERT INTO Messages(Expeditaire,Sujet,Messages,Telephone,Email)
                                  VALUES (?, ?, ?, ?, ?)");
  $resultat = $insert_donnees->execute(array($nom, $sujet, $message, $telephone, $email));
  return $resultat;
}

/**
 * envoieEmail : l'envoie d'email 
 *
 * @param  mixed $nom
 * @param  mixed $sujet
 * @param  mixed $telephone
 * @param  mixed $email
 * @param  mixed $message
 * @return string
 */
function envoieEmail($nom, $sujet, $telephone, $email, $message): string
{
  $messageSucces = "";
  $messageEchec = "";
  $headers = "";

  $destination = "contacte.zaenma@gmail.com";
  $headers .= "MIME-Version: 1.0" . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From:PHPGurukul Contact Form Demo<contacte.zaenma@gmail.com>' . "\r\n";
  $message .= "<html>
							</body>
								<div>
									<div><b>Name:</b> $nom,</div>
									<div><b>Phone Number:</b> $telephone,</div>
									<div><b>Email Id:</b> $email,</div>";
  $message .= "<div style='padding-top:8px;'><b>Message : </b>$message</div><div></div>
							</body>
            </html>";
  if (mail($destination, $sujet, $message, $headers)) {
    return $messageSucces;
  } else {
    return $messageEchec;
  }
}
