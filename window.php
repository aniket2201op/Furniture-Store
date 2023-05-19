<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        #ques {
            min-height: 433px;
        }
    </style>
    <title>Furniture Webshop</title>
    <link rel="shortcut icon" type="image/png" href="images/logo.png">
</head>

<body>
    <?php include 'connect.php'; ?>

    <?php
    $id = $_GET['bed_name'];
    $sql = "SELECT * FROM `window_set` WHERE window_id=$id;";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {

        $_name = $row['set_name'];
        $_price = $row['price'];
        $_description = $row['description'];
        $_image = $row['image'];
        $_quantity = $row['quantity'];

    }

    ?>
    <!-- 
    <?php
            $showAlert = false;
            $method = $_SERVER['REQUEST_METHOD'];
            if ($method == 'POST') {
                //Insert into comment db
                $username = $_SESSION['username'];
                $comment = $_POST['comment'];
                $comment = str_replace("<", "&lt;", $comment);
                $comment = str_replace(">", "&gt;", $comment);
               
                $sql = "INSERT INTO `comments`(`comment_id`, `comment_content`, `comment_time`, `comment_by`) VALUES ('$_name','$comment',current_timestamp(),'$username')";
                $result = mysqli_query($conn, $sql);
                $showAlert = true;
                if ($showAlert) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong>'. $username .' Your comment has been added!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                          </div>';
             }
        }
        ?>


    <!-- Category container starts here -->
    <div class="container my-4">
        <nav class="navbar bg-light">
            <div class="container-fluid">
                <a class="navbar-brand">Available Window Sets</a>
            </div>
        </nav>
        <div class="jumbotron">
            <center><img style="width: 500px;" src="images/<?php echo $_image; ?>" alt=""></center>
            <h1 class="display-4"><?php echo $_name; ?></h1>
            <p class="lead"> <?php echo $_description; ?></p>
            <hr class="my-4">
            <p style="font-size: 3rem;">Price : <?php echo $_price; ?></p>
            <p style="color: blue;"><?php if ($_quantity < 10) {
                echo "<p style='color: red;'>Hurry only $_quantity left!</p>";
            }else {echo "Stock is available";} ?></p>
            <input class="btn" style="background-color: #df803d;" type="submit" value="Buy now" />
            <!-- <p>Posted by: <em><?php echo $posted_by; ?></em></p> -->
        </div>
    </div>

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '<div class="container">
        <h1 class="py-2">Post a Comment</h1> 
        <form action= "' . $_SERVER['REQUEST_URI'] . '" method="post"> 
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Type your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                <input type="hidden" name="sno" value="' . $_SESSION["username"] . '">
            </div>
            <button type="submit" class="btn btn-success">Post Comment</button>
        </form> 
    </div>';
    } else {
        echo '
        
        <div class="container">
        <h1 class="py-2">Post a Comment</h1> 
           <p class="lead">You are not logged in. Please login to be able to post comments.</p>
        </div>
        ';
    }

    ?>


<div class="container mb-5" id="ques">
        <h1 class="py-2">Comments</h1>
        <?php
        $id = $_GET['bed_name'];
        $sql = "SELECT * FROM `comments` WHERE comment_id='$_name'";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['comment_id'];
            $content = $row['comment_content'];
            $comment_time = $row['comment_time'];
            $thread_user_id = $row['comment_by'];

            echo '<div class="media my-3">
            <img src="images/default_user.png" width="54px" class="mr-3" alt="...">
            <div class="media-body">
               <p class="font-weight-bold my-0">' . $thread_user_id . ' at ' . $comment_time . '</p> ' . $content . '
            </div>
        </div>';
        }
        
        if ($noResult) {
            echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">No Comments Found</p>
                        <p class="lead"> Be the first person to comment</p>
                    </div>
                 </div> ';
        }

        ?>

    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>