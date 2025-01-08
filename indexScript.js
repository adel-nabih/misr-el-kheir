document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll(".full-width-table .slide");
    const prevBtn = document.getElementById("prev-btn");
    const nextBtn = document.getElementById("next-btn");
    let currentIndex = 0;
    let interval;

    function showSlide(index) {
        // hides all slides
        slides.forEach((slide) => slide.classList.remove("active"));

        // shows only the current slide
        slides[index].classList.add("active");
    }

    // next slide
    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    }

    // previous slide
    function prevSlide() {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        showSlide(currentIndex);
    }

    function startSlideshow() {
        interval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
    }

    function stopSlideshow() {
        clearInterval(interval);
    }

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

    showSlide(currentIndex);
    startSlideshow();
});