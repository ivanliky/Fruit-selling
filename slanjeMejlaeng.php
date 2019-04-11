<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>


    <style>


        body {

            background-color: #ccc;

        }

        #wrapper {

            width: 1500px;
            background-color: #eee;
            margin: 0 auto;
        }

        #slika1{

            width: 600px;
            height: 400px;
            background-color: #ccc;
            background-image: url("slike/voce.gif");
            background-repeat: no-repeat;
            display: inline-block;
            float: left;

          }

          
        #slika2{

            width: 600px;
            height: 400px;
            background-color: #ccc;
            background-image: url("slike/pomorandza.gif");
            background-repeat: no-repeat;
            display: inline-block;
            float: right;
            background-position: top right;

             }
    
        #centar{

            width: 300px;
            height: 500px;
            margin: 0 auto;
            margin-top: 100px;
            float: left;
        }

        input {

            font-size: 20px;
            width: 300px;
            height: 30px;
            margin-bottom: 10px;
            margin-top: 5px;
            
        }

        textarea {

            width: 296px;
            font-size: 20px;
            
        }

        label {
            
            font-size: 30px;

        }

        p {
            font-size: 20px;
        }

        #najvece {

            font-size: 40px;
        }

        a {

            text-align: center;
            width: 300px;
            display: inline-block;
            font-size: 30px;
            text-decoration: none;
        }


    
    </style>
</head>

<body>
    

        <div id="wrapper">
     <div id="slika1"></div>
    
    <div id="centar">
         <p id="najvece">Customer question</p>

        

        <p>Please tell your opinion</p>

        <form action="../book/phpmailer/index.php" method="post">

            <label for="ime">Your Name</label><br>
            <input type="text" name="ime" id="ime"><br>
            <label for="imejl">Your Email</label><br>
            <input type="text" name="imejl" id="imejl"><br>
            <label for="odgovor">Your Question</label><br>
            <textarea name="odgovor" id="odgovor" cols="30" rows="10"></textarea><br>
            <input type="submit" name="submit" value="Send a question">


        </form>
        <a href="orderformEng.php">Back to form</a>

        <?php 


                if ( isset($_GET['uspesno']) && $_GET['uspesno'] == 1 )
                {
                   
                    echo "<p>The message was successfuly delivered</p>";

                    
                } 
        
        ?>


    </div>

     <div id="slika2"></div>

     
    </div>
    


</body>

</html>