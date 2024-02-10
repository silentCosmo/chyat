<?php
echo '
    <div id="tcPopup" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-purple-100 p-8 mx-3 rounded shadow-md max-w-md border border-red-300">
            <h3 class="text-xl text-center font-bold mb-4">Terms and Conditions</h3>
            <ol class="list-decimal pl-6 py-2 mb-4 h-96 overflow-y-auto">
                <li>
                    <p class="mb-2">By using CosmoChat, you agree to comply with and be bound by the following terms and conditions:</p>
                </li>
                <li>
                    <p class="mb-2">You must be 18 years or older to use this service.</p>
                </li>
                <li>
                    <p class="mb-2">Do not engage in any illegal or harmful activities while using CosmoChat.</p>
                </li>
                <li>
                    <p class="mb-2">Respect the privacy and interests of other users. Do not share personal information that could compromise your safety or the safety of others.</p>
                </li>
                <li>
                    <p class="mb-2">CosmoChat is not responsible for the content shared between users. Users are solely responsible for the information, messages, and media they share.</p>
                </li>
                <li>
                    <p class="mb-2">Harassment, bullying, or any form of harmful behavior towards other users is strictly prohibited.</p>
                </li>
                <li>
                    <p class="mb-2">Use of explicit or offensive language, images, or any form of content that violates community standards is not allowed.</p>
                </li>
                <li>
                    <p class="mb-2">CosmoChat reserves the right to suspend or terminate your account if you violate these terms and conditions.</p>
                </li>
                <li>
                    <p class="mb-2">We may update or modify these terms and conditions at any time without prior notice. It is your responsibility to review them periodically.</p>
                </li>
            </ol>
            <div class="flex justify-center">
                <button onclick="hideTcPopup()" class="mt-4 bg-purple-500 text-white p-2 rounded">Alright</button>
            </div>
        </div>
    </div>
';
?>
