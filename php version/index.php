
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <title>V-GAME</title>

    <style media="screen">
        *{
            margin:0px;
            text-align:center;
            font-family:arial;
            color:white;
            background-color: black;
            }
 
        .centered{
            width:100vw;
            margin-top:25vh;
            height:50vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction:column;
            }

            #username{
                border:solid;
                border-color:rgb(136, 121, 121);
                background-color: rgb(56, 50, 50);
                color:white;
                font-size:20px;
                padding:15px 4vw;
                width:30vw;
            }
            #submit{
                border:solid;
                border-color:rgb(78, 0, 0);
                background-color: rgb(204, 4, 4);
                color:white;
                font-size:20px;
                padding:10px 20px;
                cursor: pointer;
            }
            form{
                position:absolute;
                bottom:30px;
                left:31.2vw;

            }
            
            #titel{
                font-size:50px;
            }
            
            #suptitle{
                font-size:20px; 
                color:#d1d1d1;
            }
            
            a{
                color:grey;
                text-decoration:none;
            }
            
            a:hover{
                color:#d1d1d1;
            }
            
            
    </style>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="centered">
        <p id="titel">
          WELCOME TO THE V-GAME!
      </p> <br>
      <p id="suptitel">
        Try to destroy the meteorites! 
        <br><br>
        <a href="list.php">VIEW RANKING</a> 
        <br> <br>
        </p><br>
 </div>
 <br>       
 <form id="form" method="post" action="game.php">
     <input id="username" type="text" placeholder=" Enter Username" required name="usn"> <br><br>
     <input id="submit" type="submit" value="START GAME" name="submit">
     </form>
  </body>
</html>

