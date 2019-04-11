<?php

    class Zalihe {

        protected $BrojJabuka;
        protected $BrojKrusaka;
        protected $BrojSljiva;
        


                    public function __construct(){

                        

                        if (isset($_POST['submit'])) {

                            $this->DodajZalihe();
                        }

                        
                            $this->pisiZalihe();
                        
                        
                    }
            


                public function DodajZalihe(){

                    $this->BrojJabuka = (int)htmlspecialchars($_POST['dodajJabuke']) + (int)\file_get_contents("jabuke.txt");
                   
                    $this->BrojKrusaka = (int)htmlspecialchars($_POST['dodajKruske']) + (int)\file_get_contents("kruske.txt");
                
                    $this->BrojSljiva  = (int)htmlspecialchars($_POST['dodajSljive']) + (int)\file_get_contents("sljive.txt");


                }    


                public function pisiZalihe(){

                    file_put_contents("jabuke.txt", $this->BrojJabuka);
                    file_put_contents("kruske.txt", $this->BrojKrusaka); 
                    file_put_contents("sljive.txt", $this->BrojSljiva);         



                }

               

    }

            

    $zalihe = new Zalihe;

    header("location: Admin.php");



    