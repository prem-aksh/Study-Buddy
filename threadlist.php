<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
    #ques {
        min-height: 434px;
    }
    </style>
    <title>Welcome to Studdy Buddy</title>
</head>

<body>

    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/dbconnect.php'; ?>
    <?php
     $id = $_GET['catid'];
     $sql = "SELECT * FROM `categories` WHERE category_id=$id "; 
     $result = mysqli_query($conn , $sql);
     while($row = mysqli_fetch_assoc($result)){
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
     }
    
    ?>

    <?php
    $showAlert= false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        //INSERT THREAD INSIDE DB
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $sno = $_POST['sno'];
        $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', '$id', '$sno', current_timestamp()) "; 
        $result = mysqli_query($conn , $sql);
        $showAlert= true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success! </strong> Your thread has been added to discussion please wait for someone to respond.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
        }
    };
    ?>


    <!-- category container starts here -->
    <div class="container my-4" id="ques">
        <div class="jumbotron">
            <h1 class="display-4">Welcome To <?php echo $catname;?> Forum!</h1>
            <p class="lead"><?php echo $catdesc;?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum for sharing knowledge with each other.</p>
            <p class="lead">
                Posted By : Anuvrat 
            </p>
        </div>
    </div>

    <div class="container">
    <?php
    if(isset($_SESSION['loggedin']) &&  $_SESSION['loggedin']==true){
     echo '<div class="container">
        <form action= "' .  $_SERVER['REQUEST_URI'] . ' " method="post">
        <h1 class="py-2">Start a Discussion</h1>
            <div class="form-group">
                <label for="exampleInputEmail1">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" id="exampleInputEmail1" aria-describedby="emailHelp"
                >
                <small id="emailHelp" class="form-text text-muted">Keep the title short buddy
                </small>
            </div>
            <input type="hidden" name="sno" value="' . $_SESSION["sno"] . ' ">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Elaborate your concern</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        </div>';
    }

    else {
        echo "Please log in to start a thread in this page.";
    }
    ?>
        <h1 class="py-2">Browse Questions</h1>
        <?php
         $id = $_GET['catid'];
         $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id "; 
         $result = mysqli_query($conn , $sql);
         $noResult = true;
         while($row = mysqli_fetch_assoc($result)){
         $noResult = false;
         $title = $row['thread_title'];
         $desc = $row['thread_desc'];
         $id = $row['thread_id'];
         $thread_time = $row['timestamp'];
         $thread_user_id = $row['thread_user_id'];
         $sql2 = "SELECT user_email FROM  `users` WHERE sno='$thread_user_id'";
         $result2 = mysqli_query($conn,$sql2);
         $row2 = mysqli_fetch_assoc($result2);
         
         
       echo ' <div class="media my-3">
       <img src="images/default-user.png" width="54px" class="mr-3" alt="...">
       <div class="media-body">'.
        '<h5 class="mt-0"> <a class="text-dark" href="thread.php?threadid=' . $id. '">'. $title . ' </a></h5>
           '. $desc . ' </div>'.'<div class="font-weight-bold my-0"> Asked by: '. $row2['user_email'] . ' at '. $thread_time. '</div>'.
   '</div>';
              
     }
      echo var_dump($noResult);
      if($noResult)
      {
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p class="display-4">No threads found</p>
          <p class="lead">Be the first person to ask a question</p>
        </div>
      </div>';
      }
    ?>
       
    </div>




    <?php include 'partials/_footer.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

</html>