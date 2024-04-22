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

    <div class="container my-4" id="ques">
        <h2 class="text-center my-4">Studdy Buddy - Browse Quizes</h2>
        <div class="row my-4">
            <!-- Fetch all the categories -->
            <!-- Use a for loop to iterate through all categories -->
            <?php $sql = "SELECT * FROM `quizes` "; 
          $result = mysqli_query($conn , $sql);
          while($row = mysqli_fetch_assoc($result)){
            // echo $row['category_id'];
            // echo $row['category_name'];
           $qid = $row['qcat_id'];
           $qcat = $row['qcat_name'];
           $qdesc = $row['qcat_desc'];
           echo ' <div class="col-md-4 my-2">
            <div class="card" style="width: 18rem;">
                <img src="images/buildings.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><a href="' . $qcat .'/'. $qcat . '.php">' . $qcat . '</a></h5>
                    <p class="card-text">' . substr( $qdesc  ,0 , 40) . '...</p>
                    <a href="' . $qcat .'/'. $qcat . '.php" class="btn btn-success">View Questions</a>
                </div>
            </div>
          </div>';
          }
          
          ?>








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