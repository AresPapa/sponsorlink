document
    .querySelectorAll(".received-offer-buttons-event")
    .forEach((container) => {

		// Extract the offer ID from the container's data attribute (data-offer-id) using dataset. 
        const offerId = container.dataset.offerId;

		// Logging for debugging purposes
        const logAction = (action) => {
            console.log(`Offer ${offerId}: ${action}`);

            // Placeholder for future backend logic
            alert(`Simulating ${action} action for Offer #${offerId}`);
        };
		
		// Adding event listeners to the buttons, right now only logging actions
        container
            .querySelector(".accept")
            .addEventListener("click", () => logAction("ACCEPTED"));
        container
            .querySelector(".decline")
            .addEventListener("click", () => logAction("DECLINED"));
        container
            .querySelector(".modify")
            .addEventListener("click", () => logAction("MODIFIED"));
    });
