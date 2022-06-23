<!DOCTYPE HTML>  
<html>
<head>
<title>Request Tutoring</title>
<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>  

<?php
// define variables and set to empty values
$fnameErr = $lnameErr = $ageErr = $genderErr = $emailErr = $cellNumErr = $topicErr = $dateErr = $commentErr =  $websiteErr = "";
$fname = $lname = $age = $gender = $email = $cellNumber = $topic = $date = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fnameErr = "First Name is required";
  } else {
    $fname = test_input($_POST["fname"]);
    // check if first name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]+$/",$fname)) {
      $fnameErr = "Only letters and white space allowed";
    }
  }
    if (empty($_POST["lname"])) {
    $lnameErr = "Last Name is required";
  } else {
    $lname = test_input($_POST["lname"]);
    // check if last name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]+$/",$lname)) {
      $lnameErr = "Only letters and white space allowed";
    }
  }
   if (empty($_POST["age"])) {
       $ageErr = "Age required";
   } else {
       $age = test_input($_POST["age"]);
        
       if(!preg_match("/^100|[1-9]?\d$/", $age)) {
         $ageErr = "Invalid Age format!";
       }
   }
   if (empty($_POST["gender"])) {
     $genderErr= "Gender is required";
   } else{
     $gender = test_input($_POST["gender"]);

   }
   if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if (empty($_POST["cell"])) { 
    $cellNumErr = "Cell Number Required!";
  } else {
    $cellNumber = test_input($_POST["cell"]);

    if(!preg_match("/^[2-9]\d{2}-\d{3}-\d{4}$/", $cellNumber)) {

    }
  }
  if (empty($_POST["topic"])) {
    $topicErr = "Topic Required!";
  } else {
    $topic = test_input($_POST["topic"]);
  }
  if (empty($_POST["date"])) {
    $dateErr = "Enter a date";

  } else {
    $date = test_input($_POST["date"]);

    if (!preg_match("/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/", $date)) {
      $dateErr = "Invalid date format";
    }
  }
  if (empty($_POST["website"])) {
    $websiteErr = "Enter a website ";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $commentErr = "Enter a comment";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

{
// database instructions go here!
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'tutoringdb';
// Connect to the database
$dbc = mysqli_connect($servername, $username,$password,$dbname);
	

if ($dbc->connect_error) {
  die("connection failed: ". $dbc->connect_error);
}
// build up your query string
$sql = "INSERT INTO tutoringtb (fname, lname, age, gender, email,
cellNumber, topic, date, website, comment) VALUES (" .
"'" . $fname . "', " .
"'" . $lname . "', " .
"'" . $age . "', " .
"'" . $gender . "', " .
"'" . $email . "', " .
"'" . $cellNumber . "'," .
"'" . $topic . "'," .
"'" . $date . "'," .
"'" . $website . "', " .
"'" . $comment . "'" .
");";
// execute the query
if ($dbc->query($sql) === true) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br/>" . $dbc->error;
}
// close the database connection
mysqli_close($dbc);

}

?>
<header>
<h1>Request Tutoring</h1>
</header>
<nav>
  <ul>
    <li><a href="home.php">Home</a></li>
    <li><a href="requesttutoring.php">Request Tutoring</a></li>
  </ul>
</nav>

<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  First Name: <input type="text" name="fname" value="<?php echo $fname;?>">
  <span class="error">* <?php echo $fnameErr;?></span>
  <br><br>
  Last Name: <input type="text" name="lname" value="<?php echo $lname;?>">
  <span class="error">* <?php echo $lnameErr;?></span>
  <br><br>
  Age: <input type="number" name="age" value="<?php echo $age?>">
  <span class="error">* <?php echo $ageErr;?></span>
  <br><br>
  Gender: <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Cell: <input type="text" name="cell" value="<?php echo $cellNumber;?>">
  <span class="error">* <?php echo $cellNumErr;?></span>
  <br><br>
  Tutoring Topic: <input type="text" name="topic" value="<?php echo $topic;?>">
  <span class="error">* <?php echo $topicErr;?></span>
  <br><br>
  Tutoring Date: <input type="date" name="date" value="<?php echo $date;?>">
  <span class="error">* <?php echo $dateErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error">* <?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40" value="<?php echo $comment;?>"></textarea>
  <span class="error">* <?php echo $commentErr;?></span>
  <br><br>
 
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $fname;
echo "<br>";
echo $lname;
echo "<br>";
echo $age;
echo "<br>";
echo $email;
echo "<br>";
echo $cellNumber;
echo "<br>";
echo $topic;
echo "<br>";
echo $date;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
?>

<footer>
  &copy; 2021 Curtis Crouse
</footer>
</body> 
</html> 