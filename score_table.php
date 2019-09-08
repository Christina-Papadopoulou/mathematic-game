<?php
// Start the session
session_start();
?>
<!-- MAIN MENU -->  
<?php 
	include("menu.php");
	
	# CONNECT TO DATABASE
	require("config.php");  
	

	$stmt = $conn->prepare("SELECT score,level FROM apodosi 
							            RIGHT JOIN players ON apodosi.uname = players.uname 
							            WHERE players.uname = ? ORDER BY score");  
    
	$stmt->bind_param('s', $_SESSION["uname"]);
	$stmt->execute();
	$result = $stmt->get_result();								  
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
  
	<div class="container">
		<h1>Προβολή Απόδοσης</h1>
		<p>Για τον παίχτη <?php print $_SESSION["uname"]; ?> τα αποτελέσματα ειναι</p>
		  
		  <table class="table table-dark table-striped">
			<thead>
			  <tr>
				<th>Βαθμολογία</th>
				<th>Επίπεδο Δυσκολίας</th>
			  </tr>
			</thead>
			<tbody>
			<?php
				while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
					print '<tr>';
					print '<td>'. $row[0]. '</td>';
					print '<td>'. $row[1]. '</td>';
					print '</tr>';
				}
					
			?>

		<!-- FOOTER ΚΑΙ MODAL WINDOWS-->
		<?php  
			include("footer.php")
		?>
  </div>
</body>
</html>