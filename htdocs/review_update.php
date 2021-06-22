<?php
    require_once 'dbconfig.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>IMDB</title>
  </head>
  <body>
    <?php
     if(isset($_POST['Reviewer_id'])){
     $rtime=date("Y-m-d H:i:s",time());
     $sql  = "
         INSERT INTO REVIEWS (
             Reviewer_id,
             Movie_id,
             Rating,
             Date,
             Review_text
         ) VALUES (
             '".$_POST["Reviewer_id"]."',
             '".$_POST["Movie_id"]."',
             '".$_POST["Rating"]."',
              '".$rtime."',
             '".$_POST["Review_text"]."'
         )";
     $result = mysqli_query($link, $sql);
     if($result === false){
        echo mysqli_error($link);
     }else {
       print "Successfully Insert your Review";
     }
    }
     ?>
     <h2>Successfully adding your review</h2>
     <form action="movie_description.php" method="get">
            <input type="hidden" name="id" value=<?php echo $_POST['Movie_id'] ?>>
           <button type="submit" class="btn-default">Return</button>
     </form>

  </body>
</html>
