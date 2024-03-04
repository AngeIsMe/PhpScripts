<?php

$servername = "localhost";
$username = "u687296738_krystabel22";
$password = "Grayham2201";
$dbname = "u687296738_Pinoyspecials";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL statement to retrieve all recipes
$sql = "SELECT * FROM `recipe`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $recipe = array();
    // Fetch recipes and store them in an array
    while ($row = $result->fetch_assoc()) {
        $recipe[] = $row;
    }
    // Prepare the response
    $response['error'] = false;
    $response['recipe'] = $recipe;
} else {
    // No recipes found
    $response['error'] = true;
    $response['message'] = "No recipes found";
}

// Close the database connection
$conn->close();

// Return the JSON response
echo json_encode($response);

?>
