<?php
// Start the session
session_start();
?>
<?php 
    // define variables and set to empty values
    $uname = $pwd = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require("config.php");
      
      // prepare and bind
      $stmt  = $conn->prepare("SELECT uname, password FROM players WHERE uname = ? AND password = ?");      
      //katharismos paidion apo kakovoulo kodika
      $uname = clear_input($_POST['uname']); 
      $pwd   = clear_input($_POST['pwd']);
      
      // Εκτέλεση Ερωτήματος
      $stmt->bind_param("ss", $uname, $pwd);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      $conn->close();

      //ean to result den mou epistrepsi kanena apotelesma tote login error
      if($result->num_rows === 0){
        $status = "login_err_1";
      } else{
        $status = "login_succes";
        $row = $result->fetch_assoc();
        
        // Set session variables Ονομασια των στηλών της ΒΔ
        $_SESSION["uname"] = $row['uname'];

        // Edw Vazoume ton xrono gia na kanouyme redirect
        header('refresh: 3; url=intro.php?page=1');
        
      }
  
      include("error.php"); 
    }
    

    function clear_input($data) {
      //bgazo ta kena
      $data = trim($data);
      //den thelo na pernai ta slashes
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
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

  <title>Μαθηματικά Παιχνίδια</title>
  

</head>

<body>
  <div class="container py-5">
    <div class="row">
      <div class="col-md-12">
        <h2 class="text-center text-white mb-4">Για να μου αφησει κενό</h2>
        <div class="row">
          <div class="col-md-6 mx-auto">
            <!-- form card login -->
            <div class="card rounded-0">
              <div class="card-header">
                <h3 class="mb-0">Login</h3>
              </div>
              <div class="card-body">

                <form class="form" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <div class="form-group">
                    <label for="lblUname">Username</label>
                    <input type="text" name="uname"  class="form-control form-control-lg rounded-0" required>
                  </div>
                  <div class="form-group">
                    <label for="lblPwd">Password</label>
                    <input type="password" name="pwd" class="form-control form-control-lg rounded-0" required>
                  </div>
                  <button type="submit" class="btn btn-primary btn-lg btn-block " id="btnLogin">Login</button>
                  <a href="createUser.php" class="btn btn-success btn-lg btn-block">Register</a>
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