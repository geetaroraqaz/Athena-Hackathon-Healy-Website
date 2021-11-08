<?php
session_start();

if(!isset($_SESSION['username'])){
  echo "<script type = \"text/javascript\">
              alert(\"Please login first!\");
              window.location = (\"/AthenaHack Healthcare/login.php\")
              </script>";
}
include('Includes/server.php');

if(isset($_POST['book'])){  
    if(!empty($_POST['symptoms'])) {
        $symptoms = "";
        foreach($_POST['symptoms'] as $value){
          $symptoms .= $value.","; 
        }
        $patient_name = $_POST['pname'];
        $doctor_id = $_POST['doctor_id'];
        $user_id = $_SESSION['user_id']; 
        
        $insert_data = "INSERT INTO appointments (user_id, patient_name, doctor_id, symptoms, status, meet_link)
                        values($user_id,'$patient_name', '$doctor_id','$symptoms', 'pending', 'NA')";
        $data_check = mysqli_query($db, $insert_data);

        if ($data_check) {            
          echo "<script type = \"text/javascript\">
              alert(\"Appointment booking Succesfull\");
              window.location = (\"/AthenaHack Healthcare/user_appointments.php\")
              </script>";
      } else {
          $errors['db-error'] = "Something went wrong! Please try later";
      }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <script src="https://kit.fontawesome.com/3695790714.js" crossorigin="anonymous"></script>

  <title>Healy</title>

  <style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.maindiv{
    max-width: 75%;    
    margin: auto;
    margin-top:50px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 2fr 1fr;
    grid-template-areas: 
    "l1 r1"
    "l2 r2";
    grid-gap: 1rem;
}

button{
  margin:10px;  
}
  </style>
</head>

<body>
  <!-- navbar -->
  <?php
  include('Includes/header.php');
  ?>
  
  <div class="maindiv">
        <div class="l1">
          <h3 class="text-dark" style="font-size:75px">Lets Find your Doctor!</h3>

          <p class="text-primary" style="font-size:18px; margin-top:20px;">We are here to help you find your personal health expert in 3 easy steps</p>
          <p class="text-primary" style="font-size:18px;">Select speciality. symptoms & book your appointment. Simple, isn't it?</p>
        </div>

        <div class="r1">          
          <img class="img-fluid" src="/AthenaHack Healthcare/images/cal.png" alt="">
        </div>

        <div class="l2" style="width:75%; ">
        <div>
        <button type="button" class="btn btn-dark btn-rounded rounded-circle"> <i class="fas fa-tooth"></i> </button>
        <button type="button" class="btn btn-danger btn-rounded rounded-circle"> <i class="fa fa-heartbeat"></i> </button>
        <button type="button" class="btn btn-dark btn-rounded rounded-circle"> <i class="fa fa-brain"></i> </button>
        <button type="button" class="btn btn-primary btn-rounded rounded-circle"> <i class="fa fa-low-vision"></i> </button>
        <button type="button" class="btn btn-secondary btn-rounded rounded-circle"> <i class="fa fa-clinic-medical"></i> </button>        
        </div>
                 
      <!-- <form class="form-inline d-flex md-form form-sm mt-2">
        <i class="fas fa-search text-dark" aria-hidden="true"></i>
        <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
          aria-label="Search">
      </form> -->
        
      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Book an Appointment
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Book an Appointment</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="POST">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Patient Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="pname" id="inputEmail3" placeholder="Patient Name" required>
                  </div>
                </div>
                <fieldset class="form-group">
                  <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Select doctor id</legend>
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="doctor_id" id="gridRadios1" value="doctor_1"
                          checked>
                        <label class="form-check-label">
                          doctor_1
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="doctor_id"
                          value="doctor_2">
                        <label class="form-check-label" for="gridRadios2">
                          doctor_2
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="doctor_id"
                          value="doctor_3">
                        <label class="form-check-label" for="gridRadios2">
                          doctor_3
                        </label>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <div class="form-group row">
                  <div class="col-sm-2">Symptoms</div>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="symptoms[]" value="Cough">
                      <label class="form-check-label" >
                        Cough
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox"  name="symptoms[]" value="Fever">
                      <label class="form-check-label" >
                        Fever
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox"  name="symptoms[]" value="Headache">
                      <label class="form-check-label" >
                        Headache
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="symptoms[]" value="Weakness">
                      <label class="form-check-label" >
                        Weakness
                      </label>
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" name="book">Book Appointment</button>
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
        </div>
        <div class="r2">
        <img class="img-fluid" src="/AthenaHack Healthcare/images/med.png" alt="">            
        </div>

        <?php
      $uid = $_SESSION['user_id'];
      $app_query = "SELECT * FROM appointments where user_id='$uid'";
      $result = $db->query($app_query);

      if(mysqli_num_rows($result)>0){
      ?>
<h3 calss="mt-3">Your Appointments</h3>
<table class="table">
      <thead class="thead-dark">
        <tr>
          <th class="text-center">Appointment Id</th> 
          <th class="text-center">Doctor Id</th>         
          <th class="text-center">status</th>
          <th class="text-center">Link</th>
          <th class="text-center"></th>
        </tr>
      </thead>      
      <tbody>
        <?php
        while ($rows = $result->fetch_assoc()) {
        ?>
          <tr>
            <td style="vertical-align:middle;" align="center"><?php echo $rows['id']; ?></td>
            <td style="vertical-align:middle;" align="center"><?php echo $rows['doctor_id']; ?></td>
            <td style="vertical-align:middle" align="center"><?php echo $rows['status']; ?></td>
            <td style="vertical-align:middle" align="center"><?php echo $rows['meet_link']; ?></td>            
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <?php } ?>
</div> 
  
<?php
 define('ROOT_PATH', __DIR__);
define('CREDENTIAL_PATH', __DIR__ . '/credentials');
define('ROOT_URL', 'http://localhost/meet');

require_once 'classes/Init.php';
$meet = (new Init)->start();

require_once 'views/view.php' ;
?>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>