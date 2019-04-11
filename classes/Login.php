<?php

    class Login{

            private $ime = "Ivan";
            private $sifra = 123;


            function __construct(){

                if (htmlspecialchars($_POST['ime']) == $this->ime && htmlspecialchars($_POST['sifra']) == $this->sifra) {
                    
                                header("location: Admin.php");


                }else{

                    header("location: ../loginform.php");

                }

            }





    }

    $login = new Login;