
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Custom CSS -->
<link href="css/custom.css" rel="stylesheet">


<?php
    
    if($_SESSION["LEVEL"] == "easy"){
        convertVar(600);
    }else if($_SESSION["LEVEL"] == "medium"){
        convertVar(300);
    }else if($_SESSION["LEVEL"] == "hard"){
        convertVar(10);
    }

    // Πέρασμα μεταβλητής απο php σε javascript
    function convertVar($val) {
        echo '<script>';
        echo 'var time = ' . json_encode($val) . ';';
        echo '</script>';
    }

?>

<div id="progressBar">
      <div class="bar"></div>
</div>


<script>    
    
    // Σεταρισμα χρόνου της μπαρας
    function progress(timeleft, timetotal, $element) {

        // Υπολογισμο μηκους μπάρας
        var progressBarWidth = timeleft * $element.width() / timetotal;

        // κινηση μπάρας και μειωση του χρόνου
        $element.find('div')
               .animate( { width: progressBarWidth }, 500)
               .html(Math.floor(timeleft / 60) + ":"+ timeleft % 60);
        
        // καλουμε την ιδια συνάρτηση μεχρι να γίνει μήδεν ανα 1 δεθτερολεπτο
        if(timeleft > 0) {
            setTimeout(function() {
                progress(timeleft - 1, timetotal, $element);
                
            }, 1000);
        }else{
            //javascript dialog
            if(window.confirm("Τέλος Xρόνου!!!"))
                window.location = "score_table.php?page=4";
        }
    };

    // Καλω συνάρτηση με time μεταβλητη που περασα απο την convertVar
    progress(time, time, $('#progressBar'));
</script>

