<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messenger-like Chat Template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS styles */
        .chat-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .message-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .message {
            border-radius: 10px;
            padding: 10px;
            max-width: 70%;
        }
        .user-message {
            background-color: #e9e9e9;
            align-self: flex-start;
        }
        .other-message {
            background-color: #007bff;
            color: white;
            align-self: flex-end;
        }
        .message-input {
            display: flex;
            gap: 10px;
        }
        .message-input input {
            flex: 1;
            border: none;
            border-radius: 20px;
            padding: 10px;
            font-size: 16px;
        }
        .send-button {
            background-color: #007bff;
            border: none;
            border-radius: 20px;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container chat-container">
        <h1 class="text-center">Messenger-like Chat</h1>
        <div class="message-container">
            <div class="message user-message">
                <p>Hello, how are you?</p>
            </div>
            <div class="message other-message">
                <p>I'm doing great! Thanks for asking.</p>
            </div>
            <!-- Add more messages here -->
        </div>
        <div class="message-input">
            <input type="text" class="form-control" placeholder="Type your message...">
            <button class="btn send-button">Send</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



<script>
$("#button-addon2").on("click", function (event) {
            event.preventDefault;
            var msg = $("#send-message-box").val();
            var incoming_msg_user = "<?php echo $_GET["incoming_user"] ?>";
            var outgoing_msg_user = "<?php echo $_SESSION["username"] ?>";

            $.ajax({
                url: 'store_msg_to_db.php',
                type: 'POST',
                data: {msg: msg, incoming_msg_user:incoming_msg_user, outgoing_msg_user:outgoing_msg_user},
                success: function (data) {

                },
                complete: function () {
                    // Schedule the next data fetch after a delay (e.g., every 5 seconds)
                    setTimeout(fetchUserListData, 5000);
                }
            });
        });

        </script>