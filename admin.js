// Check if admin data already exists in localStorage
if (!localStorage.getItem("admin")) {
    // sample admin 
    const admin = {
        id: "admin123",
        password: "admin@123",
    };

    localStorage.setItem("admin", JSON.stringify(admin));
}

function adminLogin() {
    const adminId = document.getElementById("admin-id").value.trim();
    const password = document.getElementById("password").value.trim();

    if (!adminId || !password) {
        alert("Please fill out all fields.");
        return; 
    }

    const storedAdmin = JSON.parse(localStorage.getItem("admin"));

    if (storedAdmin && storedAdmin.id === adminId && storedAdmin.password === password) {
        const successMessage = document.getElementById("admin-login-success");
        successMessage.style.display = "block";

        setTimeout(() => {
            window.location.href = "adminDashboard.html"; 
        }, 2000);
    } else {
        const errorMessage = document.getElementById("admin-login-error");
        errorMessage.style.display = "block";
    }
}

const volunteers = [
    { name: "ahmed", status: "Pending" },
    { name: "mohamed", status: "Approved" },
    { name: "omar", status: "Pending" },
];

const programs = [
    { name: "Education Initiative", status: "Active" },
    { name: "Healthcare Program", status: "Active" },
    { name: "Economic Empowerment", status: "Inactive" },
];

function updateDashboardMetrics() {
    console.log("Updating dashboard metrics...");

    const donations = JSON.parse(localStorage.getItem("donations")) || [];
    console.log("Donations:", donations);

    const totalDonations = donations.reduce((sum, donation) => sum + donation.amount, 0);
    document.getElementById("total-donations").textContent = `${totalDonations} EGP`;

    const volunteers = JSON.parse(localStorage.getItem("volunteers")) || [];
    console.log("Volunteers:", volunteers);

    const pendingVolunteers = volunteers.filter((volunteer) => volunteer.status === "Pending").length;
    document.getElementById("volunteer-count").textContent = pendingVolunteers;

    const activePrograms = programs.filter((program) => program.status === "Active").length;
    document.getElementById("active-programs").textContent = activePrograms;
}

function addDonation() {
    const donorName = document.getElementById("donor-name").value.trim();
    const amount = parseFloat(document.getElementById("donation-amount").value.trim());

    if (!donorName || isNaN(amount)) {
        alert("Please fill out all fields correctly.");
        return;
    }

    const donations = JSON.parse(localStorage.getItem("donations")) || [];

    donations.push({ donor: donorName, amount: amount });

    localStorage.setItem("donations", JSON.stringify(donations));

    alert("Donation added successfully!");
    updateDashboardMetrics();
    window.location.href = "adminDashboard.html";
}

function addVolunteer() {
    const volunteerName = document.getElementById("volunteer-name").value.trim();
    const volunteerEmail = document.getElementById("volunteer-email").value.trim();

    if (!volunteerName || !volunteerEmail) {
        alert("Please fill out all fields correctly.");
        return;
    }

    const volunteers = JSON.parse(localStorage.getItem("volunteers")) || [];

    volunteers.push({ name: volunteerName, email: volunteerEmail, status: "Pending" });

    localStorage.setItem("volunteers", JSON.stringify(volunteers));
    console.log("New volunteer added:", { name: volunteerName, email: volunteerEmail, status: "Pending" });

    alert("Volunteer added successfully!");
    updateDashboardMetrics(); // Update the dashboard metrics
    window.location.href = "adminDashboard.html"; // Redirect to dashboard
}

window.onload = function () {
    console.log("Dashboard page loaded.");
    updateDashboardMetrics();
};