<?php
if (isset($_POST['submit'])) {
    $to = "tmir1709@gmail.com"; //Recipient email address
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $headers = "From: ttube@local.com" . "\r\n" . "CC: ttube@local.com"; //Sender email address and CC email address

    if (mail($to, $subject, $message, $headers)) {
        echo "Your email has been sent successfully!";
    } else {
        echo "Failed to send email, please try again later.";
    }
}
?>

<html>

<head>
    <title>Send Mail</title>
</head>

<body>
    <form method="post" action="subscribe.php">
        <input type="text" name="subject" placeholder="Subject"><br><br>
        <textarea name="message" placeholder="Message"></textarea><br><br>
        <input type="submit" name="submit" value="Send">
    </form>
</body>

</html>