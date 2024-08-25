document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("form").addEventListener("submit", function(event) {
        // Full Name validation
        var fullName = document.getElementById("fullName").value.trim();
        var fullNamePattern = /^[A-Z][a-z]+ [A-Z][a-z]+$/;
        if (!fullNamePattern.test(fullName)) {
            alert("Full Name must contain two words, both starting with upper case letters.");
            event.preventDefault();
            return false;
        }

        // Email validation
        var email = document.getElementById("email").value.trim();
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            event.preventDefault();
            return false;
        }

        // Password validation
        var password = document.getElementById("password").value.trim();
        if (password.length < 8) {
            alert("Password must be at least 8 characters long.");
            event.preventDefault();
            return false;
        }

        return true;
    });
});