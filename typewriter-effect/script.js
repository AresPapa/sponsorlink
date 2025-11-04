document.addEventListener("DOMContentLoaded", function () {
    const lines = [
        "The right sponsorship",
        "For the right event",
        "At the right time",
    ];

    const el = document.getElementById("tw-header");
    let lineIndex = 0;
    let charIndex = 0;
    let isDeleting = false;

    function typeEffect() {
        const currentLine = lines[lineIndex];
        if (isDeleting) {
            el.textContent = currentLine.substring(0, charIndex--);
        } else {
            el.textContent = currentLine.substring(0, charIndex++);
        }

        let speed = isDeleting ? 50 : 100; // typing vs deleting speed

        if (!isDeleting && charIndex === currentLine.length + 1) {
            // pause before deleting
            isDeleting = true;
            speed = 1000;
        } else if (isDeleting && charIndex === 0) {
            // move to next line
            isDeleting = false;
            lineIndex = (lineIndex + 1) % lines.length;
            speed = 500;
        }

        setTimeout(typeEffect, speed);
    }

    typeEffect();
});
