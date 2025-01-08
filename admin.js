// Check if admin data already exists in localStorage
if (!localStorage.getItem("admin")) {
    // Create sample admin object
    const admin = {
        id: "admin123", // Sample admin ID
        password: "admin@123", // Sample admin password
    };

    // Save admin data to localStorage
    localStorage.setItem("admin", JSON.stringify(admin));
}

function adminLogin() {
    // Get form inputs
    const adminId = document.getElementById("admin-id").value.trim();
    const password = document.getElementById("password").value.trim();

    // Check if fields are filled
    if (!adminId || !password) {
        alert("Please fill out all fields.");
        return; // Stop the function if any field is empty
    }

    // Retrieve stored admin data from localStorage
    const storedAdmin = JSON.parse(localStorage.getItem("admin"));

    // Check if admin exists and credentials match
    if (storedAdmin && storedAdmin.id === adminId && storedAdmin.password === password) {
        // Show success message
        const successMessage = document.getElementById("admin-login-success");
        successMessage.style.display = "block";

        // Optional: Redirect to another page after successful login
        setTimeout(() => {
            window.location.href = "adminDashboard.html"; // Redirect to admin dashboard
        }, 2000); // Redirect after 2 seconds
    } else {
        // Show error message
        const errorMessage = document.getElementById("admin-login-error");
        errorMessage.style.display = "block";
    }
}

// Mock data for volunteers and programs
const volunteers = [
    { name: "Alice", status: "Pending" },
    { name: "Bob", status: "Approved" },
    { name: "Charlie", status: "Pending" },
];

const programs = [
    { name: "Education Initiative", status: "Active" },
    { name: "Healthcare Program", status: "Active" },
    { name: "Economic Empowerment", status: "Inactive" },
];

// Function to update dashboard metrics
function updateDashboardMetrics() {
    console.log("Updating dashboard metrics...");

    // Fetch donations from localStorage
    const donations = JSON.parse(localStorage.getItem("donations")) || [];
    console.log("Donations:", donations);

    // Calculate total donations
    const totalDonations = donations.reduce((sum, donation) => sum + donation.amount, 0);
    document.getElementById("total-donations").textContent = `${totalDonations} EGP`;

    // Fetch volunteers from localStorage
    const volunteers = JSON.parse(localStorage.getItem("volunteers")) || [];
    console.log("Volunteers:", volunteers);

    // Count pending volunteer applications
    const pendingVolunteers = volunteers.filter((volunteer) => volunteer.status === "Pending").length;
    document.getElementById("volunteer-count").textContent = pendingVolunteers;

    // Count active programs
    const activePrograms = programs.filter((program) => program.status === "Active").length;
    document.getElementById("active-programs").textContent = activePrograms;
}

// Function to add a new donation
function addDonation() {
    const donorName = document.getElementById("donor-name").value.trim();
    const amount = parseFloat(document.getElementById("donation-amount").value.trim());

    if (!donorName || isNaN(amount)) {
        alert("Please fill out all fields correctly.");
        return;
    }

    // Fetch existing donations
    const donations = JSON.parse(localStorage.getItem("donations")) || [];

    // Add new donation
    donations.push({ donor: donorName, amount: amount });

    // Save to localStorage
    localStorage.setItem("donations", JSON.stringify(donations));

    alert("Donation added successfully!");
    updateDashboardMetrics(); // Update the dashboard metrics
    window.location.href = "adminDashboard.html"; // Redirect to dashboard
}

// Function to add a new volunteer
function addVolunteer() {
    const volunteerName = document.getElementById("volunteer-name").value.trim();
    const volunteerEmail = document.getElementById("volunteer-email").value.trim();

    if (!volunteerName || !volunteerEmail) {
        alert("Please fill out all fields correctly.");
        return;
    }

    // Fetch existing volunteers
    const volunteers = JSON.parse(localStorage.getItem("volunteers")) || [];

    // Add new volunteer with a default status of "Pending"
    volunteers.push({ name: volunteerName, email: volunteerEmail, status: "Pending" });

    // Save to localStorage
    localStorage.setItem("volunteers", JSON.stringify(volunteers));
    console.log("New volunteer added:", { name: volunteerName, email: volunteerEmail, status: "Pending" });

    alert("Volunteer added successfully!");
    updateDashboardMetrics(); // Update the dashboard metrics
    window.location.href = "adminDashboard.html"; // Redirect to dashboard
}

// Initialize the dashboard metrics when the page loads
window.onload = function () {
    console.log("Dashboard page loaded.");
    updateDashboardMetrics();
};