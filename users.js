function registerUser() {
    // Get form inputs
    const fullname = document.getElementById("fullname").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();
    const confirmPassword = document.getElementById("confirm_password").value.trim();
    const gender = document.querySelector('input[name="gender"]:checked');
    const age = document.getElementById("age").value.trim();
    const interests = document.querySelectorAll('input[name="interests"]:checked');
    const country = document.getElementById("country").value;

    // Error messages
    let errors = [];

    // Check if all required fields are filled
    if (!fullname || !email || !password || !confirmPassword || !gender || !country) errors.push("Please fill in all fields.");

    // Check if passwords match
    if (password !== confirmPassword) {
        errors.push("Passwords do not match.");
    }

    // If there are errors, show them and stop
    if (errors.length > 0) {
        alert(errors.join("\n"));
        return;
    }

    // Gather selected interests
    const selectedInterests = [];
    interests.forEach((interest) => {
        selectedInterests.push(interest.value);
    });

    // Create user object
    const user = {
        fullname: fullname,
        email: email,
        password: password,
        gender: gender.value,
        age: age,
        interests: selectedInterests,
        country: country,
    };

    // Retrieve existing users from localStorage
    let users = JSON.parse(localStorage.getItem("users")) || [];

    // Check if the email is already registered
    const existingUser = users.find((u) => u.email === email);
    if (existingUser) {
        alert("An account with this email already exists.");
        return;
    }

    // Add the new user to the array
    users.push(user);

    // Save updated user array to localStorage
    localStorage.setItem("users", JSON.stringify(users));

    // Show success message
    const successMessage = document.getElementById("register-success");
    successMessage.style.display = "block";

    // Optional: Clear the form after submission
    document.getElementById("register-form").reset();
}

function loginUser() {
    // Get form inputs
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();

    // Check if fields are filled
    if (!email || !password) {
        alert("Please fill out all fields.");
        return; // Stop the function if any field is empty
    }

    // Retrieve stored users from localStorage
    const users = JSON.parse(localStorage.getItem("users")) || [];

    // Find the user with the matching email
    const user = users.find((u) => u.email === email);

    // Check if user exists and password matches
    if (user && user.password === password) {
        // Show success message
        const successMessage = document.getElementById("login-success");
        successMessage.style.display = "block";

        // Optional: Redirect to another page after successful login
        setTimeout(() => {
            window.location.href = "index.html";
        }, 2000);
    } else {
        // Show error message
        const errorMessage = document.getElementById("login-error");
        errorMessage.style.display = "block";
    }
}