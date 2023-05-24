<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">
    <title>Contact Us</title>
</head>
<body>
<?php
include 'navbar.php';
include 'database/db_connect.php';
$name = $email = $phone = '';

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Clean input data
    $first_name = clean_input($_POST["first_name"]);
    $last_name = clean_input($_POST["last_name"]);
    $email = clean_input($_POST["email"]);
    $phone = clean_input($_POST["phone"]);

    // Insert the data into the database
    $sql = "INSERT INTO contact_info (first_name, last_name,email, contact_number) VALUES ('$first_name', '$last_name', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "Data submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Function to sanitize input data
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Close the database connection
$conn->close();
?>


<h2>Contact Form</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">First Name:</label>
    <input type="text" name="first_name" id="first_name" required><br><br>

    <label for="name">Last Name:</label>
    <input type="text" name="last_name" id="last_name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br><br>

    <label for="phone">Phone:</label>
    <input type="tel" name="phone" id="phone" required><br><br>

    <input type="submit" value="Submit">
</form>
</body>
</html>