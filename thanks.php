<?php

$firstName = $_GET['first_name'];
$lastName = $_GET['last_name'];
$email = $_GET['user_email'];
$phoneNumber = $_GET['phone_number'];
$subject = $_GET['subject'];
$userMessage = $_GET['user_message'];

echo "Merci" . ' ' . $_GET['first_name'] . ' ' . $_GET['last_name'] . ' ' . "de nous avoir contacté à propos de" . ' ' . $_GET['subject'];
echo "</br>";
echo "Un de nos conseillers vous contactera soit à l'adresse" . ' ' . $_GET['user_email'] . ' ' . "ou par téléphone au" . ' ' . $_GET['phone_number'] . ' ' . "dans les plus brefs délais pour traiter votre demande :";
echo "</br>";
echo $_GET['user_message'];

?>
