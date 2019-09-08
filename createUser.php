<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>

  <title>Μαθηματικά Παιχνίδια</title>
</head>

<body>
  <!-- php script -->
  <?php 
   
    
    // define variables and set to empty values
    $uname = $name = $sname = $eidikotita = $email = $phone  = $pwd = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
      require("config.php"); 

      
      // prepare and bind
      $stmt = $conn->prepare("INSERT INTO players(uname, name, surname, email, eidikotita , phone, password) VALUES (?,?, ?, ?, ?, ?, ?)");
      
  
      $uname    = clear_input($_POST["uname"]);
      $name     = clear_input($_POST["name"]);
      $sname    = clear_input($_POST["sname"]);
      $email    = clear_input($_POST["email"]);
      $eidikotita = clear_input($_POST["eidikotita"]);
      $phone    = clear_input($_POST["phone"]);
      $pwd      = clear_input($_POST["pwd"]);
      
      $stmt->bind_param("sssssss", $uname, $name, $sname, $email, $eidikotita, $phone, $pwd);
      
      
      //edo o elegxos ginetai gia ola ta pedia.stin periptosi pou thelame na elegxoume mono to username tha eprepe na kano ena erotima stin vasi kai na to sigrinoume
      if($conn->affected_rows === -1){
        // Ο Χρήστης Υπάρχει
        $status = "register_err_1";
      }else{
        // Εγγραφή Νέου Χρήστη
        $status = "register_succes";
        $stmt->execute();
      }     
      include("error.php"); 
       
      $stmt->close();
      $conn->close();
  
    }

    function clear_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  
  ?>

  <div class="container py-5">
    <div class="row">
      <div class="col-md-12">
        <h2 class="text-center text-white mb-4">Για να μου αφησει κενό</h2>
        <div class="row">
          <div class="col-md-6 mx-auto">

            <!-- form card login -->
            <div class="card rounded-0">
              <div class="card-header">
                <h3 class="mb-0">Register</h3>
              </div>
              <div class="card-body">
			  
                <form class="form" role="form"  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                  <!-- Όνομα Χρήστη -->
                  <div class="form-group">
                    <label for="uname">Όνομα Χρήστη</label>
                    <input type="text" name="uname" class="form-control form-control-lg rounded-0"  required="">
                  </div>

                  <!-- Όνομα -->
                  <div class="form-group">
                    <label for="name">Όνομα</label>
                    <input type="text" name="name" class="form-control form-control-lg rounded-0" required="">
                  </div>

                  <!-- Επίθετο -->
                  <div class="form-group">
                    <label for="sname">Επίθετο</label>
                    <input type="text" name="sname" class="form-control form-control-lg rounded-0" required="">
                  </div>

                  <!-- Email -->
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control"  required="">
                  </div>

                  <!-- Ιδιότητα -->
                  <div class="form-group">
                    <label for="idiotita">Ιδιότητα ή Ειδικότητα</label>
                    <input type="text" name="eidikotita" class="form-control form-control-lg rounded-0"  required="">
                  </div>

                  
                  <!-- Τηλέφωνο -->
                  <div class="form-group">
                    <label for="phone">Τηλέφωνο</label>
                    <input type="text" name="phone" pattern="[0-9]{10}" title="Μόνο αριθμοί" maxlength="10"  class="form-control form-control-lg rounded-0" required="">
                  </div>

                  <!-- Password Λειπει έλεγχος κωδικού-->
                  <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" name="pwd"  pattern="[A-Za-z]{4}\d{5}" title="Ο κωδικός πρέπει να περιέχει 4 γράμματα και 5 ψηφία" maxlength="9" class="form-control form-control-lg rounded-0" required>
                  </div>

                  <!-- Buttons -->
                  <button type="submit" class="btn btn-success btn-lg btn-block">Εγγραφή</button>
                  <a href="index.php" class="btn btn-danger btn-lg btn-block">Ακύρωση</a>
                </form>
              </div>
              <!--/card-block-->
            </div>
            <!-- /form card login -->
          </div>
        </div>
        <!--/row-->
      </div>
      <!--/col-->
    </div>
    <!--/row-->
  </div>
  <!--/container-->
</body>

</html>