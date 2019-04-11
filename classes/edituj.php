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
    <link rel="stylesheet" href="../stylesheets/style1.css">
    <title>Admin</title>


</head>
<body>

<?php

      if (!isset($_POST['edit'])) {

          header("location: Admin.php");
           
      }  

     $igla = htmlspecialchars($_POST['edit']);
 
     
  ?>

        <h1>Tabela porudzbine</h1>     

          <table>
    <tr>
        <th>Broj porudzbine</th> 
        <th>Datum</th> 
        <th>Kolicina sljiva</th>
        <th>Kolicina krusaka</th> 
        <th>Kolicina jabuka</th>  
        <th>Postarina</th>
        <th>Ulica</th>
        <th>Grad</th>  
        <th>Ukupno za upaltu</th> 
    </tr>
    <tr>
    
   <?php
   for ($i=0; $i < count($fajl->nizPorudzbina); $i++) { 

    if (in_array($igla, $fajl->nizPorudzbina[$i])){

    echo  "<td>" . filter_var($fajl->nizPorudzbina[$i][0], FILTER_SANITIZE_NUMBER_INT) ."</td>";
    echo  "<td>" .substr($fajl->nizPorudzbina[$i][1], 35). "</td>";
    echo  "<td>" . filter_var($fajl->nizPorudzbina[$i][2], FILTER_SANITIZE_NUMBER_INT)."</td>";
    echo  "<td>" . filter_var($fajl->nizPorudzbina[$i][3], FILTER_SANITIZE_NUMBER_INT)."</td>";
    echo  "<td>" . filter_var($fajl->nizPorudzbina[$i][4], FILTER_SANITIZE_NUMBER_INT)."</td>";
    echo  "<td>" . filter_var($fajl->nizPorudzbina[$i][5], FILTER_SANITIZE_NUMBER_INT)."</td>";
    echo  "<td>" .substr($fajl->nizPorudzbina[$i][6], 24)."</td>";
    echo  "<td>" .substr($fajl->nizPorudzbina[$i][7], 23)."</td>";
    echo  "<td>" .number_format( filter_var($fajl->nizPorudzbina[$i][8], FILTER_SANITIZE_NUMBER_INT), 2)."din. </td>"; 
   } 

                 
   }

   ?>
  </tr>
  </table>

  <a href="Admin.php">&lt; Nazad na Admin panel</a>

</body>
</html>



 
  
  

