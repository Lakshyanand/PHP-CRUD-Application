<?php
    session_start();
    include 'db.php';
    $display = "SELECT * FROM `books` ORDER BY bookname ASC ";
    $execute = mysqli_query($conn,$display);

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Show Books</title>
  </head>
  <body>
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

<h1 class="text-center mt-3">Books List</h1>

    <div class="container col-lg-8 mt-2">
        <table class="table table-bordered border-dark text-center">
            <tr scope="row">
                <th>Book ID</th>
                <th>Book Name</th>
                <th>Book Pages</th>
                <th>Issued To</th> 
                <th>Action</th> 
            </tr>
            <?php
               while( $rows = mysqli_fetch_assoc($execute))
               {
                   ?>
                   <tr scope="row">
                    <td><?php echo $rows["sno"]; ?></td>
                    <td><?php echo $rows["bookname"]; ?></td>
                    <td><?php echo $rows["pages"]; ?></td>
                    <td><?php 
                    if($rows["issuedto"] != NULL)
                        {
                            echo $rows["issuedto"];
                        }
                    else
                        {
                            echo "-";
                        }
                        ?></td>
                        <td>
                        <a href=delete.php?id=<?php echo $rows['sno']?> >
                        <button class="btn btn-danger btn-sm mx-1">Delete</button></a>
                        <a href=edit.php?id=<?php echo $rows['sno']?> >
                        <button class="btn btn-success btn-sm mx-1">Edit</button></a>
                        <a href=issue.php?id=<?php echo $rows['sno']?> >
                        <button class="btn btn-info btn-sm mx-1">Issue</button></a>

            
                      </td>
                        
                   </tr>
            <?php 
                }

            ?>
            
        </table>    
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