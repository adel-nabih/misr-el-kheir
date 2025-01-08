document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll(".full-width-table .slide");
    const prevBtn = document.getElementById("prev-btn");
    const nextBtn = document.getElementById("next-btn");
    let currentIndex = 0;
    let interval;

    // Function to show a specific slide
    function showSlide(index) {
        // Hide all slides
        slides.forEach((slide) => slide.classList.remove("active"));

        // Show the current slide
        slides[index].classList.add("active");
    }

    // Function to move to the next slide
    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    }

    // Function to move to the previous slide
    function prevSlide() {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        showSlide(currentIndex);
    }

    // Start the automatic slideshow
    function startSlideshow() {
        interval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
    }

    // Stop the automatic slideshow
    function stopSlideshow() {
        clearInterval(interval);
    }

    // Event listeners for manual navigation
    prevBtn.addEventListener("click", () => {
        stopSlideshow();
        prevSlide();
        startSlideshow();
    });

    nextBtn.addEventListener("click", () => {
        stopSlideshow();
        nextSlide();
        startSlideshow();
    });

    // Initialize the slideshow
    showSlide(currentIndex);
    startSlideshow();
});