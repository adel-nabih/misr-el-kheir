function handleMonthlySubmit() {
    const country = document.getElementById("country").value.trim();
    const email = document.getElementById("email").value.trim();
    const amount = document.getElementById("amount").value.trim();
    const card = document.getElementById("card").value.trim();

    if (!country || !email || !amount || !card) {
        alert("Please fill out all fields before submitting.");
        return;
    }

    const successMessage = document.getElementById("success-message");
    successMessage.style.display = "block";

    document.getElementById("donation-form").reset();

    setTimeout(() => {
        document.getElementById("success-message").style.display = "none";
    }, 3000);

}


function handleDonationSubmit() {
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const amount = document.getElementById("amount").value.trim();

    if (!name || !email || !amount) {
        alert("Please fill out all fields before donating.");
        return;
    }

    const successMessage = document.getElementById("success-message");
    successMessage.style.display = "block";

    document.getElementById("donation-form").reset();

    setTimeout(() => {
        document.getElementById("success-message").style.display = "none";
    }, 3000);
};

function handleSponsorSubmit() {
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const project = document.getElementById("project").value.trim();
    const amount = document.getElementById("amount").value.trim();

    if (!name || !email || !project || !amount) {
        alert("Please fill out all fields before submitting.");
        return;
    }

    const successMessage = document.getElementById("success-message");
    successMessage.style.display = "block"; // Show the success message

    document.getElementById("sponsor-form").reset();

    setTimeout(() => {
        document.getElementById("success-message").style.display = "none";
    }, 3000);
}

function zakatSadaqah() {
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const amount = document.getElementById("amount").value.trim();
    const donationType = document.getElementById("donation-type").value.trim();

    if (!name || !email || !amount || !donationType) {
        alert("Please fill out all fields before submitting.");
        return;
    }

    const successMessage = document.getElementById("success-message");
    successMessage.style.display = "block";

    setTimeout(() => {
        successMessage.style.display = "none";
    }, 3000);

    document.getElementById("zakat-form").reset();
}

function handleContactSubmit() {
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const message = document.getElementById("message").value.trim();

    if (!name || !email || !message) {
        alert("Please fill out all fields before submitting.");
        return;
    }

    const successMessage = document.getElementById("success-message");
    successMessage.style.display = "block";

    setTimeout(() => {
        successMessage.style.display = "none";
    }, 3000);

    document.getElementById("contact-form").reset();
}