document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('contact-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        var formData = new FormData(this); // Create FormData object

        // Send form data to PHP script
        fetch('contact.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Display response message
            var responseMessage = document.getElementById('response-message');
            responseMessage.textContent = data.message;
            responseMessage.style.display = 'block';
            if (data.success) {
                responseMessage.classList.add('success');
            } else {
                responseMessage.classList.add('error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
