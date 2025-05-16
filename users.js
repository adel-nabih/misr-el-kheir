//Not being used anymore
function registerUser() {
    const fullname = document.getElementById("fullname").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();
    const confirmPassword = document.getElementById("confirm_password").value.trim();
    const gender = document.querySelector('input[name="gender"]:checked');
    const age = document.getElementById("age").value.trim();
    const interests = document.querySelectorAll('input[name="interests"]:checked');
    const country = document.getElementById("country").value;

    let errors = [];

    if (!fullname || !email || !password || !confirmPassword || !gender || !country) errors.push("Please fill in all fields.");

    if (password !== confirmPassword) {
        errors.push("Passwords do not match.");
    }

    if (errors.length > 0) {
        alert(errors.join("\n"));
        return;
    }

    const selectedInterests = [];
    interests.forEach((interest) => {
        selectedInterests.push(interest.value);
    });

    const user = {
        fullname: fullname,
        email: email,
        password: password,
        gender: gender.value,
        age: age,
        interests: selectedInterests,
        country: country,
    };

    let users = JSON.parse(localStorage.getItem("users")) || [];

    let users = JSON.parse(localStorage.getItem("users")) || [];

    const existingUser = users.find((u) => u.email === email);
    if (existingUser) {
        alert("An account with this email already exists.");
        return;
    }

    users.push(user);

    localStorage.setItem("users", JSON.stringify(users));

    const successMessage = document.getElementById("register-success");
    successMessage.style.display = "block";

    document.getElementById("register-form").reset();
}

function loginUser() {
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();

    if (!email || !password) {
        alert("Please fill out all fields.");
        return;
    }

    const users = JSON.parse(localStorage.getItem("users")) || [];

    const user = users.find((u) => u.email === email);

    if (user && user.password === password) {
        const successMessage = document.getElementById("login-success");
        successMessage.style.display = "block";

        setTimeout(() => {
            window.location.href = "index.php";
        }, 2000);
    } else {
        const errorMessage = document.getElementById("login-error");
        errorMessage.style.display = "block";
    }
}