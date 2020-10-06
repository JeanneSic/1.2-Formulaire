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
$firstNameErr = $lastNameErr = $emailErr = $phoneNumberErr = $userMessageErr = "";
$firstName = $lastName = $email = $phoneNumber = $userMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["first_name"])) {
        $firstNameErr = "first name is required";
    } else {
        $firstName = test_input($_POST["first_name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$firstName)){
            $firstNameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["last_name"])) {
        $lastNameErr = "last name is required";
    } else {
        $lastName = test_input($_POST["last_name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lastName)){
            $lastNameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["user_email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["user_email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    if (empty($_POST['phone_number'])) {
        $phoneNumberErr = "Your phone number cannot be empty";
    }
     if (empty($_POST['user_message'])) {
        $userMessageErr = "Your message cannot be empty";
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<h2>Mon formulaire</h2>
<form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div>
        <label for="first_name">First name :</label>
        <input  type="text"  id="nom"  name="first_name" value="<?php echo $firstName ?>"/>
        <span class="error">* <?php echo $firstNameErr?></span>
    </div>
    <br><br>
    <div>
        <label for="last_name">Last name :</label>
        <input  type="text"  id="nom"  name="last_name" value="<?php echo $lastName ?>"/>
        <span class="error">* <?php echo $lastNameErr?></span>
    </div>
    <br><br>
    <div>
        <label  for="email">Email :</label>
        <input  type="email"  id="email"  name="user_email" value="<?php echo $email ?>"/>
        <span class="error">* <?php echo $emailErr?></span>
    </div>
    <br><br>
    <div>
        <label for="phone_number">Phone number :</label>
        <input type="tel" id="phone_number" name="phone_number" value="<?php echo $phoneNumber ?>"/>
        <span class="error">* <?php echo $phoneNumberErr?></span>
    </div>
    <br><br>
    <div>
        <label for="subject">Subject: </label>
        <select name="subject">
        <option>"La configuration de ma boxe internet"</option>
        <option>"L'automatisation de mes factures"</option>
        <option>"La vie sans internet"</option>
        </select>
    </div>
    <br><br>
    <div>
        <label  for="message">Message :</label>
        <textarea name="comment" rows="5" cols="40"><?php echo $userMessage;?></textarea>
        <span class="error">* <?php echo $userMessageErr?></span>
    </div>
    <br><br>
    <div  class="button">
        <button  type="submit">Submit</button>
    </div>
</form>

</body>
</html>
