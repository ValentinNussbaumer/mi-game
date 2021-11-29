<?php
include("connect.php");

$sql = "SELECT MAX(po) AS highscore FROM pls";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>    
      <link rel="shortcut icon" href="https://avatars.githubusercontent.com/u/83828188?v=4" type="img/vnd.microsoft.icon"/>
    <meta charset="utf-8">
    <title>V-GAME</title>
    <style>
    
body{
    background-color: black;
    text-align: center;
    font-family:arial;
    padding-top: 0px;
    font-size:20px;
    color:white;
}

h2{
    color:white;
    font-weight: normal;
    font-size: 10px;
}
    
#list{
    float: right;
    padding-right:20px;
}

#number{
    font-size:50px;
}

hs{
    font-size:25px;
    color:rgb(185, 185, 185)
}

hst{
    font-size:14px;
    color:rgb(185, 185, 185)
}

a{
    font-size:15px;
    color:grey;
}

a:hover{
    text-decoration:none;
    color:rgb(185, 185, 185)
}
    </style>
    <script type="text/javascript">

    let KEY_SPACE = false;
    let KEY_UP = false;
    let KEY_DOWN = false;
    let canvas;
    let ctx;
    let backgroundImage = new Image();
    var value = 0;
    


    let spaceshuttle = {
      x: 700,
      y: 200,
      width: 300,
      height: 100,
      src : 'img/space-shuttle.png'
    }
    let meteorits = [];
    let shots = [];


    document.onkeydown = function(e) {
      if (e.keyCode == 32){
        KEY_SPACE = true;
        e.view.event.preventDefault();

      }
      if (e.keyCode == 38){
        KEY_UP = true;
        e.view.event.preventDefault();

      }
      if (e.keyCode == 40){
        KEY_DOWN = true;
        e.view.event.preventDefault();

      }
    }
    
    document.onkeyup = function(e) {
  
      if (e.keyCode == 32){
        KEY_SPACE = false;
        e.view.event.preventDefault();
        }
      if (e.keyCode == 38){
        KEY_UP = false;
        e.view.event.preventDefault();
        
      }
      if (e.keyCode == 40){
        KEY_DOWN = false;
        e.view.event.preventDefault();
        
      }
    }


    function startGame() {
      canvas = document.getElementById("canvas");
      ctx  = canvas.getContext("2d");
      loadImages();
      setInterval(update, 1000 / 25);
      setInterval(createMeteorits, 800); 

      setInterval(checkcrashmeteorit, 1000 / 38);
      setInterval(checkForShoot, 1000 / 10);
      draw();
    }
    function checkcrashmeteorit(){
      meteorits.forEach(function(meteorit) {
        if (spaceshuttle.x + spaceshuttle.width > meteorit.x &&
            spaceshuttle.x < meteorit.x &&
            spaceshuttle.y + spaceshuttle.height > meteorit.y &&
            spaceshuttle.y < meteorit.y + meteorit.height
        ) {


    spaceshuttle.img.src = 'img/space-shuttle-glow.png'
    spaceshuttle.width = 250;
    spaceshuttle.height = 250;
    setTimeout(function(){ 
    spaceshuttle.y = spaceshuttle.y + 15;
    }, 300);
    
    fc();    
    }


                shots.forEach(function(shot) {

                    if (shot.x + shot.width > meteorit.x &&
                        shot.y + shot.height > meteorit.y &&
                        shot.x < meteorit.x &&
                        shot.y < meteorit.y + meteorit.height
                    ) {

                        meteorit.img.src = 'img/boom.png';
                        console.log('!!!');

                            value++;
                           document.getElementById('number').innerHTML = value;
                           document.getElementById('po').value = value;

                        setTimeout(() => {
                            meteorits = meteorits.filter(u => u != meteorit);
                        }, 25);

                    }
            });
        });
    }


function createMeteorits() {
let meteorit = {
  x: -80,
  y: Math.random() * 550,
  width: 100,
  height: 80,
  src: 'img/metorid.png',
  img: new Image()
};

meteorit.img.src = meteorit.src;
meteorits.push(meteorit);
}

function checkForShoot() {
    if (KEY_SPACE) {
        let shot = {
            x: spaceshuttle.x + -20,
            y: spaceshuttle.y + 60,
            width: 20,
            height: 4,
            src: 'img/shot.png',
            img: new Image()
        };
        
        shot.img.src = shot.src;
        shots.push(shot);
    }
}

    function update() {
      if (KEY_UP) {
        spaceshuttle.y -= 9;
      }
      if(KEY_DOWN) {
        spaceshuttle.y += 9;
      }
      
      if(KEY_SPACE) {
      shots.y += 5;
      }

    
    meteorits.forEach(function(meteorit){
        
        if(value < 10){
        meteorit.x += 4;
        }
        
        else{
        
        if(value < 20){
        meteorit.x += 10;
        }
        
        else{
        if(value < 30){
        meteorit.x += 15;
        }
        else{
        meteorit.x += 25;
        }
        }}
        
 
        
        

  });
  shots.forEach(function(shot) {
      shot.x -= 15;
  });
   }


    function loadImages(){
      backgroundImage.src = 'img/weltall.jpeg';
      spaceshuttle.img = new Image();
      spaceshuttle.img.src = spaceshuttle.src;

}


    function draw() {
        ctx.drawImage(backgroundImage, 0, 0);
        
        ctx.drawImage(spaceshuttle.img, spaceshuttle.x, spaceshuttle.y, spaceshuttle.width, spaceshuttle.height);

        meteorits.forEach(function(meteorit) {
            ctx.drawImage(meteorit.img, meteorit.x, meteorit.y, meteorit.width, meteorit.height);
        });
        shots.forEach(function(shot) {
            ctx.drawImage(shot.img, shot.x, shot.y, shot.width, shot.height);
        });


        requestAnimationFrame(draw);


}

    </script>
  </head>
  <body onload="startGame()">

      <?php 
      echo '<h3 id="q" style="font-size:16px; text-align:left;">Username: ' .$_POST['usn']. '</h3>
      <form id="form" action="dead.php" method="post">
      <input type="hidden" name="usn" value="' .$_POST['usn']. '">
      <input id="po" type="hidden" name="points" value="0">

      </form>
     '; ?>
      
<canvas id="canvas" width="1024" height="588"></canvas> 
<h1 id="number">0</h1>

 <script>
     function fc(){
         document.getElementById("form").submit();
     }
 </script>
<?php
echo '<hs>' .$row['highscore']. '</hs>';
?>
<br>
<hst>HIGHSCORE</hst> <br>
<a href="list.php">RANGLISTE ANSEHEN</a>
<br> <br> <br> 
<h2>©Valentin Nussbaumer 2021</h2>


</html>
