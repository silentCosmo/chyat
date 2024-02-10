<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CanWe</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-purple-100">
    <header class="text-2xl py-2 font-bold text-purple-200 text-center mb-4 bg-purple-700 fixed top-0 w-full border-b-2 border-purple-400 ">CoSMoCHaT</header>
    
    <div class="p-3">
        
        <div class="container mx-auto my-8 p-8 mt-32 bg-white rounded shadow-md">
            <h2 class="text-2xl text-center text-purple-800 font-bold mb-4"> Find A Stranger</h2>
            <div id="interestsContainer" class="flex flex-wrap mb-4 justify-center"></div>
            <div class="flex items-center mb-4">
                <input type="text" id="interestInput" class="border p-2 w-full mr-2" placeholder="Type your interest...">
                <button onclick="connect()" class="bg-purple-500 text-white p-2 rounded">Add</button>
            </div>
            
            <div class="flex flex-row">
                <input type="checkbox" id="tcCheckbox" class="mr-2" required>
                <label for="tcCheckbox" class="text-gray-600">I agree to the <a href="#" onclick="showTcPopup()" class="text-blue-500">Terms and Conditions</a></label>
            </div>
            <div class="text-center">
                <button onclick="connectAndRedirect()" class="mt-4 bg-purple-500 text-white p-2 rounded">Connect</button>
            </div>
<div class="mt-8 text-center text-purple-600 opacity-70">
                <?php include 'online_users.php'; ?>
            </div>
        </div>
    </div>

    <!-- Terms and Conditions Popup -->
    
   <?php include 'tc.php'; ?>


    <footer class="text-gray-600 bg-purple-200 text-center fixed bottom-0 py-3 w-full"> silentCosmo &copy; 2024</footer>

    <script>
        let interestArray = [];

        function connect() {
            const interestInput = document.getElementById('interestInput');
            const interest = interestInput.value.trim();

            // Set the maximum length for the interestArray
            const maxInterestArrayLength = 5; // Adjust this to your desired maximum length

            if (interest !== '' && interestArray.length < maxInterestArrayLength) {
                // Add the interest to the array
                interestArray.push(interest);

                // Display the interest in a small div
                const interestsContainer = document.getElementById('interestsContainer');
                const interestDiv = document.createElement('div');
                interestDiv.className = 'interest bg-purple-200 p-2 rounded m-1';
                interestDiv.textContent = interest;
                interestsContainer.appendChild(interestDiv);

                // Clear the input field
                interestInput.value = '';
            } else if (interestArray.length >= maxInterestArrayLength) {
                // Provide a message or alert if the maximum length is reached
                alert('Maximum number of interests reached!');
            }
        }

        function showTcPopup() {
            const tcPopup = document.getElementById('tcPopup');
            tcPopup.style.display = 'flex';
        }

        function hideTcPopup() {
            const tcPopup = document.getElementById('tcPopup');
            tcPopup.style.display = 'none';
        }

        function connectAndRedirect() {
            const tcCheckbox = document.getElementById('tcCheckbox');

            if (tcCheckbox.checked) {
                // Perform the redirection logic here
                window.location.href = 'chyat.php';
            } else {
                // Show a popup or provide a message indicating that T&C must be agreed
                alert('Please agree to the Terms and Conditions.');
            }
        }
    </script>
</body>
</html>
