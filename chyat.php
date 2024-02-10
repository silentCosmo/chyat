<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CosmoChat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-purple-50">
    <div class="container mx-auto flex flex-col min-h-screen">
        <header class="text-2xl py-2 font-bold text-purple-200 text-center mb-4 bg-purple-700 fixed top-0 w-full border-b-2 border-purple-400">CoSMoChYaT</header>
        <div id="chat-messages" class="flex-1 p-1 mt-14 mb-24 overflow-y-auto">
            <!-- Messages will be dynamically added here -->
        </div>
        <section class="fixed bottom-0 w-full bg-purple-50 pt-1">
            <div class="flex items-center justify-center">
                <input type="text" id="messageInput" class="border p-2 w-4/5 rounded-l-md" placeholder="Type your message...">
                <button onclick="sendMessage()" class="bg-purple-500 text-white p-2 px-3 rounded-r">Send</button>
            </div>
            <footer class="text-gray-600 mt-4 ml-4 mb-5">Connected to: <span id="connectedInterest" class="font-bold">Coding, Reading, Music</span></footer>
        </section>
    </div>

    <script>
        // Array to store messages
        const messages = [
            { type: 'sent', content: 'Hi' },
            { type: 'received', content: 'Hello! How are you?' },
            { type: 'sent', content: "I'm good, thanks." },
            { type: 'received', content: "That's great to hear! What are your interests?" },
            { type: 'sent', content: 'I like coding, reading, and music. How about you?' },
        ];

        // Function to render messages
        function renderMessages() {
            const chatMessages = document.getElementById('chat-messages');
            chatMessages.innerHTML = ''; // Clear existing messages

            messages.forEach(message => {
                const messageDiv = document.createElement('div');
                messageDiv.className = `message break-all ${message.type} border-t-2 bg-purple-${message.type === 'sent' ? '100 border-purple-200' : '200 border-purple-300'} p-2 rounded mb-2 max-w-xs`;
                messageDiv.textContent = message.content;

                if (message.type === 'sent') {
                    const flexDiv = document.createElement('div');
                    flexDiv.className = 'flex justify-end';
                    flexDiv.appendChild(messageDiv);
                    chatMessages.appendChild(flexDiv);
                } else {
                    const receivedContainer = document.createElement('div');
                    receivedContainer.className = 'flex justify-start';
                    receivedContainer.appendChild(messageDiv);
                    chatMessages.appendChild(receivedContainer);
                }
            });

            // Scroll to the last message
            const lastMessage = chatMessages.lastElementChild;
            if (lastMessage) {
                lastMessage.scrollIntoView();
            }
        }

        // Initial render
        renderMessages();

        // Function to send a new message
        function sendMessage() {
            const messageInput = document.getElementById('messageInput');
            const messageContent = messageInput.value.trim();

            if (messageContent !== '') {
                messages.push({ type: 'sent', content: messageContent });
                renderMessages();

                // Clear the input field
                messageInput.value = '';
            }
        }
    </script>
</body>
</html>
