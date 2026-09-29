<?php
$conn = require "../db.php";
$result = mysqli_query($conn, "SELECT * FROM clients ORDER BY client_id DESC");
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Clients</title>
    <link rel="stylesheet" href="page_styles.css">
</head>

<body>
    <?php include "../nav.php"; ?>

    <div class="container">
        <h2>Clients</h2>
        <p><a href="clients_add.php">+ Add Client</a></p>

        <table class = "list" border="1" cellpadding="8">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['client_id']; ?></td>
                    <td><?php echo $row['full_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td>
                        <button class="edit_button">
                            <a href="clients_edit.php?id=<?php echo $row['client_id']; ?>">Edit</a>
                        </button>
                        
                    </td>
                </tr>
            <?php } ?>
        </table>
    </divc>


</body>

</html>