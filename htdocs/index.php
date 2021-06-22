<?php
    require_once 'dbconfig.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

<meta charset="utf-8">
<title>IMDB</title>

<style>

table {
width: 65%;
border: 1px solid #444444;
    border-collapse: collapse;
    margin-left: 200px;
}
th, td {
border: 1px solid #444444;
}
#menu{
background-color: #2d2d2d;
height: 70px;
border: 1px solid #ccc;
border-width: 1px 0;
}
#topMenu {
height: 60px;
width: 1300px;
align: 0 auto;
}
#topMenu ul li{
list-style: none;
color: white;
background-color: #2d2d2d;
float: left;
line-height: 50px;
vertical-align: middle;
text-align: center;
text-align: center;
}
#menu .right{
float: right;

}
#Menu ul li{
/* float: none; 세로 출력*/
background-color: #636363;
}
#topMenu li ul{
background-color: #636363;
position:absolute;
display:none;
}
#topMenu li:hover ul {
display:block;
}
#topMenu .menuLink {
text-decoration:none;
color: white;
display: block;
width: 150px;
font-size: 20px;
font-weight: bold;
font-family: "Trebuchet MS", Dotum, Arial;
}
#topMenu .menuLink:hover {
color: red;
background-color: #4d4d4d;
}
#topMenu .menuL {
text-decoration:none;
color: white;
display: block;
width: 170px;
font-size: 20px;
font-weight: bold;
font-family: "Trebuchet MS", Dotum, Arial;
}
#topMenu .menuL:hover {
color: red;
background-color: #4d4d4d;
}
#delete_step label{
width:75%;
font-size: 20px;
float: left;
font-weight: bold;
font-family: "Trebuchet MS", Dotum, Arial;
}

#updateform label{
width:75%;
font-size: 20px;
float: left;
font-weight: bold;
font-family: "Trebuchet MS", Dotum, Arial;
}

.form-search{
height: 25px;
width: 150px;
    font-size: 15px;
    font-weight: bold;
    font-family: "Trebuchet MS", Dotum, Arial;


}
#delete_step .form-control{
font-size: 18px;
height: 40px;
width: 600px;
font-weight: bold;
font-family: "Trebuchet MS", Dotum, Arial;

}
#updateform .form-control{
font-size: 18px;
height: 40px;
width: 600px;
font-weight: bold;
font-family: "Trebuchet MS", Dotum, Arial;


}
#search{
font-size: 20px;
width: 90px;
font-weight: bold;
font-family: "Trebuchet MS", Dotum, Arial;
}
#search_btn{
height: 25px;
font-weight: bold;
font-family: "Trebuchet MS", Dotum, Arial;
}
#btn-step1{
font-size: 30px;
font-weight: bold;
font-family: "Trebuchet MS", Dotum, Arial;
}
#btn-step2{
font-size: 30px;
font-weight: bold;
font-family: "Trebuchet MS", Dotum, Arial;
}
#btn-step3{
font-size: 30px;
font-weight: bold;
font-family: "Trebuchet MS", Dotum, Arial;
}
#btn-delete{
font-size: 30px;
font-weight: bold;
font-family: "Trebuchet MS", Dotum, Arial;
}

.step{
    font-size: 50px;
    font-weight: bold;
    font-family: "Trebuchet MS", Dotum, Arial;
color: red;
}
body { text-align: center; /* Quirks Mode 를 위한 가운데 정렬 */ }

