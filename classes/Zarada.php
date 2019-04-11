<?php
namespace Radnja\Zarada;

    class Zarada{

        private $zarada;

        private $najvecaPorudzbina;


        function __construct(){

            $this->root = htmlspecialchars($_SERVER['DOCUMENT_ROOT']);

            

            $this->MojaZarada();

            $this->ProveriNovcanik();
            
            
            
        }

        public function najvecaPorudzbina(){

            echo "<br>Najvrednija porudzbina iznosi: <br><br>".number_format($this->najvecaPorudzbina, 2)." din.";
        }

       protected function MojaZarada(){

            //privremeno
            @ $zarada = file("$this->root/zarada.txt");

            @ $zarada = implode(',', $zarada);

            $zarada = explode(',', $zarada);

            $this->najvecaPorudzbina = max($zarada);

            $this->zarada = array_sum($zarada);
           

       }

       function ProveriNovcanik(){

            if(empty($this->zarada)){

                echo "<a href='Admin.php'>Nazad na Admin Panel</a><br><br>";

                die("Nema nista u novcaniku");
            }

       }

       public function Cestitaj(){

           if($this->zarada > 1000000){

                echo "<style>
                    body{

                        background-image: url(../slike/milioner.gif);
                        background-repeat: no-repeat;
                        background-position: center;
                    }

                </style>";

                echo "<h1>Ti si milionerrrrrr!</h1>";

                

           }

       }

       public function __invoke(){

           return "Moja zarada: ".number_format($this->zarada, 2)." Din.";

       }


    }

    $zarada = new Zarada;

    $zarada->Cestitaj();

    ?>
 

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>

       <link rel="stylesheet" href="../stylesheets/style5.css">
    </head>
    <body>
        
            <div id="centriraj">

                  <?php 
                  
                  echo $zarada();
                    echo "<br>";
                  echo $zarada->najvecaPorudzbina();
                   echo "<br>";
                  
                  ?>  


            <br><br><br>
          <a href="Admin.php">Nazad na Admin Panel</a>


            </div>


    </body>
    </html>
  
    

     