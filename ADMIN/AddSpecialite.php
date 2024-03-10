<!doctype html>
<html lang="en">
  <head>
  	<title>Ajouter une spécialité</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/addSpecialite.css">
	<?php require "conexionadmin.php"; ?>
</head>
<body>
	<section class="ftco-section">
		<div class="container">
			<!-- <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"></h2>
				</div>
			</div> -->
		<div class="row justify-content-center">
			<div class="col-lg-10">
				<div class="wrapper img" style="background-image: url(imageadmin/med5.jpg);">
					<div class="row">
						<div class="col-md-9 col-lg-7">
							<div class="contact-wrap w-100 p-md-5 p-4">
								<h3 class="mb-4">Ajouter une nouvelle spécialité</h3>
											<!-- <div id="form-message-warning" class="mb-4"></div>  -->
									<!-- <div id="form-message-success" class="mb-4">
									Your message was sent, thank you!
									</div> -->
								<form method="POST" id="contactForm" name="contactForm" class="contactForm">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="label" for="name">Code Spécialité</label>
												<input type="number" class="form-control" name="code" id="name" placeholder="Code Spécialité">
											</div>
										</div>
										<div class="col-md-6"> 
											<!-- <div class="form-group">
												<label class="label" for="email">Email Address</label>
												<input type="email" class="form-control" name="email" id="email" placeholder="Email">
											</div> -->
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="label" for="subject">Le nom de spécialité</label>
												<input type="text" class="form-control" name="lebel" id="subject" placeholder="Le nom de spécialité">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="label" for="#">Présentation de la spécialité</label>
												<textarea name="presentation" class="form-control" id="message" cols="30" rows="4" placeholder="Présentation de la spécialité" maxlength="590"></textarea>
											</div>
										</div>
										<div class="col-md-12" style="display:flex;justify-content: space-around;">
											<div class="form-group">
												<input type="submit" value="Add" name="add" class="btn btn-primary">
												<div class="submitting"></div>
											</div>
											<!-- <div class="form-group" >
												<button   class="lien"><a href="admin.php">Retour</a></button>
											</div> -->
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
<?php
	if(isset($_POST['add'])){
		$codeSp=$_POST['code'];$labelSp=$_POST['lebel'];$presentationSp=$_POST['presentation'];
		$req=$con->query("SELECT `codespecialiter`, `labelspecialiter`, `presentationspecialiter` FROM `specialiter` where `codespecialiter`=$codeSp");
		if($line=$req->fetch()) {echo "<script>alert('le code est deja existe');</script>"; } 
		else{
			$repp=$con->exec("INSERT INTO `specialiter`(`codespecialiter`, `labelspecialiter`, `presentationspecialiter`) 
			VALUES ('$codeSp',\"$labelSp\",\"$presentationSp\")");
			if($repp){
				header("location:admin.php#Spécialité");
			}
		}
	}
?>

	</body>
</html>

