<!DOCTYPE html>
<html lang="en">

<?php

include "../../controllers/database.php"; // Assuming you have this file
include "../../controllers/utils/utils.php";
include "../../models/club_activity.php";

session_start();


$user_id = $_SESSION['user_id'];
$club_id = filter_input(INPUT_GET, 'club_id', FILTER_SANITIZE_SPECIAL_CHARS);
$activity_id = filter_input(INPUT_GET, 'activity_id', FILTER_SANITIZE_SPECIAL_CHARS);

// CHECK IF THE USER IS LOGGED IN
if (!isset($_SESSION['user_id'])) {
    // USER IS NOT LOGGED IN, REDIRECT TO LOGIN PAGE
    header("Location: ./register.php");
    exit();
}

try {
    $db = new Database();
    $club_activities = new ClubActivities($db);
    $club_activity = $club_activities->read($activity_id);

    // Debug: Remove this in production
    // print_r($club_activity);

} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
    exit();
}

?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Group</title>
    <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css">
</head>
<style>
/* BASIC RESET */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #fff;
    display: flex;
    justify-content: center;
    align-items: flex-end;
    height: 100vh;
}

/* CHAT CONTAINER STYLES */
.chat-container {
    width: 100%;
    max-width: 800px;
    background-color: #fff;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    border-radius: 20px;
    overflow: hidden;
}

/* CHAT BOX STYLES */
.chat-box {
    flex: 1;
    padding: 20px;
    overflow-y: auto;
}

.message {
    margin-bottom: 15px;
    padding: 10px;
    border-radius: 10px;
    background-color: #e4e6eb;
    position: relative;
    width: 100%; /* Full width */
}

.message .name {
    font-weight: bold;
    margin-bottom: 5px;
}

/* CHAT INPUT STYLES */
.chat-input {
    display: flex;
    padding: 20px;
    border-top: 1px solid #e4e6eb;
    background-color: #fff;
}

.chat-input input {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 10px;
    margin-right: 10px;
}

.chat-input input:first-child {
    margin-right: 10px;
}

.chat-input button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 10px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.chat-input button:hover {
    background-color: #0056b3;
}
</style>
<body class="py-4">
<div class="chat-container">
    <div class="chat-box" id="chat-box"></div>
    <div class="chat-input">
        <h6 id="name-input" class="my-auto col-1">karo</h6>
        <input type="text" class="col-11" id="message-input" placeholder="Type a message...">
        <button onclick="sendMessage()">Send</button>
    </div>
</div>
<script>
function sendMessage() {
    // GET THE NAME AND MESSAGE INPUT ELEMENTS
    const nameElement = document.getElementById('name-input');
    const messageInput = document.getElementById('message-input');
    
    // GET THE CHAT BOX ELEMENT
    const chatBox = document.getElementById('chat-box');
    
    // GET THE NAME AND MESSAGE TEXT
    const nameText = nameElement.textContent;
    const messageText = messageInput.value;
    
    if (messageText.trim() !== "") {
        // CREATE A NEW MESSAGE ELEMENT
        const messageElement = document.createElement('div');
        messageElement.className = 'message';
        
        // CREATE AND APPEND THE NAME ELEMENT
        const nameDivElement = document.createElement('div');
        nameDivElement.className = 'name';
        nameDivElement.textContent = nameText;
        messageElement.appendChild(nameDivElement);
        
        // CREATE AND APPEND THE MESSAGE TEXT ELEMENT
        const textElement = document.createElement('div');
        textElement.textContent = messageText;
        messageElement.appendChild(textElement);
        
        // ADD THE MESSAGE ELEMENT TO THE CHAT BOX
        chatBox.appendChild(messageElement);
        
        // CLEAR THE MESSAGE INPUT
        messageInput.value = '';
        
        // SCROLL TO THE BOTTOM OF THE CHAT BOX
        chatBox.scrollTop = chatBox.scrollHeight;
    }
}
</script>
</body>
</html>
