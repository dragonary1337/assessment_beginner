<?php
$conn = require "db.php";

$clients = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM clients"))['c'];
$services = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM services"))['c'];
$bookings = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM bookings"))['c'];

$revenue = 0;
$paymentsTable = mysqli_query($conn, "SHOW TABLES LIKE 'payments'");
if ($paymentsTable && mysqli_num_rows($paymentsTable) > 0) {
    $revRow = mysqli_fetch_assoc(mysqli_query($conn, "SELECT IFNULL(SUM(amount_paid),0) AS s FROM payments"));
    $revenue = $revRow['s'];
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>

    <body>
        <?php include "nav.php"; ?>
        <div class="container">
            <h2 class = "title">Dashboard</h2>

            <ul class="total_list">
                <li>Total Clients: <b><?php echo $clients; ?></b></li>
                <li>Total Services: <b><?php echo $services; ?></b></li>
                <li>Total Bookings: <b><?php echo $bookings; ?></b></li>
                <li>Total Revenue: <b>₱<?php echo number_format($revenue, 2); ?></b></li>
            </ul>

            <p class="quick_links">
                Quick links:
                <a href="/assessment_beginner/pages/clients_add.php">Add Client</a> |
                <a href="/assessment_beginner/pages/bookings_create.php">Create Booking</a>
            </p>
        </div>
    </body>
</html>