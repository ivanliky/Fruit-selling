<?php
namespace Radnja\Fajl;
     class Fajl { 

        protected $fp;
        protected $root;
        protected $string;
        public $procitano;
        public $nizPorudzbina;
        public $brojPorudzbina;
      
        

        function __construct(){

            $this->root = htmlspecialchars($_SERVER['DOCUMENT_ROOT']);
              
        }
   
           // Otvara fajl , proverava da li postoji i pise string iz metoda 
        protected function pisiUfajl(){

        
            $this->fp = fopen("$this->root/porudzbine.txt", 'ab');

            if(!$this->fp){

                die("Greska u pisanju fajla!");

            }else {


                flock($this->fp, LOCK_EX);

                fwrite($this->fp, $this->string);
    
                flock($this->fp, LOCK_UN);
    
                fclose($this->fp);

                echo "<br><br>Porudzbina upisana u fajl na lokaciji: <b>".$this->root."/narudzbine.txt</b>";
                
            }

        }

        

          public function brojPorudzbina(){

            if(!file_exists("$this->root/porudzbine.txt")){

               fopen("$this->root/porudzbine.txt", 'w');

            }

            $this->nizPorudzbina = file("$this->root/porudzbine.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        
            $filter = (array_filter($this->nizPorudzbina));


            $niz = [];
        
            foreach ($filter as $key => $value) {
        
                if(strlen($value) < 10){
                    continue;
                }
        
            
                   $niz[] = $value;
                
            }

         
            $this->nizPorudzbina = array_chunk($niz, 9);


            $this->brojPorudzbina = count($this->nizPorudzbina);

        
             return "Do sada ukupno: ". $this->brojPorudzbina ." porudzbina";

        }



        public function Prikaz(){

                for ($red=1; $red < $this->brojPorudzbina; $red++) { 

                    
                        for ($kolona=0; $kolona < 9; $kolona++) { 
  
                                echo $this->nizPorudzbina[$red][$kolona]."<br>";
                        }

                        echo "<br>";

                }

                   

        }
        

        public function citajIzFajla(){

            $this->fp = fopen("$this->root/porudzbine.txt", 'rb');

        
            if (!$this->fp) {

                echo "Nema tekucih porudzbina";

                exit;
            }

            flock($this->fp, LOCK_SH); // onemogucava citanje 

            while(!feof($this->fp)) {

                $orders = fgets($this->fp);

                echo htmlspecialchars($orders)."<br>";

            }

            flock($this->fp, LOCK_UN); // omogucava citanje

            fclose($this->fp);

        }




        protected function string(){   
       

        $this->string = "
        $this->naslov

        Broj porudzbine: $this->increment
        Datum i vreme narucivanja: $this->datum
        Kolicina sljiva: $this->kolicinaSljiva
        Kolicina krusaka: $this->kolicinaKrusaka
        Kolicina jabuka: $this->kolicinaJabuka
        Postarina: $this->postarina din.
        Ulica narucioca: $this->adresa 
        Grad narucioca: $this->grad
        Ukupno za uplatu: $this->cena din. \n
        
        ";


        }
     
    }


    $fajl = new Fajl;

    $fajl->brojPorudzbina();



  

 

   

   
   



    


  