.input:hover{
cursor:pointer;
}
#home{
font-size: 60px;
font-weight: bold;
font-family: "Trebuchet MS", Dotum, Arial;
color: black;
}
#updatestep1{
display: none
}
#updatestep2{
display: none
}
#updatestep3{
display: none
}
#delete_step{
display: none
}
</style>
</head>
<body>
<a id="home" href="index.php">8조 IMDB</a>
<br>
<div id="menu">
<nav id="topMenu">
<ul>
<li><a class="menuLink" href="#">Movie</a>
<nav id="Menu">
<ul>
<li><a class="menuL" href="movie.php">movies</a></li>
<li><a class="menuL"href="movie_genres.php">movie_genres</a></li>
</ul>
</nav>
</li>
<li><a class="menuLink" href="#">Actor</a>
<nav id="Menu">
<ul>
<li><a class="menuL"href="actors.php">actors</a></li>
<li><a class="menuL"href="roles.php">roles</a></li>
</ul>
</nav>
</li>
<li><a class="menuLink" href="#">Director</a>
<nav id="Menu">
<ul>
<li><a class="menuL"href="movie_directors.php">movie_directors</a></li>
<li><a class="menuL"href="directors_genres.php">directors_genres</a></li>
<li><a class="menuL"href="directors.php">directors</a></li>
</ul>
</nav>
</li>
<li><a class="menuLink" href="#">Review</a>
<nav id="Menu">
<ul>
<li><a class="menuL"href="reviews.php">reviews</a></li>
</ul>
</nav>
</li>
<li class="right">
<form name="mysearchbar" action="search.php" method="post">
<div class="input-group">

<select id="search" name="search">
<option value="movie">movie</option>
<option value="actor">actor</option>
<option value="director">director</option>
<option value="genre">genre</option>
</select>
<input name="Search_name" type="text" class="form-search" placeholder="search"/>
&nbsp;&nbsp;
<button type="submit" id="search_btn">검색</button>
</div>
</form>
</li >
<li class="right"><a class="menuLink" href="#"  id="update_step1">Update</a></li>
<li class="right"><a class="menuLink" href="#"  id="delete">Delete</a></li>
</ul>
</nav>
</div>
<br><br>

<!-- delete -->
<form action="delete_data.php" method="post">
<div id="delete_step">
<h2 class="step">DELETE DATA</h2>
<br><br><br>
<div class="form-group">
<label for="delete_movie_id">Movie Name</label>
<br><br>
<input type="delete_movie_id" class="form-control" name="movie_name" id="delete_movie_id" placeholder="Enter movie name here (e.g. Joker)" required>
</div>
<br><br>
<button type="submit" id="btn-delete">Delete</button>
</div>
</form>


<!-- update -->
<form action="insert_data.php" method="post">
<div id="updateform">


<!-- STEP1: INPUT MOVIES TABLE -->

<div id="updatestep1">
<h2 class="step">STEP1: INPUT MOVIES TABLE</h2>
<br><br><br>
<div class="form-group">
<label for="movie_id">Movie ID</label>
<br><br>
<input type="movie_id" class="form-control" name="movie_id" id="movie_id" placeholder="Enter movie ID here (e.g., 0119177)" required>
</div>
<br><br>
<div class="form-group">
<label for="movie_name">Movie Name</label>
<br><br>
<input type="movie_name" class="form-control" name="movie_name" id="movie_name" placeholder="Enter movie name here (e.g., Gattaca)"required>
</div>
<br><br>
<div class="form-group">
<label for="movie_year">Movie Year</label>
<br><br>
<input type="movie_year" class="form-control" name="movie_year" id="movie_year" placeholder="Enter movie year here (e.g., 1965)"required>
</div>
<br><br>
<div class="form-group">
<label for="movie_genres">Movie Genres</label>
<br><br>
<input type="movie_genres" class="form-control" name="movie_genres" id="movie_genres" placeholder="Enter movie genres here (e.g., Drama | Family | Musical)"required>
</div>
<br><br>
<div class="form-group">
<label for="runtime_rating">Runtime</label>
<br><br>
<input type="runtime_rating" class="form-control" name="runtime_rating" id="runtime_rating" placeholder="Enter runtime rating here (e.g., 172)"required>
</div>
<br><br>
<div class="form-group">
<label for="rating">Rating</label>
<br><br>
<input type="rating" class="form-control" name="rating" id="rating" placeholder="Enter Rating here (e.g., 7.1)"required>
</div>
<br><br>
<div class="form-group">
<label for="plot">Plot</label>
<br><br>
<input type="plot" class="form-control" name="plot" id="plot" placeholder="Enter plot here (e.g., A woman leaves an Austrian convent t.....)"required>
</div>
<br><br>
<div class="form-group">
<label for="budget">Budget</label>
<br><br>
<input type="budget" class="form-control" name="budget" id="budget" placeholder="Enter budget here (e.g., 8200000)"required>
</div>
<br><br>
<div class="form-group">
<label for="gross_glob">Gross glob</label>
<br><br>
<input type="gross_glob" class="form-control" name="gross_glob" id="gross_glob" placeholder="Enter Gross glob here (e.g., 159413574)"required>
</div>
<br><br>
<div class="form-group">
<label for="submitter_id">Submitter ID</label>
<br><br>
<input type="submitter_id" class="form-control" name="submitter_id" id="submitter_id" placeholder="Enter submitter id here (e.g., 2017113323)"required>
</div>
<br><br>
<button type="button" id="btn-step1">next</button>
</div>

