<?php
// Include database connection file
include 'db.php'; // Replace with your actual database connection file

// Set webpage title
$title = "View PDF";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Paper</title>
</head>

<body>

<?php
// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    // Get the abstract_id from the URL and sanitize it
    $abstract_id = intval($_GET['id']);

    // Query the database to fetch the file path
    $query = "SELECT pdf_file, rev_pdf_file, status FROM abstracts WHERE abstract_id = ?";
    $stmt = $con->prepare($query);
    if ($stmt === false) {
        echo "Error: Failed to prepare the SQL statement: " . htmlspecialchars($con->error);
    } else {
        $stmt->bind_param("i", $abstract_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the file exists in the database
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Check for resubmitted paper if status is accepted_major or accepted_minor
            if ($row['status'] === 'accepted_major' || $row['status'] === 'accepted_minor') {
                $file_path = $row['rev_pdf_file'];
                $real_base = realpath(__DIR__ . '/resubmit_abstracts');
                $real_file = realpath(__DIR__ . '/resubmit_abstracts/' . basename($row['rev_pdf_file']));
            } else {
                $file_path = $row['pdf_file'];
                // Validate the file path to prevent directory traversal attacks
                $real_base = realpath(__DIR__ . '/abstracts');
                $real_file = realpath(__DIR__ . '/abstracts/' . basename($file_path));
            }

            if ($real_file && strpos($real_file, $real_base) === 0 && file_exists($real_file)) {
                // Set headers to display the PDF in the browser
                header('Content-Type: application/pdf');
                header('Content-Disposition: inline; filename="' . htmlspecialchars(basename($file_path)) . '"');
                readfile($real_file); // Output the file content
                exit;
            } else {
                echo "Error: File not found.";
            }
        } else {
            echo "Error: Invalid abstract ID.";
        }
        $stmt->close();
    }
} else {
    echo "Error: No abstract ID provided.";
}
// Close database connection
$con->close();
?>
<h1>hello</h1>
</body>
</html>
