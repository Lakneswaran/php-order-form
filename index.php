<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

whatIsHappening();
//your products with their price.
$food = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];

$drinks = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];

$totalValue = 0;



$name = $email = $street = $streetnumber = $city = $zipcode = "";
$emailErr = $streetErr = $streetnumberErr = $cityErr = $zipcodeErr = "";


// var_dump($email);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$email = test_input($_POST["email"]);
$street = test_input($_POST["street"]);
$streetnumber = test_input($_POST["streetnumber"]);
$city = test_input($_POST["city"]);
$zipcode = test_input($_POST["zipcode"]);


if (empty($_POST["email"])) {
    $emailErr = "email is required";
  } else {      
    $email = $_POST["email"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z\d\._ ]+@[a-zA-Z\d\._]+\.[a-zA-Z\d\._]{2,}+$/",$email)) {
      $emailErr = "Enter a valid email";
    }else{
        $email = $_POST["email"];
        $_SESSION["email"]=$_POST["email"];  

    }
  }

if (empty($_POST["street"])) {
    $streetErr = "street is required";
  } else {
    $street = $_POST["street"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$street)) {
      $streetErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["city"])) {
    $cityErr = "city is required";
  } else {
    $street = $_POST["city"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$city)) {
      $cityErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["streetnumber"])) {
    $streetnumberErr = "street number is required";
  } else {
    $streetnumber = $_POST["streetnumber"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]+$/",$streetnumber)) {
      $streetnumberErr = "Only numbers allowed";
    }
  }
  if (empty($_POST["zipcode"])) {
    $zipcodeErr = "zipcode is required";
  } else {
    $zipcode = $_POST["zipcode"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]+$/",$zipcode)) {
      $zipcodeErr = "Only numbers allowed";
    }
  }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


require_once 'form-view.php';



