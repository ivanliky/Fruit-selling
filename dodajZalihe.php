<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
      <style>

            body{
                  background-image: url("slike/zaliha.jpg");
                  background-size: cover;
                  background-repeat: no-repeat;
            }

            #zalihe{

                  background-color: rgba(63, 191, 63, 0.66);
                  width: 250px;
                  height: 245px;
                  padding: 40px;
                  margin: 0 auto;
                  margin-top: 155px;
                  

            }

            input{
                  margin-bottom: 10px;
                  height: 35px;
                  font-size: 25px;
            }

            input[type='submit']{

                  display: block;
                  margin: 0 auto;
                  margin-top: 10px;
                
                

            }

            a{
                  text-decoration: none;
                  font-size: 22px;
                  display: inline-block;
                  background-color: #ccc;
                  padding: 10px;
                  margin-top: 25px;
                  width: 117px;
                  text-align: center;
                  position: absolute;
                  left: 50%;
                  transform: translateX(-50%);
            }

            label{

                  font-size: 25px;
            }

            #AdminCentar{

                  position: relative;      
                
            }
      
      
      </style>
</head>
<body>
      

      <div id="zalihe">
  <form action="classes/Zalihe.php" method="post">
        <label for="jabuke">Dodaj jabuke:</label>
        <input type="text" name="dodajJabuke" size="3" id="jabuke"><br>
        <label for="kruske">Dodaj kruske:</label>
        <input type="text" name="dodajKruske" size="3" id="kruske"><br>
        <label for="sljive">Dodaj sljive:&nbsp;&nbsp;</label>
        <input type="text" name="dodajSljive" size="3" id="sljive"><br>
        <input type="submit" name="submit" value="Dodaj Zalihe">
  </form>
  <div id="AdminCentar"><a href="classes/Admin.php">Admin Panel</a></div>
  </div>


  </body>
</html>