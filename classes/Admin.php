<?php
namespace Radnja\Fajl;
require 'Fajl.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="../stylesheets/style.css">
   <title>Admin</title>


</head>
<body>
   <h1>Admin panel</h1>
 
   <div id="Admin">

  <?php 
    
 Class Admin extends Fajl{

   public $zalihaSljiva;
   public $zalihaJabuka;
   public $zalihaKrusaka;
   public $zaliha1;
   public $zaliha2;
   public $zaliha3;

   // Cita iz fajla koliko ima voca u zalihama
   function Zaliha(){

         $this->zalihaSljiva = "Zaliha sljiva: ".\file_get_contents("sljive.txt");

         $this->zalihaJabuka = "Zaliha jabuka: ".\file_get_contents("jabuke.txt");

         $this->zalihaKrusaka = "Zaliha krusaka: ".\file_get_contents("kruske.txt");

   }

    // Brise fajl porudzbine.txt
   public function BrisiSvePorudzbine(){

      
             if(isset($_POST['brisi'])){
               
             unlink("$this->root/porudzbine.txt"); 

             header("location: Admin.php");
           

    }

     
  }

  // Proverava iz fajla koliko ima zaliha i upozorava ako je ostalo malo
  public function postaviUpozorenje(){
      
   $color = ($this->zaliha1 < 100) ? "red" : "green"; 
   if ($color == "red") {
      $this->zalihaSljiva = "Upozorenje:  $this->zalihaSljiva  !";
   }

   $color1 = ($this->zaliha2 < 100) ? "red" : "green"; 
   if ($color1 == "red") {
      $this->zalihaKrusaka = "Upozorenje:  $this->zalihaKrusaka  !";
   }

   $color2 = ($this->zaliha3 < 100) ? "red" : "green"; 
   if ($color2 == "red") {
      $this->zalihaJabuka = "Upozorenje:  $this->zalihaJabuka  !";
   }

 echo "<p style = \"color:$color;\" ><b>".$this->zalihaSljiva."</b></p>";
 
 echo "<p style = \"color:$color1;\" ><b>".$this->zalihaKrusaka."</b></p>";
 
 echo "<p style = \"color:$color2;\" ><b>".$this->zalihaJabuka."</b></p>";

}


 }

 $admin = new Admin;
 $admin->Zaliha();


   // Odseca tekst ispred broja i inicijalizuje atribute
   $admin->zaliha1 = substr($admin->zalihaSljiva, -4);
   $admin->zaliha2 = substr($admin->zalihaKrusaka, -4);
   $admin->zaliha3 = substr($admin->zalihaJabuka, -4);

$admin->postaviUpozorenje($admin->zaliha1, $admin->zaliha2, $admin->zaliha3);



 echo "<p>".$admin->brojPorudzbina()."</p>";

 $admin->BrisiSvePorudzbine();
 

   ?>
         <form action="" method="post">  

         <input type="submit" name="brisi" value="Brisi sve !">

         </form>
               
      <p>Prikaz pojedinacne porudzbine</p>

      <form action="edituj.php" method="post">
      
          <select name="edit">

      
   <?php 
            // Fajl.php 
  foreach ($admin->nizPorudzbina as $brojPorudzbine) {

  
   ?>
                  
                  <!-- $value[0]   Broj porudzbine -->
      <option value="<?php echo $brojPorudzbine[0]; ?>"><?php echo $brojPorudzbine[0]; ?></option>    
                    
                          
        <?php } ?>


  </select>
   <input type="submit" name="submit" value="Stampaj">
  </form>
  
  <div id="link">
  <div class="sredina"><a href="../orderform.php">Nazad na formu</a></div>
  <div class="sredina"><a href="index.php">Prikaz svih porudzbina</a></div>
  <div class="sredina"><a href="Zarada.php">Moja Zarada</a></div>
  <div class="sredina"><a href="../dodajZalihe.php">Dodaj zalihe</a></div>
  </div>
  
  </div>
  </body>
</html>