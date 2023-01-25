<?php
// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'voting');
     
$show = "";

if (isset($_POST['submit'])) {

    

    $id = $_POST['id'];
    $vote1 = $_POST['vote1'];
    $vote2 = $_POST['vote2'];

    $sql = "INSERT INTO votes (id, person_1, person_2) VALUES ('$id', '$vote1', '$vote2')";
    $res = mysqli_query($db, $sql);

    $sql2 = "SELECT * FROM votes";
    $res2 = mysqli_query($db, $sql2);

    if (mysqli_num_rows($res2) > 0) {
      while ($vote = mysqli_fetch_assoc($res2)) { 
       $show = "<h3>ID:</h3>
       <p>".$vote['id']."</p>
       <h3>Vote:</h3>
       <p>".$vote['person_1']."</p>  
       <p>".$vote['person_2']."</p>";
      }
    }
   


}


// Close connection to the database 
mysqli_close($db);

?>

<html>
<head>
  <title>Voting Program</title>
</head>
<body>
  <h1>Voting Program</h1>

  <form method="post">

    <p><b>Please select your vote:</b></p>
    
    <input type="radio" name="vote1" value="Person 1"> Person 1<br />
    <input type="radio" name="vote2" value="Person 2"> Person 2<br />

    <input type="submit" name="submit" value="Submit Vote"> <br>
    votes :
                  <?php echo $show; ?>  
   
  </form>  
</body>  
</html