<!-- STEP2: INPUT ACTORS TABLE -->

<div id="updatestep2">
<h2 class="step">STEP2: INPUT ACTORS TABLE</h2>
<br><br><br>
<div class="form-group">
<label for="movie_id">Movie ID</label>
<br><br>
<input type="movie_id" class="form-control" name="movie_id" id="movie_id" placeholder="Enter movie ID here (e.g., 0059742)"required>
</div>
<br><br>
<div class="form-group">
<label for="actor_id">Actor ID</label>
<br><br>
<input type="actor_id" class="form-control" name="actor_id" id="actor_id" placeholder="Enter actor ID here (e.g., 0000267)"required>
</div>
<br><br>
<div class="form-group">
<label for="actor_name">Actor Name</label>
<br><br>
<input type="actor_name" class="form-control" name="actor_name" id="actor_name" placeholder="Enter actor name here (e.g., Julie Andrews)"required>
</div>
<br><br>
<div class="form-group">
<label for="actor_gender">Actor Gender</label>
<br><br>
<input type="actor_gender" class="form-control" name="actor_gender" id="actor_gender" placeholder="Enter actor gender here (e.g., F)"required>
</div>
<br><br>
<div class="form-group">
<label for="role">Role</label>
<br><br>
<input type="role" class="form-control" name="role" id="role" placeholder="Enter role here (e.g., Maria)"required>
</div>
<br><br>
<button type="button" id="btn-step2">next</button>
</div>

<!-- STEP3: INPUT DIRECTORS TABLE -->

<div id="updatestep3">
<h2 class="step">STEP3: INPUT DIRECTORS TABLE</h2>
<br><br><br>
<div class="form-group">
<label for="movie_id">Movie ID</label>
<br><br>
<input type="movie_id" class="form-control" name="movie_id" id="movie_id" placeholder="Enter movie ID here (e.g., 0059742)"required>
</div>
<br><br>
<div class="form-group">
<label for="director_id">Director ID</label>
<br><br>
<input type="director_id" class="form-control" name="director_id" id="director_id" placeholder="Enter director ID here (e.g., 0936404)"required>
</div>
<br><br>
<div class="form-group">
<label for="director_name">Director Name</label>
<br><br>
<input type="director_name" class="form-control" name="director_name" id="director_name" placeholder="Enter director name here (e.g., Robert Wise)"required>
</div>
<br><br>
<div class="form-group">
<label for="director_genres">Director Genres</label>
<br><br>
<input type="director_genres" class="form-control" name="director_genres" id="director_genres" placeholder="Enter actor genres here (e.g., Drama | Family | Musical)"required>
</div>
<br><br>
<button type="submit" id="btn-step3">Insert</button>
</div>
</div>
</form>
<script language="javascript">
document.getElementById("delete").onclick = function() {
    document.getElementById("delete_step").style.display="block";
    document.getElementById("all_table").style.display="none";
    document.getElementById("updatestep1").style.display="none";
    document.getElementById("updatestep2").style.display="none";
    document.getElementById("updatestep3").style.display="none";

}
document.getElementById("btn-delete").onclick = function() {
    document.getElementById("delete_step").style.display="none";
    document.getElementById("all_table").style.display="block";
    document.getElementById("home").scrollIntoView();
}

