<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();
// setcookie("prices", strval($totalValue), time() + (86400 * 30), "/");

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

// whatIsHappening();
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
if(isset($_COOKIE["prices"])){
    $totalValue = $_COOKIE["prices"];
}else{
$totalValue = 0;

}
$products = $food;
if(isset($_GET["food"]) && $_GET["food"] == 0) {
    $products = $drinks;
}
$order = [];

if(isset($_POST['product']) && !empty($_POST['product'])) {
    foreach ($_POST['product'] as $i => $value) {
        global $totalValue;
        $selected = explode("|-|",$value);
        $order[$i]['price'] = $selected[0];
        $order[$i]['name'] = $selected[1];
        $intprice = (float)$selected[0];
        $totalValue += $intprice;
        
        setcookie("prices", strval($totalValue), time() + (86400 * 30), "/");
        
    }
    if(isset($_POST['express_delivery'])){
        $totalValue += $_POST['express_delivery'];
        echo "<div class='alert alert-success' role='alert'>
        Delivery will be in 45min!
      </div>";
      
    }else{
        echo "<div class='alert alert-success' role='alert'>
        Delivery will be in 2hours!
      </div>";
    }
 }else{
    $totalValue  = $_COOKIE["prices"];
}








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
    }else{
        $street = $_POST["street"];
        $_SESSION["street"]=$_POST["street"];  
    }
  }

  if (empty($_POST["city"])) {
    $cityErr = "city is required";
  } else {
    $street = $_POST["city"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$city)) {
      $cityErr = "Only letters and white space allowed";
    }else{
        $city = $_POST["city"];
        $_SESSION["city"]=$_POST["city"];  
    }
  }

  if (empty($_POST["streetnumber"])) {
    $streetnumberErr = "street number is required";
  } else {
    $streetnumber = $_POST["streetnumber"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]+$/",$streetnumber)) {
      $streetnumberErr = "Only numbers allowed";
    }else{
        $streetnumber = $_POST["streetnumber"];
        $_SESSION["streetnumber"]=$_POST["streetnumber"];  
    }
  }
  if (empty($_POST["zipcode"])) {
    $zipcodeErr = "zipcode is required";
  } else {
    $zipcode = $_POST["zipcode"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]+$/",$zipcode)) {
      $zipcodeErr = "Only numbers allowed";
    }else{
        $zipcode = $_POST["zipcode"];
        $_SESSION["zipcode"]=$_POST["zipcode"];  
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
whatIsHappening();


