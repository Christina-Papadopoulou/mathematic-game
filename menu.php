<?php 
  // Πρόβλημα λόγο χρονικου περιθωρίου
  // Αν βάλεις απο την μπάρα τιμές τοτε δεν μας ανακατευθήνει 
  // get περναω φανερα τις μεταβλητές ενώ το post κρυφά 
  if(isset($_GET['page'])){
    $cur_page = $_GET['page'];   
  }
?>

<nav class="navbar navbar-expand-sm navbar-light bg-light">
      <a class="navbar-brand" href="intro.php?page=1">Καλώς ήρθες <?php print $_SESSION["uname"]; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="main_nav">
        <!-- unordered list -->
        <ul class="navbar-nav ml-auto">
          
          <!-- MENU HOME -->
          <?php
            if($cur_page == 1){
          ?>
              <li class="nav-item active">
          <?php
            }
          ?>
            <a class="nav-link" href= "intro.php?page=1">Home <span class="sr-only"></span></a>
          </li>

          <?php
            if($cur_page == 2){   
          ?>
              <li class="nav-item active">
          <?php }?>
            <a class="nav-link" href="game.php?page=2">Επίπεδα δυσκολίας</span></a>
          </li>
      
          <?php
            if($cur_page == 3){   
          ?>
              <li class="nav-item active">
          <?php }?>
            <a class="nav-link" href="theory.php?page=3">Θεωρία Λογαρίθμων</span></a>
          </li>
          <?php
            if($cur_page == 4){   
          ?>
              <li class="nav-item active">
          <?php }?>
            <a class="nav-link" href="score_table.php?page=4">Προβολή Απόδοσης</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Αποσύνδεση</a>
          </li>
        </ul>
      </div>
    </nav>