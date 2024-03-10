<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>creation de compt</title>
    <link rel="stylesheet"  href="css/util.css">
	<link rel="stylesheet"  href="css/med.css">
    <link rel="icon" type="image/png" href="../Login_v16/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="../Login_v16/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
</head>

<body>
	<div class="limiter">
    <div class="container-login100" style="background-image:url('../Login_v16/images/med9.jpg');">
        <div class="wrap-login100 p-t-30 p-b-50" >
            <span class="login100-form-title p-b-41">
                Account ADMIN
            </span>
            <form class="login100-form validate-form p-b-33 p-t-5" method="post">

                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input class="input100" type="text" name="cinmed" id="cinmed" 
                        placeholder="CIN" >
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input  class="input100 " type="password" name="passwmed" id="passwmed" 
                    placeholder="Password ">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>
                <div style="display:flex;">
                    <div class="container-login100-form-btn m-t-32">
                        <button  type="submit" name="login" class="login100-form-btn" >
                        Login
                        </button>   
                    </div>
                    
                </div>
                <div><a href="oublier.php">Oublier le Mots de Pass!!</a></div>
                
            </form>
        </div>
    </div>
	</div>
</body>
</html>