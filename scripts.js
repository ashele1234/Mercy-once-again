function validateForm() {
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const type = document.getElementById("type").value;
    const message = document.getElementById("message").value.trim();
    const errorMessage = document.getElementById("errorMessage");

    let errors = [];

    if (name === "") {
        errors.push("Name is required.");
    }

    if (email === "") {
        errors.push("Email is required.");
    } else if (!validateEmail(email)) {
        errors.push("Please enter a valid email address.");
    }

    if (type === "") {
        errors.push("Please select a type.");
    }

    if (message === "") {
        errors.push("Message is required.");
    }

    if (errors.length > 0) {
        errorMessage.innerHTML = errors.join("<br>");
        return false; // Prevent form submission
    }

    return true; // Allow form submission
}

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}