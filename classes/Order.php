<?php
namespace Radnja\Narudzbenica; 
use Radnja\Fajl\Fajl;
session_start();


require 'Fajl.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../stylesheets/style4.css">
</head>
<body>

    <div id=wrapper>
    <h1>Porudzbenica</h1>

   
<?php
    class Narudzbenica extends Fajl{

        

        protected $kolicinaSljiva;  //unos korisnika
        protected $kolicinaKrusaka; //unos korisnika
        protected $kolicinaJabuka;  //unos korisnika
        protected $adresa;
        protected $ukupno = 0;
        public $cena = 0.00;
        private $taksa;
        protected $datum;
        const JABUKE = 40;
        const SLJIVE = 20;
        const KRUSKE = 70; 
        public $increment = 0;
        public $naslov = "";
        public $grad;
        public $postarina;
        protected $kursEvra;
        //public $nizInkrement = [];
        public $zalihaSljiva;   //fajl
        protected $zalihaKrusaka; //fajl
        protected $zalihaJabuka;  //fajl
        protected $stanjeKrusaka; 
        protected $stanjeJabuka;
        public $stanjeSljiva;
        public $razlika;

                

             //provera unosa korisnika #1    
             private function proveriPost(){

                if (empty($this->kolicinaSljiva) && empty($this->kolicinaKrusaka) && empty($this->kolicinaJabuka)) {

                    echo "<a href='../orderform.php'>&lt; Nazad za ispravku</a><br><br>";

                    echo "<img src='../slike/korpa.jpg'><br><br>";

                    die("<b>Korpa je prazna!</b>");

                } 

                if(!filter_var($this->kolicinaJabuka, FILTER_VALIDATE_INT) and (!empty($this->kolicinaJabuka))){

                    die("Unesite samo numericke karaktere za jabule!"); 
                 }

                 if(!filter_var($this->kolicinaKrusaka, FILTER_VALIDATE_INT) and (!empty($this->kolicinaKrusaka))){

                    die("Unesite samo numericke karaktere za kruske!"); 
                 }

                 if(!filter_var($this->kolicinaSljiva, FILTER_VALIDATE_INT) and (!empty($this->kolicinaSljiva))){

                    die("Unesite samo numericke karaktere za sljive!"); 
                 }

                 if(empty($this->adresa)){

                    echo "<a href='../orderform.php'>&lt; Nazad za ispravku</a><br><br>";
                    die("<p class = 'error'>Adresa je obavezna!</p>"); 
                 }



            }

             public function upisiZaradu(){

              
              $this->fp = fopen("$this->root/zarada.txt", 'ab');

  
              if(!$this->fp){
  
                  die("Greska u pisanju fajla!");
  
              }else {
  
  
                  flock($this->fp, LOCK_EX);
  
                  fwrite($this->fp, $this->cena.",");
      
                  flock($this->fp, LOCK_UN);
      
                  fclose($this->fp);
  
                  echo "<br><br>Zarada upisana u fajl! na lokaciji: <b>".$this->root."/zarada.txt</b>";
                  
              }
  
          }

            
                private function Postarina(){

                        switch ($this->grad) {
                         
                            case 'Novi Sad':
                                $this->postarina = 200;
                                break;
                            case 'Nis':
                                $this->postarina = 500;
                                break;
                            
                            default:
                            $this->postarina = 0;
                                break;
                        }



                }

                //broji porudzbine
                public function increment(){

 if(($_POST['submit']) && (!empty($_POST['kolicinaSljiva'])) || (!empty($_POST['kolicinaJabuka'])) || (!empty($_POST['kolicinaKrusaka']))){
                        
                        
                      if(!isset($_SESSION['increment'])){

                        $_SESSION['increment'] = 1;

                      }else{

                        
                        $_SESSION['increment'] += 1;
                        
                     

                            }
                        

                    }
            
                    if(isset($_SESSION['increment'])){     

                    $this->increment = $_SESSION['increment'];

                    //$nizInkrement[] = $_SESSION['increment'];

                    }

                
                    
                }

            

              // kalkulacija cene i ispis       
              private function Cena($taksa = 0.10){

                $this->cena  = (self::JABUKE * (int)$this->kolicinaJabuka) + (self::KRUSKE * (int)$this->kolicinaKrusaka) + (self::SLJIVE * (int)$this->kolicinaSljiva) + $this->postarina;

                echo "<h2>Cena:</h2>";

    echo " Bez PDV-a: <b>".number_format($this->cena, 2)."</b> din. ili <b>".number_format($this->cena/$this->kursEvra, 2)."</b> eura<br>";

                $this->taksa = $taksa;

                $this->cena = $this->cena * (1 + $this->taksa);

                 echo "<br>";
                 echo "Postarina: <b>$this->postarina </b> din. ili<b> ". number_format($this->postarina / $this->kursEvra, 2). "</b> eura";   
                 echo "<br><br>";
                 echo "Ukupno sa PDV-om i postarinom:<b> ".number_format($this->cena, 2)."</b> din. ili <b>".number_format($this->cena/$this->kursEvra, 2)."</b> eura<br>";
              }
              // tekuci kurs evra, 2. opcioni argument u konstruktoru
              private function KursEvra($kurs = 121){

                $this->kursEvra = $kurs;    

              }

              private function kolicinaSljiva(){
                  if(empty($this->kolicinaSljiva)){ $this->kolicinaSljiva = 0;}
                echo "Kolicina sljiva: <b>".$this->kolicinaSljiva."</b><br>";
            }
           private function kolicinaKrusaka(){
            if(empty($this->kolicinaKrusaka)){ $this->kolicinaKrusaka = 0;}
                echo "Kolicina krusaka: <b>".$this->kolicinaKrusaka."</b><br>";
            }

           private function kolicinaJabuka(){
            if(empty($this->kolicinaJabuka)){ $this->kolicinaJabuka = 0;}
                echo "Kolicina jabuka: <b>".$this->kolicinaJabuka."</b><br>";
            }
            private function adresa(){
                echo "Adresa: <b>".$this->adresa."</b><br>";
            }



            function Zalihe(){

                $this->zalihaSljiva = \file_get_contents("sljive.txt");
       
                $this->zalihaJabuka = \file_get_contents("jabuke.txt");
       
                $this->zalihaKrusaka = \file_get_contents("kruske.txt");
       
          }


            public function ZalihaSljiva(){
                $this->stanjeSljiva =  (int)$this->zalihaSljiva - (int)$this->kolicinaSljiva;
               
            }
           private function ZalihaKrusaka(){
            $this->stanjeKrusaka = (int)$this->zalihaKrusaka - (int)$this->kolicinaKrusaka;
            }

           private function ZalihaJabuka(){
            $this->stanjeJabuka = (int)$this->zalihaJabuka - (int)$this->kolicinaJabuka;
            }

            public function pisiZalihe(){

                file_put_contents("jabuke.txt", $this->stanjeJabuka);
                file_put_contents("kruske.txt", $this->stanjeKrusaka); 
                file_put_contents("sljive.txt", $this->stanjeSljiva);         



            }


            //proverava zalihe
            
            public function proveraZaliha(){

                    if ($this->stanjeSljiva < 0 || $this->stanjeKrusaka < 0 || $this->stanjeJabuka < 0) {

                        echo "<p style= 'color: red; font-size: 25px;'>Nazalost trenutno nemamo tu kolicinu u zalihama</p>";
                        echo "<p style= 'color: red; font-size: 25px;'>Ostalo u zalihama:</p>"; 

                            if ($this->zalihaSljiva < $this->kolicinaSljiva) {
                                echo "<p style= 'color: red; font-size: 25px;'><b>Sljive ($this->zalihaSljiva)</b> </p>";
                            }else{

                                echo "<p><b>Sljive ($this->zalihaSljiva)</b> </p>";
                            }
                            if ($this->zalihaKrusaka < $this->kolicinaKrusaka) {
                                echo "<p style= 'color: red; font-size: 25px;'><b>Kruske ($this->zalihaKrusaka)</b> </p>";
                            }else{

                                echo "<p><b>Kruske ($this->zalihaKrusaka)</b> </p>";
                            }
                            if ($this->zalihaJabuka < $this->kolicinaJabuka) {
                                echo "<p style= 'color: red; font-size: 25px;'><b>Jabuke ($this->zalihaJabuka)</b> </p>";
                            }else{

                                echo "<p><b>Jabuke ($this->zalihaJabuka)</b> </p>";
                            }
                            
                             
                           echo "<a href='../orderform.php'>&lt; Nazad na ispravku porudzbine</a>"; 

                          die("<p style= 'color: red';>To je sve sto mozete trenutno da narucite, 
                          ocekujte uskoro vise na zalihama</p>");
                    }



            }

               
           
            // ispisuje datum na srpsi jezik    
            private function datum(){

                $danUNedelji    = date("l");
                $danUMesecu = date("j");
                $mesec  = date("F");
                $godina   = date("Y");
                
                switch($danUNedelji)
                {
                    case "Monday":    $danUNedelji = "Ponedeljak";  break;
                    case "Tuesday":   $danUNedelji = "Utorak"; break;
                    case "Wednesday": $danUNedelji = "Sreda";  break;
                    case "Thursday":  $danUNedelji = "Cetvrtak"; break;
                    case "Friday":    $danUNedelji = "Petak";  break;
                    case "Saturday":  $danUNedelji = "Subota";  break;
                    case "Sunday":    $danUNedelji = "Nedelja";  break;
                    default:          $danUNedelji = "Nepoznato"; break;
                }
                
                switch($mesec)
                {
                    case "January":   $mesec = "Januar";    break;
                    case "February":  $mesec = "Februar";   break;
                    case "March":     $mesec = "Mart";     break;
                    case "April":     $mesec = "April";     break;
                    case "May":       $mesec = "Maj";       break;
                    case "June":      $mesec = "Jun";      break;
                    case "July":      $mesec = "Jul";      break;
                    case "August":    $mesec = "Avgust";    break;
                    case "September": $mesec = "Septembar"; break;
                    case "October":   $mesec = "Oktobar";   break;
                    case "November":  $mesec = "Novembar";  break;
                    case "December":  $mesec = "Decembar";  break;
                    default:          $mesec = "Nepoznato";   break;
                }
                date_default_timezone_set('Europe/Belgrade');
                $this->datum = $danUNedelji . " , " . $danUMesecu . ". " . $mesec. ", " . $godina.". u ".date("H:i:s");
                
            }

            // racuna popust u odnosu na kolicinu
            private function Popust(){
                    
               if ($this->ukupno < 10 ) {

            echo "<h3>Dodajte jos u korpi za popust!</h3>";

              }elseif($this->ukupno < 20){

            echo "<b>Ostvarili ste 10% popusta</b>";
        
            $this->cena -= (( 10 / 100) * $this->cena); 

            }elseif($this->ukupno < 40){

             echo "<b>Ostvarili ste 20% popusta</b>";
    
             $this->cena -= (( 20 / 100) * $this->cena); 

             } elseif($this->ukupno < 70){

             echo "<b>Ostvarili ste 30% popusta</b>";
    
             $this->cena -= (( 30 / 100) * $this->cena); 

              }elseif($this->ukupno < 100){

             echo "<b>Ostvarili ste 40% popusta</b>";
    
             $this->cena -= (( 40 / 100) * $this->cena); 

             }elseif($this->ukupno > 100){

              echo "<b>Ostvarili ste 50% popusta</b>";
    
              $this->cena -= (( 50 / 100) * $this->cena); 
              }
      }

            


             // inicijalizacija   
             public function __construct($taksa = 0.10){

                   
                    $this->datum();
                    echo $this->datum;

                    echo "<br><br>";

                    $this->root = htmlspecialchars($_SERVER['DOCUMENT_ROOT']);    
                    $this->kolicinaSljiva = \htmlspecialchars($_POST['kolicinaSljiva']);
                    $this->kolicinaKrusaka = \htmlspecialchars($_POST['kolicinaKrusaka']);
                    $this->kolicinaJabuka = \htmlspecialchars($_POST['kolicinaJabuka']);
                    $adresa = \htmlspecialchars($_POST['adresa']);
                    $this->adresa = preg_replace('/\t | \R/',' ', $adresa);  
                    $this->grad = \htmlspecialchars($_POST['grad']);
                  

                       
                        $this->Zalihe();
                        $this->proveriPost(); 
                        $this->kolicinaJabuka();
                        $this->kolicinaSljiva();
                        $this->kolicinaKrusaka();
                        $this->ZalihaSljiva();
                        $this->ZalihaJabuka();
                        $this->ZalihaKrusaka();
                        $this->proveraZaliha(); //provera
                        $this->ukupno = (int)$this->kolicinaSljiva + (int)$this->kolicinaKrusaka + (int)$this->kolicinaJabuka;
                        $this->KursEvra(); 
                        $this->Postarina();
                        $this->increment();
                        $this->adresa();
                        echo "<br>";
                        $this->Popust();
                        $this->Cena($taksa);
                        $this->string();
                        $this->pisiUfajl();
                        $this->upisiZaradu();
                        
                       
                        $this->pisiZalihe();
                       
                
                    
                    echo "<p>Ukupno naruceno artikala:<b> " .$this->ukupno."</b></p>";

                    
                
             }    
    }

    $order = new Narudzbenica();
 
  

    ?>


    
        <a href="../orderform.php">Nazad na formu</a><br>
        <a href="Admin.php">Admin Panel</a>
        

    

       </div> 
      </body>
     </html>

  
    

    
  
   
    
    
   

 
