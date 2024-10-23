document.getElementById("registerForm").addEventListener("submit", function(event) {
    event.preventDefault();  // Prevent the form from submitting

    var email = document.getElementById("email").value;
    var errorMessage = document.getElementById("error-message");
    var successMessage = document.getElementById("success-message");

    // Gmail validation
    var gmailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
    if (!gmailPattern.test(email)) {
        errorMessage.textContent = "Please enter a valid Gmail address.";
        successMessage.style.display = "none";  // Hide success message
    } else {
        errorMessage.textContent = "";  // Clear error message

        // Show success message
        successMessage.style.display = "block";

        // Simulate form submission
        setTimeout(function() {
            // You can submit the form manually via AJAX here or redirect
            alert("Form successfully submitted!"); // Optional: Alert for visual feedback
            // Optionally redirect to another page or refresh
            // window.location.href = "some_other_page.php";
        }, 500);  // Delay to show the success message before taking further action
    }
});
