<?php


    class Kontakt{

        private $ime; 
        private $imejl;
        private $odgovor; 
        private $adresa;
        private $subject = "Odgovor sa web sajta";
        private  $sadrzajMejla;
        private $odAdrese = "Od: webserver@primer.com";


        public function __construct(){

            $this->ime = htmlspecialchars($_POST['ime']);
            $this->imejl = htmlspecialchars($_POST['imejl']);
            $this->odgovor = htmlspecialchars($_POST['odgovor']);
            $this->$adresa = "odgovor@primer.com";
            $this->sadrzajMejla = "Ime potrosaca: ".filter_var($this->ime)."\n".
                     
            "Imejl potrosaca: ".$this->imejl."\n".
    
            "Komentar potrosaca: \n".$this->odgovor."\n";


        }

            private function Mejl(){

                return mail($this->adresa, $this->sadrzajMejla, $this->odAdrese);

            }











    }
                 
                     






