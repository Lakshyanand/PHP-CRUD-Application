<?php

$showAlert = $showError = "";
$changed = $not_changed = false;

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        include 'db.php';
        $username = $_POST["username"];
        $passnew = $_POST["changepass"];
        $passnew2 = $_POST["changepass2"];

        $sql = "SELECT * FROM signup WHERE username='$username'";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        
        if($count == 1)
        {
            $row = mysqli_fetch_row($result);
            if($passnew == $passnew2)
            {
                $update = "UPDATE `signup` SET `password` = '$passnew' WHERE `signup`.`username` = '$username'";
                $execute = mysqli_query($conn,$update);
                $changed = true;
                $showAlert = "Password changed successfully";
            }
            else
            {
                $not_changed = true;
                $showError = "Password and confirm password must be same";
            }
        }
        else
        {
            $not_changed = true;
            $showError = "Username not found";
        }

        


    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Forgot Password</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Lakshya's Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="welcome.php">Home</a>
        </li>
      </ul>
    <div class="d-flex">
        <div class="nav-item">              
         <a class="nav-link text-light active" href="login.php">Login</a>
        </div>
        <div class="nav-item ">
        <a class="nav-link text-light" href="signup.php">SignUp</a>
        </div>          
    </div>
    </div>
  </div>
</nav>

<?php
  if($changed == true)
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>'.$showAlert.'</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

  }
  if($not_changed == true)
  {
    echo '<div class = "alert alert-danger alert-dismissible fade show" role="alert">
  <strong>'.$showError.'</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
?>


  <div class="container mt-4 col-lg-4 bg-light">
       
       <main class="form-signin text-center">
         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
           
           <h1 class="h3 mb-2 fw-bold">Change Password</h1>

           <div class="form-floating mb-2">
             <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
             <label for="username">Username</label>
           </div>
       
           <div class="form-floating ">
             <input type="text" class="form-control" id="password" name="changepass" placeholder="password" required>
             <label for="password">Enter new password</label>
           </div>
           <div class="form-floating mt-2">
             <input type="text" class="form-control" id="password" name="changepass2" placeholder="Password" required>
             <label for="password">Confirm password</label>
           </div>
                
           <!-- <button class="w-100 btn btn-lg btn-link mb-3" type="submit">Forgot Password</button> -->
           <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Confirm</button>
           
         </form>
       </main>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>