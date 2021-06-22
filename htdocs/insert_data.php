<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>IMDB UPDATE</title>
  </head>
  <body>
    <?php
        require_once 'dbconfig.php';
        $check=0;

        $sql="SET foreign_key_checks = 0";
        $reslult=mysqli_query($link,$sql);
        $sql="INSERT INTO MOVIES (Id,Name,Year,Runtime,rating,Plot,Budget,Gross_glob,Submitter_id)VALUES('$_POST[movie_id]','$_POST[movie_name]',$_POST[movie_year], $_POST[runtime_rating],$_POST[rating],'$_POST[plot]',$_POST[budget],$_POST[gross_glob],'$_POST[submitter_id]')";
        $result = mysqli_query($link, $sql);
        if($result === false){
           echo mysqli_error($link);
           $check=1;
        }
        $result=false;

        $sql="INSERT INTO ACTORS (Id,Name,Gender)VALUES('$_POST[actor_id]','$_POST[actor_name]','$_POST[actor_gender]')";
        $result = mysqli_query($link, $sql);
        if($result === false){
          $check=2;
           echo mysqli_error($link);
        }
        $result=false;

        $sql="INSERT INTO DIRECTORS (Id,Name)VALUES('$_POST[director_id]','$_POST[director_name]')";
        $result = mysqli_query($link, $sql);
        if($result === false){
          $check=3;
           echo mysqli_error($link);
        }
        $result=false;

        $sql="INSERT INTO DIRECTORS_GENRES (Director_id,Genre)VALUES('$_POST[director_id]','$_POST[director_genres]')";
        $result = mysqli_query($link, $sql);
        if($result === false){
          $check=4;
           echo mysqli_error($link);
        }
        $result=false;

        $sql="INSERT INTO MOVIE_DIRECTORS (Director_id,Movie_id)VALUES('$_POST[director_id]','$_POST[movie_id]')";
        $result = mysqli_query($link, $sql);
        if($result === false){
          $check=5;
           echo mysqli_error($link);
        }
        $result=false;

        $sql="INSERT INTO ROLES (Role,Actor_id,Movie_id)VALUES('$_POST[role]','$_POST[actor_id]','$_POST[movie_id]')";
        $result = mysqli_query($link, $sql);
        if($result === false){
          $check=6;
           echo mysqli_error($link);
        }
        $result=false;

        $sql="INSERT INTO MOVIE_GENRES (Movie_id,Genre)VALUES('$_POST[movie_id]','$_POST[movie_genres]')";
        $result = mysqli_query($link, $sql);
        if($result === false){
          $check=7;
           echo mysqli_error($link);
        }
        $result=false;

        if($check==0){
          echo "<h2>Successfully Insert</h2>";
        }
        else{
          echo "<h2>Fail(error code: ".$check.")</h2>";
        }
        $sql="SET foreign_key_checks = 1";
        $reslult=mysqli_query($link,$sql);
    ?>
    <form action="index.php" method="post">
          <button type="submit" class="btn-default">Return</button>
    </form>
  </body>
</html>
