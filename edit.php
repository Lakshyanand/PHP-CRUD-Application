<?php
session_start();

// $id = $_GET['id'];
// echo $id;
$edit = $not_edit = false;
$showAlert = $showError = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include 'db.php';
    $bookname = $_POST["bookname"];
    $id = $_POST['id'];

    $sql = "UPDATE `books` SET `bookname` = '$bookname' WHERE `books`.`sno` = '$id' ";
    if(mysqli_query($conn,$sql))
    {
        $showAlert = "updated successfully";
        $edit = true;
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

    <title>Edit</title>
  </head>
  <body>
    <!-- <h1>Hello, world!</h1> -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?php echo "Welcome ".$_SESSION["username"] ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="admin.php">Home</a>
        </li>
      </ul>
    <div class="d-flex">
        <div class="nav-item">              
         <a class="nav-link text-light active" href="add.php">Add Books</a>
        </div>
        
        <div class="nav-item ">
        <a class="nav-link text-light" href="show.php">Books List</a>
        </div>
           
        <div class="nav-item ">
        <a class="nav-link text-light" href="logout.php">Logout</a>
        </div>       
    </div>
    </div>
  </div>
</nav>
<?php
if($edit == true)
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>'.$showAlert.'</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

  }

  ?>
    <div class="container mt-4 col-lg-4 bg-light">
       
       <main class="form-signin text-center">
         <form method="post" action="">
           <h1 class="h3 mb-3 fw-bold">Edit Books</h1>

           <!-- <div class="form-floating">
             <input type="text" class="form-control" disabled id="bookname" name="id" value =" < ?///php echo $_GET['id']; ?>" placeholder="Book Name" required />
             <label for="bookname">Bookname</label>
           </div> -->

           <div class="form-floating">
             <input type="text" class="form-control" id="bookname" name="bookname" placeholder="Book Name" required />
             <label for="bookname">Change Bookname</label>
           </div>
          
           <input type="hidden" name="id" value =" <?php echo $_GET['id']; ?>" ></input>  
                
           <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Change</button>
         </form>


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


