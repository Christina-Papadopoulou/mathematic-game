<?php
// Start the session
session_start();
?>
<?php 
    # CONNECT TO DATABASE
    require("config.php");  

    // Αρχικοποιηση πινάκων
    $log_num_arr = $base_num_arr = $corect_ans = [];
    
    // Ερώτηση: Πως αποφέυγω το resubmit όταν ο χρήστης πατάει το F5;;
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        
        # MAIN MENU
        include("menu.php");

        // Απόσταση τυχαια απο 0-6
        $offset = rand(0,6);
                        
        // Επιλογή 5 τυχαίων γραμμών απο την ΒΔ και απόσταση απο την αρχή όσο το Offset
        $stmt   = $conn->prepare("SELECT * FROM excersise  ORDER BY RAND(6) LIMIT 5 OFFSET $offset");     
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Αποθήκευση γραμμών σε πίνακες δεν μου αρεσει το Num θελω με name
        while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
            $log_num_arr[]  = $row[1];
            $base_num_arr[] = $row[2];
            $corect_ans[]   = $row[3];
        }
        // Πέρασμα σωστών απαντήσεων στην session
        $_SESSION['CORRECT_ANS'] = $corect_ans;
    }
    
    // Συνάρτηση: generateNumbers
    // Γεννήτρια τυχαίων μοναδικών αριθμών για να μπουν οι επιλογές στα radio buttons ανακατεμένα
    function generateNumbers($min, $max, $quantity) {
            $numbers = range($min, $max);
            shuffle($numbers);
            return array_slice($numbers, 0, $quantity);
    }
    

    // Έλεγχος ερωτήσεων
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Μετρητής για το score
        $cntScore = 0;
        
        //To isset γινεται δούμε εαν ο χρήστης έχει πατήσει τέλος και δεν υπαρχει κάποιο κενό στις απαντήσεις
        if(isset($_POST['end']) and isset($_POST['arrAns'])){
            
            // Αναζήτηση σωστών απαντήσεων
            foreach ($_POST['arrAns'] as $optNum => $option) {
            	if (in_array($option, $_SESSION['CORRECT_ANS'])) {
            		$cntScore += 1;
            	 }
            }           
        }else{
            $cntScore = 0;
        }	

        // Εγγραφή στην ΒΔ
        $stmt = $conn->prepare("INSERT INTO apodosi (uname, score, level) VALUES (?,?,?)");     
        $stmt->bind_param("sis", $_SESSION["uname"], $cntScore, $_SESSION["LEVEL"]);
        $stmt->execute();
        
        // Κλεισιμο ΒΔ
        $stmt->close();
        $conn->close();

        // Ανακατεύθηνση στα αποτελέσματα
        header("Location: score_table.php?page=4");	
        
    }

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
		<!--ΜΕΤΡΗΤΗΣ  -->
		<?php include("cntDown_timer.php"); ?>
		<!--  Mε την post θα σταλθούνε στον server οι επιλογές του χρήστη -->
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<?php
			// Μετρητης για id
			$cnt_id = 0;
			
			// πεντε καρτέλες 
			for($x = 0; $x <= 4; $x++){
				$cnt_id++;			
				
				// πίνακας με τις σωστές λύσεις και δυο τυχαίους αριθμούς πρόσθεσα 
				// για να μην βγούν ίδιες λύσεις με την σωστή
                $solutions_arr = array( $_SESSION['CORRECT_ANS'][$x], 
                                        rand($_SESSION['CORRECT_ANS'][$x] + 1, $_SESSION['CORRECT_ANS'][$x] + 80), 
                                        rand($_SESSION['CORRECT_ANS'][$x] + 81, $_SESSION['CORRECT_ANS'][$x]+ 100));
                // πίνακας με τυχαίους αριθμούς από 0 έως και 2
                $pos           = generateNumbers(0, 2, 3);
		?>
			<div class="card" id=<?php print "main_card"; ?>> 
				<div class="card-body">
					<h5 class="card-title">log<sub><?php print $base_num_arr[$x] ?></sub><?php print $log_num_arr[$x]; ?></h5>
			<?php
				// Παραγωγή 3 επιλογών radio
				for($z = 0; $z <= 2; $z++){
			?>			
					<div class="form-check">
						<label class="form-check-label">
						<input type="radio" class="form-check-input" name= "arrAns[<?php echo $cnt_id ?>]" value="<?php print $solutions_arr[ $pos[$z] ]; ?>">
						<!-- Εμφάνιση αριθμών στα labael-->
						<?php echo $solutions_arr[$pos[$z]];  ?>
						</label>
					</div>		
			<?php } ?><!-- END INNER FOR --> 
				</div> <!-- CARD BODY -->
			</div><!-- MAIN CARD -->
		
		<?php } ?> <!-- END FOR -->
					<br>
			<button type="submit" name="end" value="end" class="btn btn-primary" >Τέλος</button>
			<button  type ="button" name ="cancel" value="cancel"  class="btn btn-danger"  data-toggle="modal" data-target="#cancel_modal">Ακύρωση</button>	
		</form> <!-- END FORM -->
		
		
		<!-- FOOTER ΚΑΙ MODAL WINDOWS-->
		<?php  
			include("modal.php");
			include("footer.php")
		?>
  </div>
</body>
</html>