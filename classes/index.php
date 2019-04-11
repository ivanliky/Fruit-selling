<?php //require_once 'Order.php'; 
      require_once 'Fajl.php'  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            background-image: url(../slike/adminCover.jpg);
        }

        #box {
            background-color: #eee;
            width: 500px;
            margin: 0 auto;
            padding: 30px;
        }

        h1 {
            text-align: center;
        }

        a{

            display: inline-block;
            background-color: #ccc;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 20px;
            font-size: 30px;
            text-decoration: none;

        }
    
    </style>
</head>
<body>
  
<ul>
    <li><a href="../orderform.php">Nazad na formu</a></li>
    <li><a href="Admin.php">Admin Panel</a></li>
</ul>

<div id="box">
<h1>Procitano iz fajla</h1>
<?php $fajl->citajIzFajla(); ?>
</div>

</body>
</html>