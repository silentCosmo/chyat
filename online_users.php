<?php

session_start(); // Start the session

$servername = "sql111.infinityfree.com";
$username = "if0_35872422";
$password = "RPpYakH7yx0d6v";
$dbname = "if0_35872422_cat";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create online_users table if not exists
$createTableQuery = "CREATE TABLE IF NOT EXISTS online_users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id VARCHAR(50) NOT NULL,
    last_activity TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$conn->query($createTableQuery);

// Function to update online user count
function updateOnlineUsersCount($conn) {
    // Remove inactive users (e.g., users inactive for the last 5 minutes)
    $inactive_threshold = date('Y-m-d H:i:s', strtotime('-5 minutes'));
    $conn->query("DELETE FROM online_users WHERE last_activity < '$inactive_threshold'");

    // Get the current online users count
    $result = $conn->query("SELECT COUNT(DISTINCT user_id) as count FROM online_users");
    $row = $result->fetch_assoc();

    return $row['count'];
}

// Function to mark a user as online
function markUserOnline($conn, $userId) {
    // Update or insert the user's last activity timestamp
    $conn->query("INSERT INTO online_users (user_id, last_activity) VALUES ('$userId', NOW())
                  ON DUPLICATE KEY UPDATE last_activity = NOW()");
}

// Function to remove expired sessions
function removeExpiredSessions($conn) {
    $expiration_threshold = date('Y-m-d H:i:s', strtotime('-30 minutes')); // Adjust expiration time as needed
    $conn->query("DELETE FROM online_users WHERE last_activity < '$expiration_threshold'");
}

// Example: Mark the current user as online
$currentUserId = session_id();  // Using session_id as a simple user identifier
markUserOnline($conn, $currentUserId);

// Remove expired sessions
removeExpiredSessions($conn);

// Example: Get the current online user count
$onlineUsersCount = updateOnlineUsersCount($conn);

echo "OnLine: " . $onlineUsersCount;

// Close connection
$conn->close();
?>
