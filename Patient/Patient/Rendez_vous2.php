<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient-mettre un rendez-vous</title>
    <link rel="stylesheet" href="CSS/Rendez_vous2.css">
    <?php require "connexion.php"; ?>
    <style media="screen">
        *,*:before,*:after{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            background-color: #080710;
        }
        form{
            height: 520px;
            width: 400px;
            background-color: rgba(255,255,255,0.13);
            position: absolute;
            transform: translate(-50%,-50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255,255,255,0.1);
            box-shadow: 0 0 40px rgba(8,7,16,0.6);
            padding: 35px 35px;
            margin-top: 45px;
        }
        form *{
            font-family: 'Poppins',sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }
        form h3{
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
        }

        label{
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
        }
        input{
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(255,255,255,0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        button{
            margin-top: 45px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover{
            background-color: rgba(255,255,255,0.13);
            color: white;
        }
        .social{
        margin-top: 30px;
        /* display: flex; */
        }
        .social div{
        /* background: red; */
        width: 115px;
        height: 30px;
        border-radius: 3px;
        padding: 5px 10px 10px 5px;
        background-color: rgba(255,255,255,0.27);
        color: #eaf0fb;
        text-align: center;
        }
        .social div:hover{
        background-color: rgba(255,255,255,0.47);
        cursor: pointer;
        }
        .social .fb{ 
        display: flex;
        }
        .social a{
            text-decoration: none;
            
        }

        .social img{
            display: block;
            margin-right: 10px;
            height: 20px;
        }
    </style>
</head>
<body>
    <?php $img_name=$_SESSION['photoPac'];$nomPac=$_SESSION['nompac']; ?>
    <header class="header">
		<div class="info">
			<img class='image' src="<?php echo 'Profil_Patient_img/'.$img_name; ?>">
			<p>Bonjour,<span><?php echo $nomPac; ?></span></p>
		</div>
      <ul class="main-nav">
          <li><a href="DeconnexionPac.php">Déconnexion</a></li>
      </ul>
	</header> 

    <form method="POST">
        <h3>Mettre<br>un rendez-vous</h3>

        <label for="date">Date de rendez-vous</label>
        <input type="date" name="DtR" id="date">

        <label for="time">Horaire de rendez-vous</label>
        <input type="time" name="TimeR" id="time">

        <button type="submit" name="enregistrer">Enregistrer</button>
        <div class="social">
          <!-- <div class="go"><i class="fab fa-google"></i>  Google</div> -->
          <a href="Rendez_vous.php"><div class="fb"><img src="images/flech.svg">Retour</div></a>
        </div>
    </form>

<?php
if(isset($_POST['enregistrer'])){
    $cinMed=$_GET['CinMed'];$cinPac=$_SESSION['cin'];$DtR=$_POST['DtR'];
    $TimeR=$_POST['TimeR'];
    if($DtR=="" || $TimeR=="") echo "<script>alert('Il faut remplir les champs Date et Horaire');</script>";
    else{    
        $TimeE=strtotime($TimeR);
        $Timet=date("H:i:s",$TimeE);
        $TimefinR = strtotime("-30 minute", $TimeE);
        $TimefinR=date("H:i:s", $TimefinR);
        $reqqtt=$con->query("SELECT `numrend`, `daterend`, `heurerend` FROM `rendezvous` WHERE `daterend`='$DtR' and `heurerend`>'$TimefinR' and `heurerend`<= '$Timet' and `cinmed`='$cinMed'");
        if($Ligne=$reqqtt->fetch()) echo "<script>alert('Cette horaire est déjà réservé');</script>";
        else{
        $req=$con->query("INSERT INTO `rendezvous`(`numrend`, `daterend`, `heurerend`, `cinmed`, `cinpac`) VALUES 
            (null,'$DtR','$TimeR','$cinMed','$cinPac')"); 
        echo "<script>alert('Votre rendez-vous est bien enregistré');</script>";
        }
    }
}
?>
</body>
</html>