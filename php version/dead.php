
    <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style>
*{text-align:center;
background-color:black;}
    html a:hover{cursor: url('decode-cursor.png'), auto;}
      *{margin:0px;
      font-family:MONACO;
      color:white;
    }
    p{text-align:center;}
    .css-typing p {
      border-right: .15em solid red;
      font-family: "Arial";

      white-space: nowrap;
      overflow: hidden;
      text-align:center;
    }

    .css-typing p:nth-child(1) {
      width: 6em;
      -webkit-animation: type 2s steps(40, end);
      animation: type 2s steps(40, end);
      -webkit-animation-fill-mode: forwards;
      animation-fill-mode: forwards;
    }

    .css-typing p:nth-child(2) {
      width: 7em;
      opacity: 0;
      -webkit-animation: type2 2s steps(20, end);
      animation: type2 2s steps(20, end);
      -webkit-animation-delay: 2s;
      animation-delay: 2s;
      -webkit-animation-fill-mode: forwards;
      animation-fill-mode: forward;

    }



    @keyframes type {
      0% {
        width: 0;
      }
      99.9% {
        border-right: .15em solid orange;
      }
      100% {
        border: none;
      }
    }

    @-webkit-keyframes type {
      0% {
        width: 0;
      }
      99.9% {
        border-right: .15em solid orange;
      }
      100% {
        border: none;
      }
    }



    @keyframes blink {
      50% {
        border-color: transparent;
      }
    }
    @-webkit-keyframes blink {
      50% {
        border-color: tranparent;
      }
    }
    .centered {
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
}

#aq{
    font-size:0px;
}
#ab{
    font-size:0px;
}

    </style>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body bgcolor=black;>
    <div class="centered"><div class="css-typing">
        <p style="font-size:65px;">
          GAME OVER
      </p> <br>
    </div> </div>
        <?php
    echo '<div id="aq">' .$_POST['usn']. '</div>';
    echo '<div id="ab">' .$_POST['points']. '</div>';
    ?>
    
    <form id="form" action="process.php" method="post">
        <input type="hidden" name="usni"  id="usni" value="anonym">
        <input type="hidden" name="poi"  id="poi" value="?">
    </form>
        <script>
        var q = document.getElementById("aq").innerHTML;
        document.getElementById("usni").value = q;
        
        var qb = document.getElementById("ab").innerHTML;
        document.getElementById("poi").value = qb;
        
    
    setTimeout(function(){ document.getElementById("form").submit(); }, 3000);
    </script>


  </body>
</html>

