<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="instructor-style.css">
    <!-- Include Bootstrap stylesheet -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Additional styles for the cards */
        .card {
            text-decoration: none;
            margin-bottom: 20px;
            border-radius: 10px;
            overflow: hidden; /* Ensures the border-radius works with the image inside */
            transition: transform 0.3s ease-in-out;
            width: 100%; /* Set the desired width for the card */
            max-width: 300px; /* Optional: Set a maximum width if needed */
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
    <title>Instructor Dashboard</title>
</head>
<body>
    <?php
    include('instructor-sidebar.php');
    // Include the configuration file
    require('config.php');

    // SQL query to retrieve project titles and ideation phase image logos
    $sql = "SELECT p.Project_title, i.Project_logo, i.IdeationID
            FROM project p
            JOIN ideation_phase i ON p.Project_ID = i.Project_ID";

    $result = $conn->query($sql);
    ?>

    <div class="content">
        
        <h2>Welcome to the Instructor Dashboard - Home Section</h2>
        <p>This is where you can manage your home content.</p>

        <div class="row">
            <?php
            // Display the results
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Wrap each project in a clickable Bootstrap card within a grid column
                    echo '<div class="col-md-3 mb-4">';
                    echo '<a href="view_ideation.php?ideation_id=' . $row['IdeationID'] . '" class="card">';
                    echo '<div class="card-body">';
                    echo "<h5 class='card-title'>{$row['Project_title']}</h5>";
                    echo "<p class='card-text'>Logo: {$row['Project_logo']}</p>";
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';
                }
            } else {
                echo "<p>No projects found.</p>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Include Bootstrap scripts (jQuery and Popper.js) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Include Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