document.getElementById("update_step1").onclick = function() {
    document.getElementById("updatestep1").style.display="block";
    document.getElementById("all_table").style.display="none";
    document.getElementById("delete_step").style.display="none";
    document.getElementById("updateform").scrollIntoView();

}

document.getElementById("btn-step1").onclick = function() {
    document.getElementById("updatestep2").style.display="block";
    document.getElementById("updatestep1").style.display="none";
    document.getElementById("all_table").style.display="none";
    document.getElementById("updateform").scrollIntoView();
}
document.getElementById("btn-step2").onclick = function() {
    document.getElementById("updatestep3").style.display="block";
    document.getElementById("updatestep2").style.display="none";
    document.getElementById("updateform").scrollIntoView();
}
document.getElementById("btn-step3").onclick = function() {
    document.getElementById("updatestep3").style.display="none";
    document.getElementById("all_table").style.display="block";
    document.getElementById("home").scrollIntoView();
}
</script>

<div id="all_table">

<!-- MOVIES table -->
<?php
    $sql="select count(*) as num_movies from MOVIES;";
    $result = mysqli_query($link, $sql);
    $data=mysqli_fetch_assoc($result);
    // echo $data['num_movies'];
    ?>
<p><h3> MOVIE table (Currently <?php echo $data['num_movies']; ?> movies in database)</h3></p>

<table cellspacing="0" width="100%">
<thead>
<tr>
<th>Movie ID</th>
<th>Name</th>
<th>Year</th>
<th>Runtime</th>
<th>Rating</th>
<th>Plot</th>
<th>Budget</th>
<th>Gross_glob</th>
<th>Submitter_id</th>
</tr>
</thead>

<tbody>
<?php
    $sql = "select * from MOVIES;";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        print "<tr>";
        foreach ($row as $key => $val){
            if(!strcmp($key,"Name")){
                ?>
<td>
<a href="movie_description.php?val=<?php echo $val ?>&id=<?php echo $MOVIE_ID?>"><?php echo $val?></a>
</td>
<?php
    }else{
        if(!strcmp($key,"Id")){
            $MOVIE_ID=$row['Id'];
        }
        print "<td>" . $val . "</td>";
    }
    }
    print "</tr>";
    }
    ?>
</tbody>
</table>

<?php
    $sql="select count(*) as num_movie_directors from MOVIE_DIRECTORS;";
    $result = mysqli_query($link, $sql);
    $data=mysqli_fetch_assoc($result);
    // echo $data['num_movie_directors'];
    ?>
<p><h3> MOVIE_DIRECTOR table (Currently <?php echo $data['num_movie_directors']; ?> movie_directors in database)</h3></p>

<table cellspacing="0" width="100%">
<thead>
<tr>
<th>Director ID</th>
<th>Movie ID</th>
</tr>
</thead>

<tbody>
<?php
    $sql = "select * from MOVIE_DIRECTORS;";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        print "<tr>";
        foreach ($row as $key => $val){
            print "<td>" . $val . "</td>";
        }
        print "</tr>";
    }
    ?>
</tbody>
</table>

<?php
    $sql="select count(*) as num_movie_genres from MOVIE_GENRES;";
    $result = mysqli_query($link, $sql);
    $data=mysqli_fetch_assoc($result);
    // echo $data['num_movie_genres'];
    ?>
<p><h3> MOVIE_GENRES table (Currently <?php echo $data['num_movie_genres']; ?> movie_genres in database)</h3></p>
<p>

<table cellspacing="0" width="100%">
<thead>
<tr>
<th>Movie ID</th>
<th>Genre</th>
</tr>
</thead>

<tbody>
<?php
    $sql = "select * from MOVIE_GENRES;";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        print "<tr>";
        foreach ($row as $key => $val){
            print "<td>" . $val . "</td>";
        }
        print "</tr>";
    }
    ?>
