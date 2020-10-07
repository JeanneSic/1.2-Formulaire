<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Formulaire</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
<?php

$subjects=[
'cbi' => 'La configuration de ma boxe internet',
'amf' => 'L\'automatisation de mes factures',
'vsi' => 'La vie sans internet',
];

$firstName = $lastName = $email = $phoneNumber = $subject = $userMessage = "";

if (!empty($_POST) && isset($_POST['btnContact'])){
    $errors = [];

    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $email = trim($_POST['user_email']);
    $phoneNumber = trim($_POST['phone_number']);
    $subject = trim($_POST['subject']);
    $userMessage = trim($_POST['user_message']);

    if (empty($firstName))
        $errors['first_name'] ='Required';
    if (empty($lastName))
        $errors['last_name'] ='Required';
    if (empty($email))
        $errors['user_email'] = 'Required';
    if (!preg_match("/^[A-Z\.0-9]+@[A-Z-]+\.[A-Z]{2,}$/i", $email))
        $errors['user_email'] = 'Invalid email';
    if (empty($phoneNumber))
        $errors['phone_number'] = 'Required';
    if (empty($subject))
        $errors['subject'] = 'Required';
    if (empty($userMessage))
        $errors['user_message'] = 'Required';

    if (empty($errors)) {
        header("Location: /thanks.php?first_name=$firstName&last_name=$lastName&user_email=$email&phone_number=$phoneNumber&subject=$subject&user_message=$userMessage");        
    }
}

?>
<h2>Mon formulaire</h2>
<form action= "index.php" method="post" novalidate>
    <div>
        <label for="first_name">First name :</label>
        <input required type="text"  id="first_name"  name="first_name" value="<?= $firstName ?>">
        <?php if (isset($errors['first_name'])): ?>
            <span><?= $errors['first_name'] ?></span>
        <?php endif; ?>
    </div>
    <br><br>
    <div>
        <label for="last_name">Last name :</label>
        <input  required type="text"  id="nom"  name="last_name" value="<?= $lastName ?>">
        <?php if (isset($errors['last_name'])): ?>
            <span><?= $errors['last_name'] ?></span>
        <?php endif; ?>
    </div>
    <br><br>
    <div>
        <label  for="email">Email :</label>
        <input  required type="email"  id="email"  name="user_email" value="<?= $email ?>"/>
        <?php if (isset($errors['user_email'])): ?>
            <span><?= $errors['user_email'] ?></span>
        <?php endif; ?>
    </div>
    <br><br>
    <div>
        <label for="phone_number">Phone number :</label>
        <input required type="tel" id="phone_number" name="phone_number" value="<?= $email; ?>"/>
        <?php if (isset($errors['phone_number'])): ?>
            <span><?= $errors['phone_number'] ?></span>
        <?php endif; ?>
    </div>
    <br><br>
    <div>
        <label for="subject">Subject: </label>
        <select required name="subject">
            <option>"La configuration de ma boxe internet"</option>
            <option>"L'automatisation de mes factures"</option>
            <option>"La vie sans internet"</option>
            <?php foreach ($subjects as $ref => $subject) { ?>
            <option value="<?= $ref ?>"><?= $subject ?></option>
            <?php } ?>
        </select>
    </div>
    <br><br>
    <div>
        <label for="user_message">Message:</label>
        <textarea required name="user_message" id="message" cols="30" rows="10" value="<?= $userMessage?>"></textarea>
        <?php if (isset($errors['user_message'])):?>
        <span><?= $errors['user_message']?></span>
        <?php endif?>
    </div>

    <button name="btnContact" type="submit" class="btn btn-primary">Send</button>
    </form>
    <br><br>
    
</body>
</html>
