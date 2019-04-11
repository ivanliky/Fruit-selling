<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>
    <style>

        #wrapper {
            width: 500px;
            margin: 0 auto;
            margin-top: 28px;
            overflow: hidden;
            background-color: rgba(0,0,0,0.6);
            position: relative;
            height: 750px;
           
        }

        body {
            background-image: url(slike/voce.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }

        input {
            width: 180px;
            height: 30px;
            margin: 0px 5px 16px 5px;
            font-size: 20px;
           
          
        }

        input:nth-child(1), input:nth-child(2),input:nth-child(3){
            margin: 0px 35px 44px 70px;
            width: 70px;
            height: 40px;
            display: block;
            font-size: 40px;
        }

        #artikal {
            width: 250px;
            float: left;

        }

        #kolicina {
            width: 200px;
            float: left;

        }

        p {
            text-align: center;
            font-size: 40px;
            color: #fff;
        }

       

        select {
            width: 90%;
            margin: 34px 5% 0 5%;
            height: 30px;
            font-size: 24px;
        }

        input[type='submit']{

            width: 150px;
            height: 40px;
            font-size: 24px;
            margin-top: 89px;
            position: absolute;
            left: 175px;
           
        }


        .dugme{

                padding: 15px;
                background-color: rgba(0,0,0,0.6);
                text-decoration: none;
                color: #fff;
                outline: 2px solid black;
                outline-radius: 100px;
                outline-offset: 5px;
                

        }

        #mejl {

            position: absolute;
            width: 100%;    
            bottom: 5px;
            text-align: center;
            background-color: #eee;
           
        }

        #mejl a {
            text-decoration: none;
        }


        #desnaSlika{

            position: absolute;
            right: 50px;
            bottom: 150px;

        }
   

    </style>
</head>

<body>
    <div id="wrapper">

                <div id="artikal">
                <p>Article</p>
                
                <p>Apple</p>
               
                <p>Pear</p>
              
                <p>Plum<p>

                <p>Street</p>

                <p>City</p>
               
                
                </div>

                <div id="kolicina">
                
                <p>Quantity</p>

                <form action="classes/Order.php" method="post">
                <input type="text" name="kolicinaJabuka"  maxlength="3" id="jabuka">
                <input type="text" name="kolicinaKrusaka"  maxlength="3" id="kruska">
                <input type="text" name="kolicinaSljiva"  maxlength="3" id="sljiva">
    
                <input type="text" name="adresa" size="20" maxlength="80">
            
            
                
                <select name="grad" id="grad">
                    <option value="Beograd">Beograde</option>
                    <option value="Novi Sad">Novi Sad</option>
                    <option value="Nis">Nis</option>
                </select>
                
                <a href="orderform.php"><img src="slike/srbija.png" id="desnaSlika" alt="" width="60px;"></a>

                <input type="submit" name="submit" value="Checkout"><br>
            
              </form>

            
              </div>

              <p id="mejl"><a href="slanjeMejlaeng.php">Ask a question</a></p>
              
    </div>

<P> <a class="dugme" href="loginform.php">Admin Panel</a></P>

</body>

</html>