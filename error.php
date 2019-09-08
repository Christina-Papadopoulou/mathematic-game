<div class="container">
    <?php if($status == "login_err_1"){ ?>
        <!-- Login Form:  Λάθος Στοιχεία Εισαγωγής -->
        <div class="alert alert-danger" role="alert">
            Λάθος Στοιχεία Εισαγωγής. Προσπαθήστε Ξανά!
        </div>           
    <?php } else if($status == "login_succes"){ ?>
        <!-- Login Form:  Σωστά Στοιχεία Εισαγωγής -->
        <div class="alert alert-success" role="alert">
            Επιτυχής Σύνδεση !!!<span id="counter">3</span> second(s).</p>
        </div>

        <script src="js/counter.js" type="text/javascript" ></script>

    <?php } else if($status == "register_err_1"){ ?>
        <!-- Register Form:  Ο Χρήστης υπάρχει -->
        <div class="alert alert-danger" role="alert">
            Το Όνομα του Χρήστη υπάρχει ή το Email 
        </div>
    <?php } else if($status == "register_succes"){ ?>
        <!-- Register Form:  Επιτυχής Εισαγωγή-->
        <div class="alert alert-success" role="alert">
            Επιτυχής Εισαγωγη !!!
        </div>
    <?php } ?>
</div>
      


