 <!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<h2>Application Form Validation</h2>
<?php
session_start();
$errmsg = "";
function sanitise_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//firstname
if (isset($_POST["firstname"])) {
    $temp = $_POST["firstname"];
    $Firstname = sanitise_input($temp);
    $_SESSION["fname"] = $Firstname;
} else {
    $errmsg .= "<p>Field can't be empty</p>";
}
//LastName
if (isset($_POST["lastname"])) {
    $LastName = $_POST["lastname"];
    $LastName = sanitise_input($LastName);
    $_SESSION["lname"] = $LastName;
}else {
    $errmsg .= "<p>Field can't be empty</p>";
}
//address
if (isset($_POST["street"])) {
    $Address = $_POST["street"];
    $Address = sanitise_input($Address);
    $_SESSION["street"] = $Address;
}else {
    $errmsg .= "<p>Field can't be empty</p>";
}
//Suburb
if (isset($_POST["suburb"])) {
    $Suburb = $_POST["suburb"];
    $Suburb = sanitise_input($Suburb);
    $_SESSION["suburb"] = $Suburb;

}else {
    $errmsg .= "<p>Field can't be empty</p>";
}
//state
if (isset($_POST["state"])) {
    $State = $_POST["state"];
    $State = sanitise_input($State);
    $_SESSION["state"] = $State;

}else {
    $errmsg .= "<p>Field can't be empty</p>";
}
//Postcode
if (isset($_POST["postcode"])) {
    $Postcode = $_POST["postcode"];
    $Postcode = sanitise_input($Postcode);
    $_SESSION["postcode"] = $Postcode;

}else {
    $errmsg .= "<p>Field can't be empty</p>";
}
//email
if (isset($_POST["email"])) {
    $email = $_POST["email"];
    $email = sanitise_input($email);
    $_SESSION["email"] = $email;

}else {
    $errmsg .= "<p>Field can't be empty</p>";
}
//Firstname and last name
if ($Firstname == "") {
	$errmsg .= "<p> You should fill in your first name.</p>";
} else if (!preg_match("/^[a-zA-Z]{0,20}$/", $Firstname)) {
    $errmsg .= "<p> Only 20 alpha letters are allowed in your first name.</p>";
}
if ($LastName == "") {
    $errmsg .= "<p> You should fill in your last name.</p>";
} else if (!preg_match("/^[a-zA-Z]{0,20}$/", $LastName)) {
    $errmsg .= "<p> Last Name can only contain 20 characters.</p>";
}
//streetaddress
if ($Address == "") {
    $errmsg .= "<p> You should fill in your  Address.</p>";
}
//suburb/town
if ($Suburb == "") {
    $errmsg .= "<p> You should fill in your suburb/town.</p>";
}
//postcode 
if ($Postcode == "") {
    $errmsg .= "<p> You must enter your Postcode.</p>";
}
//state
if	($State == "VIC") {
	if (!preg_match ("/(3|8)\d+/", $Postcode)){
	$errmsg .= "<p>Your post code is incorrect, it does not match the selected state.</p>";
}
}
//state new south wales validation
if	($State == "NSW") {
	if (!preg_match ("/(1|2)\d+/", $Postcode)){
	$errmsg .= "<p>Your post code is incorrect, it does not match the selected state New South Wales.</p>";
}
}
//state queensland validation
if	($State == "QSL") {
	if (!preg_match ("/(4|9)\d+/", $Postcode)){
	$errmsg .= "<p>Your post code is incorrect, it does not match the selected state Queensland.</p>";
}
}
//state Northern Territory validation
if	($State == "NT") {
	if (!preg_match ("/0\d+/", $Postcode)){
	$errmsg .= "<p>Your post code is incorrect, it does not match the selected state Northern Territory.</p>";
}
}
//state Western Australia validation
if	($State == "WA") {
	if (!preg_match ("/6\d+/", $Postcode)){
	$errmsg .= "<p>Your post code is incorrect, it does not match the selected state Western Australia.</p>";
}
}
//state South Australia validation
if	($State == "SA") {
	if (!preg_match ("/5\d+/", $Postcode)){
	$errmsg .= "<p>Your post code is incorrect, it does not match the selected state South Australia.</p>";
}
}
//state Tasmania validation
if	($State == "TAS") {
	if (!preg_match ("/7\d+/", $Postcode)){
	$errmsg .= "<p>Your post code is incorrect, it does not match the selected state Tasmania.</p>";
}
}
//state Australian Capital Territory validation
if	($State == "ACT") {
	if (!preg_match ("/0\d+/", $Postcode)){
	$errmsg .= "<p>Your post code is incorrect, it does not match the selected state Australian Capital Territory.</p>";
}
}
//email
if ($email == "") {
	$errmsg .= "<p> You should fill in your email address.</p>";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$errmsg .= "<p> Invalid email address.</p>";
}
	//Phone number
    $PhoneNumber = trim($_POST["phone"]);
    if ($PhoneNumber==""){
        $errmsg .= "<p>Please enter Phone Number.</p>";
    }
    else if (!preg_match("/^[\d]{8,12}+$/", $PhoneNumber)){
        $errmsg .= "<p>Phone Number should contain 8 to 12 digits only. <p>";
    }
	if ($errmsg != "") {
        $_SESSION["errmsg"] = $errmsg;
		header("location: fix_order.php");
	}
    else{
        require_once "settings.inc";
        $conn = mysqli_connect($host, $user, $pwd, $sql_db);
        if ($conn){
            $query = "CREATE TABLE IF NOT EXISTS EOI (
                EOInumber INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                JobReferenceNumber VARCHAR(5),
                FirstName VARCHAR(30),
                LastName VARCHAR(30),
                StreetAddress VARCHAR(40),
                Suburb VARCHAR(40),
                CityState VARCHAR(4),
                Postcode INT NOT NULL,
                EmailAddress VARCHAR(50),
                PhoneNumber INT NOT NULL,
                Skills VARCHAR(50),
                OtherSkills VARCHAR(50),
                EStatus Varchar(10))";
            $result = mysqli_query($conn, $query);
            if ($result){
                //echo "<p>Table created Successfully!</p>";
                $insert_query = "INSERT INTO EOI (JobReferenceNumber,FirstName,LastName,StreetAddress,Suburb,CityState,Postcode,EmailAddress,PhoneNumber,Skills,OtherSkills,EStatus) 
                                VALUES ('$JobReferenceNumber','$Firstname','$Familyname','$Address','$Suburb','$State','$Postcode','$email','$PhoneNumber','$category','$OtherSkills','New')";
                $insert_result = mysqli_query($conn,$insert_query);

                if ($insert_result)
                    echo "<p>Insert Successful. The EOI ID is " . mysqli_insert_id($conn) .".</p>";
                else
                    echo "<p>Insert Failed</p>";
            }
            else
                echo "<p>Table creation failed! </p>";
            mysqli_close($conn);
        }
        else
            echo "<p>Connection Failed! </p>";
    }
?>
</body>
</html>