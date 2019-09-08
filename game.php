<?php
// Start the session
session_start();
?>
<?php    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if($_POST['radAnswer'] == 'easy'){
        $_SESSION["LEVEL"] = "easy";
      }else if($_POST['radAnswer'] == 'medium'){
        $_SESSION["LEVEL"] = "medium";
        
      }else if ($_POST['radAnswer'] == 'hard'){
        $_SESSION["LEVEL"] = "hard";
      }

      // Ανακτεύθηνση      
      header("Location:game_1.php?page=3");  
      exit();
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
  <!-- MAIN MENU -->  
  <?php include("menu.php");?>
  
  <div class="container">
  
    <!-- CARD  ΓΙΑ ΕΠΙΛΟΓΗ ΕΠΙΠΕΔΩΝ -->
    <div class="card" id="main_card">
      <div class="card-body">     
        <h5 class="card-title">Επίπεδα Δυσκολίας</h5>  
          <p align="justify" class="card-text">
            Μπορείς να επιλέξεις το επίπεδο δυσκολίας της προτίμησης σου! 
          </p>
          
          <form method="POST" id="levels" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!-- RADIO BUTTONS 
              βάζουμε ίδιο ονομα(name) για να μπορουμε να εχουμε επιλέγμενο μονο ενα την φορά  -->
            <div class="form-check">
              <label class="form-check-label" for="radio1">
                <input type="radio" class="form-check-input" id="easy" name="radAnswer" value='easy'>Εύκολο
              </label>
            </div>

            <div class="form-check">
              <label class="form-check-label" for="radio1">
                <input type="radio" class="form-check-input" id="medium" name="radAnswer" value='medium' checked>Μέτριο
              </label>
            </div>
            
            <div class="form-check">
              <label class="form-check-label" for="radio1">
                <input type="radio" class="form-check-input" id="hard" name="radAnswer" value='hard'>Δύσκολο
              </label>
            </div>
            <BR>
            <button type="submit" onclick="#" class="btn btn-primary">Submit</button>
          </form>        
            
        </div>
      </div>
    
    <!-- FOOTER -->    
    <?php  include("footer.php")?>
  </div>    
</body>
</html>