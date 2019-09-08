<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
	crossorigin="anonymous">

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
	crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
	crossorigin="anonymous"></script>
	
	<!-- Custom CSS -->
	<link href="css/custom.css" rel="stylesheet">

	<title>Μαθηματικά Παιχνίδια</title>


</head>

<body>
	<!-- MAIN MENU -->  
	<?php include("menu.php");?>
	
	<div class="container">
    <!-- JUMBOTRON -->
    <div class="jumbotron jumbotron-fluid my-4 ">
      <div class="container">
        <h1 class="display-4">ΘΕΩΡΙΑ ΛΟΓΑΡΙΘΜΩΝ</h1>
        <p class="lead">Λογάριθμοι για όλους μας!!!</p>
      </div>
    </div>

    <!-- CARD INTRO -->
    <div class="card">
      <div class="card-body">     
        <h5 class="card-title">Μικρή εισαγωγή στους λογαρίθμους!</h5>  
          <p align="justify" class="card-text">
            Ένα εκπαιδευτικό βίντεο για όσα παιδιά αλλά και μεγάλους δεν ήταν τόσο προσεκτικοί στην αίθουσα διδασκαλίας!!!    
          </p>
				<!-- 21:9 aspect ratio -->
				<div class="embed-responsive embed-responsive-21by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/g0InMEpQkHE?rel=0"></iframe>
				</div>

      </div>
    </div>
		<!-- FOOTER -->    
		<?php  include("footer.php")?>

	</div>
    
       
</body>

</html>