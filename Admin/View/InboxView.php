<html>
<head>
    <title>Inbox</title>
    <style>
        .message {
            border: 1px solid #ccc;
            margin: 10px;
            padding: 10px;
        }
        .message p {
            margin: 5px 0;
        }

        .back-button {
            background-color: #3498db;
            color: #fff;
            border: none;
            position: absolute;
            top: 10px;
            left: 10px;
        }
    </style>
</head>
<body>
    <a href="admin.php">
      <button class="back-button">BACK</button>
    </a>
    <br>

<h3>Inbox</h3>

<?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="message">';
        echo "<p><strong>From:</strong> {$row['sender_username']}</p>";
        echo "<p><strong>Subject:</strong> {$row['subject']}</p>";
        echo "<p><strong>Message:</strong> {$row['content']}</p>";
        echo "<p><strong>Sent At:</strong> {$row['timestamp']}</p>";
        echo "<form action='../../ReadMessage.php' method='POST'>"; 
        echo "<input type='hidden' name='message_id' value='{$row['message_id']}'>";
        echo "<input type='submit' name='read' value='Mark as Read'>"; 
        echo "</form>";
        echo '</div>';
    }
} else {
    echo "<p>No messages</p>";
}
?>

</body>
</html>
