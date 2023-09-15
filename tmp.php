<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Chat Template</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Your custom CSS styles can be added here -->
    <style>
        /* Add your custom CSS styles here */
        .chat-container {
            max-width: 500px;
            margin: 0 auto;
        }

        .chat-box {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="container chat-container">
        <h1 class="text-center">Chat</h1>
        <div class="chat-box">
            <p><strong>User:</strong> Hello, how can I help you?</p>
        </div>
        <div class="chat-box">
            <p><strong>Bot:</strong> Welcome to our website. How can I assist you today?</p>
        </div>
        <!-- Add more chat-box divs for additional messages -->

        <!-- Chat input form -->
        <form>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Type your message...">
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>

    <!-- Link to Bootstrap JS and Popper.js for Bootstrap functionality (required) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>