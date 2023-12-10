<?php
// Start the session (make sure to include the necessary session management logic)
session_start();

// Check if the user is logged in as an instructor
if (!isset($_SESSION['instructor_id'])) {
    // Redirect to the login page if not logged in
    header('Location: login.php'); // Replace with your actual login page
    exit();
}

// Include the necessary header and sidebar files
include('header.php'); // Replace with your actual header file
include('instructor-sidebar.php'); // Include the sidebar for the instructor

// Include your database connection logic here
// For example, you might have a separate file like 'db.php' to handle database connections
include('db.php'); // Replace with your actual database connection file

// Fetch projects from ideation_phase
$sql = "SELECT * FROM ideation_phase";
$result = mysqli_query($conn, $sql);

?>

<div class="content">
    <h2>Welcome, Instructor!</h2>
    <p>This is the home page for instructors.</p>

    <?php
    // Check if there are projects
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Render each project as a card
            echo '<div class="card">';
            echo '<img src="' . $row['Project_logo'] . '" alt="Project Image">';
            echo '<h3>' . $row['Project_Overview'] . '</h3>';
            echo '<p>' . $row['Submission_date'] . '</p>';
            // Add more project details as needed
            echo '</div>';
        }
    } else {
        echo '<p>No projects found.</p>';
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</div>

<?php
// Include the necessary footer file
include('footer.php'); // Replace with your actual footer file
?>
