<?php

    class Kontakt{

        public $ime; 
        public $imejl;
        private $odgovor; 
        private $adresa;
        private $subject = "Odgovor sa web sajta";
        public  $sadrzajMejla;
        private $odAdrese = "Od: ivan.mitic.10@singimail.rs";
        private $dodatnaZaglavlja = "Od: webserver@primer.com\r\n Odgovori na: ivan@primer.com";
        protected $imeImejla = [];
        protected $stalniKupci = ['marko', 'ivan', 'marija','ana'];
        protected $Pronadjenkupac;


        public function __construct(){

            $this->ime = trim(htmlspecialchars($_POST['ime']));
            $this->imejl = trim(htmlspecialchars($_POST['imejl']));
            $this->odgovor = trim(htmlspecialchars($_POST['odgovor']));
            $this->adresa = "ivanmitic91@gmail.com";
            $this->sadrzajMejla = "<b>Ime potrosaca:</b> ".
            
            str_replace("\r\n"," ",($this->ime)).
            
            "<br><b>Imejl potrosaca:</b>".
            
            str_replace("\r\n"," ",$this->imejl). 
            
            "<br> <b>Komentar potrosaca:</b> <br>". 
            
            str_replace("\r\n"," ",$this->odgovor)."<br>";


            $this->imeImejla();

            $this->proveraKupca();

            $this->posetaStalnogKupca();


        }

        protected function imeImejla(){

            $this->imeImejla = explode('@' , $this->imejl);       

        }


        protected function posetaStalnogKupca(){

            if (!empty($this->Pronadjenkupac)) {
            
                file_put_contents('posete.txt', $this->Pronadjenkupac."-",FILE_APPEND);

            
            }

    
        }


        protected function proveraKupca(){

            foreach ($this->stalniKupci as $kupac) {

                if (in_array($kupac, $this->imeImejla)) {
                
                       $this->Pronadjenkupac = $kupac;

                } 

                
            }
            
        }


    }


    $kontakt = new Kontakt;


                 
                     






