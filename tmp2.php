<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Template</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style_chat_space.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="#">User 1</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#">User 2</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#">User 3</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Chat with User 1
                    </div>
                    <div class="card-body">
                        <div id="chat-messages">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span class="badge bg-primary">User 1:</span> Hello!
                                </li>
                                <li class="list-group-item">
                                    <span class="badge bg-secondary">You:</span> Hi!
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="text" class="form-control" id="chat-message" placeholder="Type your message here...">
                        <button type="button" class="btn btn-primary" id="send-message">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        // Add a new message to the chat
        function addMessage(message, sender) {
            var chatMessages = document.getElementById('chat-messages');
            var li = document.createElement('li');
            li.classList.add('list-group-item');
            var span = document.createElement('span');
            span.classList.add('badge');
            span.classList.add('bg-' + sender);
            span.textContent = sender + ':';
            li.appendChild(span);
            li.appendChild(document.createTextNode(message));
            chatMessages.appendChild(li);
        }

        // Send a message
        document.getElementById('send-message').addEventListener('click', function() {
            var message = document.getElementById('chat-message').value;
            addMessage(message, 'You');
            document.getElementById('chat-message').value = '';
        });
    </script>
</body>

</html>