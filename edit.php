<?php
  include_once 'header.php';
?>


<?php

$servername = "sql306.epizy.com";
$username = "epiz_33359487";
$password = "BJDkylUy8cF";
$database = "epiz_33359487_databaseproject";

$connection = new mysqli($servername, $username, $password, $database);


$idteam = "";
$teamname = "";
$place = "";
$stage = "";
$marketvalue = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

     //GET Method -> Show the data of the team
     if( !isset($_GET["idteam"]) ) {
        header("location: 2proiect.php");
        exit;
     }

    $idteam = $_GET["idteam"];

    //Read the row of the selected client from the database table
    $sql = "SELECT * FROM teams WHERE idteam=$idteam";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row){
        header("location: 2proiect.php");
        exit;
    }

    $teamname = $row["teamname"];
    $place = $row["place"];
    $stage = $row["stage"];
    $marketvalue = $row["marketvalue"];

}

else{
     //POST Method -> Update the data of the team

     $idteam = $_POST["idteam"];
     $teamname = $_POST["name"];
     $place = $_POST["place"];
     $stage = $_POST["stage"];
     $marketvalue = $_POST["marketvalue"];

     do {
        if ( empty($idteam) || empty($teamname) || empty($place) || empty($stage) || empty($marketvalue) ) {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE teams
            SET teamname = '$teamname', place = '$place', stage = '$stage', marketvalue = '$marketvalue'  
            WHERE idteam = $idteam";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Client updated correctly";

        header("location: 2proiect.php");
        exit;

    
    } while (false);

}

  
?>



<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>


<body>
    <div class="container my-5">
        <h2>New Team</h2>



        <?php
        if( !empty ($errorMessage) ) {
          echo "
          <div class='alert alert-warning alert-dismissible fade show' role='alert'>
          <strong>$errorMessage</strong>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>
          ";
        }
       ?>



        <form method="post">

        <input type="hidden" name="idteam" value="<?php echo $idteam; ?>">

          <div class="row mb-3">
            <label for="col-sm-3 col-form-label">Team Name</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="name" value="<?php echo $teamname; ?>">
            </div>
          </div>

          <div class="row mb-3">
            <label for="col-sm-3 col-form-label">Place</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="place" value="<?php echo $place; ?>">
            </div>
          </div>

          <div class="row mb-3">
            <label for="col-sm-3 col-form-label">Stage</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="stage" value="<?php echo $stage; ?>">
            </div>
          </div>

          <div class="row mb-3">
            <label for="col-sm-3 col-form-label">Total Market Value</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="marketvalue" value="<?php echo $marketvalue; ?>">
            </div>
          </div>



           <?php

           if( !empty($successMessage) ) {

            echo " <div class='row mb-3'>
                     <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                             <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                     </div>
                   </div>
                 ";

           }

           ?>



          <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-sm-3 d-grid">
              <a class="btn btn-outline-primary" href="2proiect.php" role="button">Cancel</a>
            </div>

          </div>
        
        </form>



    </div>
