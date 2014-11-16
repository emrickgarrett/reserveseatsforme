<?php
/**
 * Created by PhpStorm.
 * User: Garrett
 * Date: 11/16/2014
 * Time: 02:43
 */

$email = $_POST['email'];
$restName = $_POST['RestName'];
$contactName = $_POST['ContactName'];

$message = "Thanks " . $contactName . "! We appreciate you taking the time to register your restaurant " . $restName . " and will have it in our systems shortly.\n\nHave a nice day!";

$message = wordwrap($message, 70);

mail($email, "ReserveFor.Me Confirmation", $message);
?>