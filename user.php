<?php 

    require_once "connect.php";
    if(isset($_POST['submit'])){

        $Name=$_POST['name'];
        $Email=$_POST['email'];
        $Mobile=$_POST['mobile'];
        $Password=$_POST['password'];
        $Hash=password_hash($Password,PASSWORD_DEFAULT);

        $query="insert into `crud` (name,email,mobile,password) 
             values('$Name','$Email','$Mobile','$Password')";
        

        if(empty($Name) || empty($Email) || empty($Mobile) || empty($Password)){
            echo '<div class="alert alert-danger mt-2 text-center">Please Fill in the Blanks</div>';
        }else{
            $result = mysqli_query($con,$query);
            if($result){
                echo '<div class="alert alert-success" role="alert">
                            Data Inserted Successfully
                     </div>'; 

                     header('REFRESH:2;URL=display.php');


            }else{
                die(mysqli_error($con));
            }
        }
        
            
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Crud Operation</title>
</head>
<body>

    <div class="container my-5">
        
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Enter Your Name" name="name" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Article Image</label>
                <input type="file" class="form-control" name="image" autocomplete="off">
            </div>

            <div class="mb-3">
                <label class="form-label">Mobile Number</label>
                <input type="text" class="form-control" placeholder="Enter Your Mobile Number" name="mobile">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter Your Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>