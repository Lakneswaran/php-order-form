<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="UTF-8">
    <meta name="description" content="form">
    <meta name="keywords" content="PHP">
    <meta name="author" content="Lakneswaran Krishnan">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
    <!--<link rel="stylesheet" href="styles/form.css"> -->



    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QFB7RM72X2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-QFB7RM72X2');
    </script>
    <title>Order food & drinks</title>

  </head>
  <body>
  

  <div class="container">
    <h1>Order food in restaurant "the Personal Ham Processors"</h1>
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="?food=1">Order food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?food=0">Order drinks</a>
            </li>
        </ul>
    </nav>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" class="form-control" value="<?php if(isset($_SESSION['email']))
                {echo $_SESSION['email'];}?>"/>
                <span>*<?php echo $emailErr; ?></span>
            </div>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control" value="<?php if(isset($_SESSION['street']))
                {echo $_SESSION['street'];}?>"/>
                    <span>*<?php echo $streetErr; ?></span>
                </div>
                <div class="form-group col-md-6" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <label for="streetnumber">Street number:</label>
                    <input type="text" id="streetnumber" name="streetnumber" class="form-control" value="<?php if(isset($_SESSION['streetnumber']))
                {echo $_SESSION['streetnumber'];}?>"/>
                    <span>*<?php echo $streetnumberErr; ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>p" method="post">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control" value="<?php if(isset($_SESSION['city']))
                {echo $_SESSION['city'];}?>"/>
                    <span>*<?php echo $cityErr; ?></span>
                </div>
                <div class="form-group col-md-6" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <label for="zipcode">Zipcode</label>
                    <input type="text" id="zipcode" name="zipcode" class="form-control" value="<?php if(isset($_SESSION['zipcode']))
                {echo $_SESSION['zipcode'];}?>"/>
                    <span>*<?php echo $zipcodeErr; ?></span>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Products</legend>
            <?php foreach ($products as $i => $product) { ?>
                <label>
                <input type="checkbox" value="<?php echo $product['price']; ?>|-|<?php echo $product['name']; ?>" name="product[]"/> <?php echo $product['name'] ?> -
                &euro; <?php echo number_format($product['price'], 2) ?>
            </label><br>
            <?php } ?>
        </fieldset>
        
        <label>
            <input type="checkbox" name="express_delivery" value="5" /> 
            Express delivery (+ 5 EUR) 
        </label>
            
        <button type="submit" class="btn btn-primary">Order!</button>
    </form>

    <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in food and drinks.</footer>
</div>


<style>
    footer {
        text-align: center;
    }
</style>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    <script>
    let name = document.querySelector('.name_company');
    
    const navAnim = () => {
      let move = window.scrollY;
    
      if (move > 10) {
        name.style.opacity = '0';
        name.style.pointerEvents = 'none';
      } else {
        name.style.opacity = '1';
        name.style.pointerEvents = 'all';
      }
    }
    
    window.addEventListener('scroll', navAnim)
    </script>

  </body>
</html>