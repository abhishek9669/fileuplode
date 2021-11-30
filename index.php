<?php

  if (isset($_POST['submit_file'])) {
     // echo 'yes';
    //    echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    echo '<pre>';
    var_dump($_FILES['photo']['name']);
    echo '</pre>';

  //1.
    $cn = mysqli_connect('localhost','root','','ecome1_db') or die('could not connect');


    $name = mysqli_real_escape_string($cn,$_POST['fname']);

    $photo = mysqli_real_escape_string($cn,$_FILES['photo']['name']);

    $photo = rand(50,100000).$photo;

    $source = $_FILES['photo']['tmp_name'];
    $destination = './uplodes/'.$photo;
    move_uploaded_file($source,$destination);


    


    //2
    $sql = "INSERT INTO users_tbl(`name`,`photo`) VALUE('$name','$photo')";

   //3
    mysqli_query($cn,$sql);

    //4 
    echo "data insert succes";

    //5
    mysqli_close($cn);




   }



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body>
    <form method="POST" action=" <?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" class="w-50 offset-3 mt-5">
            <div class="mb-3">
                <label for="fname" class="form-label">Name</label>
                <input type="text" class="form-control" id="fname"  name="fname" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="p" class="form-label">Photo</label>
                <input type="file" name="photo" class="form-control" id="p">
            </div>
           
            <button type="submit" name="submit_file" class="btn btn-primary">Submit</button>
            </form>
        
    </body>
</html>