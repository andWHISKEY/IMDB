<?php
    require_once 'dbconfig.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Delete Data</title>
  </head>
  <body>

    <?php
    $sql="SET foreign_key_checks = 0";
    $reslult=mysqli_query($link,$sql);//FOREIGNKEYCHECK OK;

    //director 제거
    $sql="
    Delete from directors where (select count(*) from movie_directors
    where director_id=(select director_id from movie_directors
    where movie_id=(select ID from movies where name='".$_POST['movie_name']."')))<2
      AND id=(select director_id from movie_directors
      where movie_id=(select ID from movies where name='".$_POST['movie_name']."'));";
    $reslult=mysqli_query($link,$sql);

    //director_Genre 제거
    $sql="Delete from directors_genres
    where (select count(*) from movie_directors
     where director_id=(select director_id from movie_directors
     where movie_id=(select ID from movies where name='".$_POST['movie_name']."')))<2
     AND director_id=(select director_id from movie_directors
     where movie_id=(select ID from movies where name='".$_POST['movie_name']."'))";
     $reslult=mysqli_query($link,$sql);

     //movie_directors 테이블제거

     $sql="Delete from movie_directors where movie_id=(select ID from movies where name=‘".$_POST['movie_name']."')";
     $reslult=mysqli_query($link,$sql);

     //Movie_genres 테이블제거

     $sql="Delete from Movie_genres where movie_id=(select ID from movies where name='".$_POST['movie_name']."')";
     $reslult=mysqli_query($link,$sql);

     //Reviews 테이블제거

     $sql="Delete from Reviews where movie_id=(select ID from movies where name='".$_POST['movie_name']."')";
     $reslult=mysqli_query($link,$sql);

     //Actors 테이블제거

     $sql="
     delete from actors where id=any(select actor_id from roles where actor_id=any( Select actor_id from Roles where movie_id=(select ID from movies where name='".$_POST['movie_name']."')) and actor_id=any(SELECT Actor_id FROM roles GROUP BY actor_id HAVING COUNT(*)<2))";
       $reslult=mysqli_query($link,$sql);
     //Roles 테이블제거

     $sql="Delete from Roles where movie_id=(select ID from movies where name='".$_POST['movie_name']."')";
     $reslult=mysqli_query($link,$sql);

     //Movies 테이블제거

     $sql="Delete from movies where name='".$_POST['movie_name']."'";
     $reslult=mysqli_query($link,$sql);

     $sql="SET foreign_key_checks = 1";
     $reslult=mysqli_query($link,$sql);//FOREIGNKEYCHECK OK;
     ?>

     <h2>Successfully delete movie</h2>
     <form action="index.php" method="get">
           <button type="submit" class="btn-default">Return</button>
     </form>
  </body>
</html>
