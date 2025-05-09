const buttons = document.querySelectorAll(".tier-btn");
const content = document.getElementById("tierContent");

// Sample data for each tier
const tierData = {
	bronze: "This is the Bronze tier. Basic perks included.",
	silver: "Silver tier selected. Enjoy some premium perks!",
	gold: "Welcome to the Gold tier! Full access granted.",
};

// Set Bronze tier as default
document.addEventListener("DOMContentLoaded", () => {
	const bronzeButton = document.querySelector(
		'.tier-btn[data-tier="bronze"]'
	);
	bronzeButton.classList.add("active");
	content.innerHTML = `<p>${tierData.bronze}</p>`;
});

// Tier selection logic
buttons.forEach((button) => {
	button.addEventListener("click", () => {
		// Remove active class from all buttons
		buttons.forEach((btn) => btn.classList.remove("active"));

		// Add active to clicked one
		button.classList.add("active");

		// Update content
		// Displays the content based on the selected tier
		const selectedTier = button.getAttribute("data-tier");
		content.innerHTML = `<p>${tierData[selectedTier]}</p>`;
	});
});