</tbody>
</table>
<?php
    $sql="select count(*) as num_actors from ACTORS;";
    $result = mysqli_query($link, $sql);
    $data=mysqli_fetch_assoc($result);
    // echo $data['num_actors'];
    ?>
<p><h3> ACTORS table (Currently <?php echo $data['num_actors']; ?> actors in database)</h3></p>
<!--actor-->
<table cellspacing="0" width="100%">
<thead>
<tr>
<th>Actor ID</th>
<th>Name</th>
<th>Gender</th>
</tr>
</thead>

<tbody>
<?php
    $sql = "select * from ACTORS;";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        print "<tr>";
        foreach ($row as $key => $val){
            print "<td>" . $val . "</td>";
        }
        print "</tr>";
    }
    ?>
</tbody>
</table>

<?php
    $sql="select count(*) as num_directors from DIRECTORS;";
    $result = mysqli_query($link, $sql);
    $data=mysqli_fetch_assoc($result);
    // echo $data['num_directors'];
    ?>
<p><h3> DIRECTOR table (Currently <?php echo $data['num_directors']; ?> directors in database)</h3></p>
<table cellspacing="0" width="100%">
<thead>
<tr>
<th>Director ID</th>
<th>Name</th>
</tr>
</thead>

<tbody>
<?php
    $sql = "select * from DIRECTORS;";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        print "<tr>";
        foreach ($row as $key => $val){
            print "<td>" . $val . "</td>";
        }
        print "</tr>";
    }
    ?>
</tbody>
</table>

<?php
    $sql="select count(*) as num_directors_genres from DIRECTORS_GENRES;";
    $result = mysqli_query($link, $sql);
    $data=mysqli_fetch_assoc($result);
    // echo $data['num_directors_genres'];
    ?>
<p><h3> DIRECTOR_GENRE table (Currently <?php echo $data['num_directors_genres']; ?> directors_genres in database)</h3></p>

<table cellspacing="0" width="100%">
<thead>
<tr>
<th>Director ID</th>
<th>Genre</th>
</tr>
</thead>

<tbody>
<?php
    $sql = "select * from DIRECTORS_GENRES;";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        print "<tr>";
        foreach ($row as $key => $val){
            print "<td>" . $val . "</td>";
        }
        print "</tr>";
    }
    ?>
</tbody>
</table>

<?php
    $sql="select count(*) as num_reviews from REVIEWS;";
    $result = mysqli_query($link, $sql);
    $data=mysqli_fetch_assoc($result);
    // echo $data['num_reviews'];
    ?>
<p><h3> REVIEW table (Currently <?php echo $data['num_reviews']; ?> reviews in database)</h3></p>

<table cellspacing="0" width="100%">
<thead>
<tr>
<th>Reviewer ID</th>
<th>Movie ID</th>
<th>Rating</th>
<th>Date</th>
<th>Review text</th>
</tr>
</thead>

<tbody>
<?php
    $sql = "select * from REVIEWS;";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        print "<tr>";
        foreach ($row as $key => $val){
            print "<td>" . $val . "</td>";
        }
        print "</tr>";
    }
    ?>
</tbody>
</table>

<?php
    $sql="select count(*) as num_roles from ROLES;";
    $result = mysqli_query($link, $sql);
    $data=mysqli_fetch_assoc($result);
    // echo $data['num_roles'];
    ?>
<p><h3> ROLE table (Currently <?php echo $data['num_roles']; ?> roles in database)</h3></p>

<table cellspacing="0" width="100%">
<thead>
<tr>
<th>Role</th>
<th>Actor ID</th>
<th>Movie ID</th>
</tr>
</thead>

<tbody>
<?php
    $sql = "select * from ROLES;";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        print "<tr>";
        foreach ($row as $key => $val){
            print "<td>" . $val . "</td>";
        }
        print "</tr>";
    }
    ?>
</tbody>
</table>
<?php
    mysqli_close($link);
    ?>
</div>
</body>
</html>
