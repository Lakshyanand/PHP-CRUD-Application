<?php
    $showError = "";
    $showAlert = "";
    $signup = false;
    $signout = false;
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        include 'db.php';
        $user = $pass = $cpass = $role = "";


        $user = $_POST["username"];
        $pass = $_POST["password"];
        $cpass = $_POST["cpassword"];
        if(isset($_POST['role']))
        {
            $role = $_POST['role'];
        }
    
        // echo $role;

        $existSql = "SELECT * FROM signup WHERE username = '$user'";
        $result_exist = mysqli_query($conn,$existSql);

        if(mysqli_num_rows($result_exist)==1)
        {
            $showError = "Sorry: username already exists. if you are already registerd please log in otherwise choose a different username";
            $signout = true;
        }
        else
        {
            if(($pass==$cpass))
            {
              $hash = password_hash($pass,PASSWORD_DEFAULT);

                $insert = ("INSERT INTO `signup` (`username`,`password`,`role`,`date`) VALUES('$user','$hash','$role',current_timestamp())");
                $result_insert = mysqli_query($conn,$insert);
                if($result_insert)
                {
                  $showAlert = "You  are successfully signed up";
                  $signup = true;
                }
                else
                {
                  $signout =true;
                  $showError = "Sorry there was an error please sign up again";
                }
            }
            else
            {
              $signout = true;
                $showError = "Sorry:password and confirm password don't match";
            }
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

    <title>Welcome</title>
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
  if($signup == true)
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>'.$showAlert.'</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

  }
  if($signout == true)
  {
    echo '<div class = "alert alert-danger alert-dismissible fade show" role="alert">
  <strong>'.$showError.'</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
?>

<div class="container mt-4 col-lg-4 bg-light">
       
       <main class="form-signup text-center">
         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
           <!-- <img class="mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
           <h1 class="h3 mb-3 fw-bold">Welcome to SignUp</h1>
       
           <div class="form-floating">
             <input type="text" maxlength="15" class="form-control" id="username" name="username" placeholder="Enter Username" required>
             <label for="username">Username</label>
           </div>
          
           <div class="form-floating mt-3">
             <input type="password" maxlength="10" class="form-control" id="password" name="password"placeholder="Password" required>
             <label for="cpassword">Password</label>
           </div>
           <div class="form-floating mt-3">
               <input type="password" maxlength="10" class="form-control" id="cpassword" name="cpassword" placeholder="Password" required>
               <label for="cpassword">Confirm Password</label>
             </div>
            <div class = "form floating mt-3">
            <label for="role">Role</label>
                <input type = "radio" name = "role" id = "role" value="admin">Admin
                <input type = "radio" name = "role" id = "role" value="user">User
            </div>  
       
           <button class="w-100 btn btn-lg btn-primary mt-3 mb-3" type="submit">SignUp</button>
          
           
           
         </form>
       </main>
   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>