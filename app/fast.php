<?php
include '../server/config.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit Card Form</title>
    <link href="https://fonts.googleapis.com/css?family=Lato|Liu+Jian+Mao+Cao&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    
    
    <div class="container" >
        
        <section class="card" id="card">

            <div class="front">

                <div class="brand-logo" id="brand-logo">
                    <!-- <img src="Img/Logos/visa.png" alt=""> -->
                </div>


                <img src="https://raw.githubusercontent.com/falconmasters/formulario-tarjeta-credito-3d/master/img/chip-tarjeta.png" class="chip">


                <div class="details">

                    <div class="group" id="number">
                        <p class="label">Card Number</p>
						<p class="number"><?php if(isset($_GET['cc'])){echo $_GET['cc'];}else{echo '#### #### #### ####';}?></p>
                    </div>


                    <div class="flexbox">


                        <div class="group" id="name">
                            <p class="label"> Card's Holder </p>
                            <p class="name"><?php if(isset($_GET['fullname'])){echo $_GET['fullname'];}else{echo 'John Doe';}?></p>
                        </div>

                        <div class="group" id="expiration">
                            <p class="label">Expiration</p>
                            <p class="expiration"> <span class="month"><?php if(isset($_GET['mm'])){echo $_GET['mm'];}else{echo 'MM';}?></span> <?php if(!isset($_GET['mm'])){echo '/';}?> <span class="year"><?php if(isset($_GET['aaaa'])){echo $_GET['aaaa'];}else if(!isset($_GET['mm'])){echo 'YY';}?></span> </p>
                        </div>


                    </div>

                </div>

            </div>


            <div class="back">


                <div class="magnetic-bar"></div>


                <div class="details">

                    <div class="group" id="signature">
                        <p class="label">Signature</p>
                        <div class="signature">
                            <p></p>
                        </div>
                    </div>


                    <div class="group" id="ccv">
                        <p class="label">CCV</p>
                        <p class="ccv"><?php if(isset($_GET['cvv'])){echo $_GET['cvv'];}?></p>
                    </div>

                </div>
                

                <p class="legend">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda dicta quos quas porro fuga, accusamus necessitatibus expedita illo, ipsum blanditiis quaerat deserunt illum minima ex distinctio veritatis aliquid, ipsam ut.</p>
                <a href="#" class="bank-link">@INNUNdev x Codepen </a>

            </div>


        </section>


        <!-- Container Button to open the form -->
        <div class="container-btn">
            <button class="btn-open-form" id="btn-open-form">
                <i class="fas fa-plus"></i>
            </button>
        </div>


        <!-- Form -->
        <form action="" id="card-form" class="card-form">

            <div class="group">
                <label for="inputNumber">Card Number</label>
                <input type="text" id="inputNumber" maxlength="19" autocomplete="off">
            </div>

            <div class="group">
                <label for="inputHolder">Card's Holder Name</label>
                <input type="text" id="inputHolder" maxlength="19" autocomplete="off">
            </div>


            <div class="flexbox">

                <div class="group expire">

                    <label for="selectMonth">Expiration</label>
                    
                    <div class="flexbox">

                        <div class="group-select">

                            <select name="month" id="selectMonth">
                                <option disabled selected> Month </option>                                
                            </select>

                            <i class="fas fa-angle-down"></i>

                        </div>


                        <div class="group-select">

                            <select name="year" id="selectYear">
                                <option disabled selected> Year </option>
                            </select>

                            <i class="fas fa-angle-down"></i>

                        </div>

                    </div>

                </div>


                <div class="group ccv">
                    <label for="inputCCV">CVV</label>
                    <input type="text" id="inputCCV" maxlength="3">
                </div>


            </div>

            <button type="submit" class="btn-submit"> Submit </button>

        </form>

        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
	    <script src="./assets/app.js"></script>

    </div>

</body>
</html>