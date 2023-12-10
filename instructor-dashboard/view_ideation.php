<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="instructor-style.css">
    <!-- Include Bootstrap stylesheet -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>View Ideation Phase</title>
</head>
<body>
    <?php
    // Include the configuration file
    require('config.php');
    
    include('instructor-sidebar.php');

    // Check if ideation_id is set in the query parameters
    if (isset($_GET['ideation_id'])) {
        // Sanitize the input to prevent SQL injection
        $ideationID = mysqli_real_escape_string($conn, $_GET['ideation_id']);

        // SQL query to retrieve ideation details
        $sql = "SELECT * FROM ideation_phase WHERE IdeationID = '$ideationID'";
        $result = $conn->query($sql);

    // Check if Project_logo is not empty and exists
// Display ideation details
if ($result->num_rows > 0) {
    $ideation = $result->fetch_assoc();
    echo '<div class="content">';
    echo '<h2>Ideation Phase Details</h2>';
    echo "<p><strong>Project ID:</strong> " . (isset($ideation['Project_ID']) ? $ideation['Project_ID'] : 'N/A') . "</p>";

    // Specify the path to the "images" folder
    $imagePath = 'images/logo/' . (isset($ideation['Project_logo']) ? $ideation['Project_logo'] : '');

    // Check if Project_logo is not empty and exists
    if (!empty($ideation['Project_logo']) && file_exists($imagePath)) {
        // Display the image using an <img> tag
        echo '<img src="' . $imagePath . '" alt="Project Logo" style="max-width: 100%;">';
    } else {
        echo '<p>Image not found or invalid path.</p>';
    }

    echo "<p><strong>Project Overview:</strong> " . (isset($ideation['Project_Overview']) ? $ideation['Project_Overview'] : 'N/A') . "</p>";
    echo "<p><strong>Project Modelcanvas:</strong> " . (isset($ideation['Project_Modelcanvas']) ? $ideation['Project_Modelcanvas'] : 'N/A') . "</p>";
    echo "<p><strong>Submission Date:</strong> " . (isset($ideation['Submission_date']) ? $ideation['Submission_date'] : 'N/A') . "</p>";

    // Button for evaluation
    echo '<a class="btn btn-primary" href="evaluation.php">Evaluate</a>';

    echo '</div>';
    } else {
        echo '<p>Ideation phase not found.</p>';
    }



    } else {
        echo '<p>Invalid request. Ideation ID not provided.</p>';
    }
    
    // Close the database connection
    $conn->close();
    ?>

    <!-- Include Bootstrap scripts (jQuery and Popper.js) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Include Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
