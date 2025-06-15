document
    .querySelectorAll(".received-offer-buttons-event")
    .forEach((container) => {
        // Select all the containers that represent received offers.

        const offerId = container.dataset.offerId;
        // Extract the ID of the offer from the container's data attribute (data-offer-id), so it knows which offer is being interacted with.

        const logAction = (action) => {
            console.log(`Offer ${offerId}: ${action}`);
            // Logging for debugging purposes.

            alert(`Simulating ${action} action for Offer #${offerId}`);
            // Sending an alert to simulate the action taken on the offer.
            // When we incorporate real logic, this will be replaced with actual functionality.
        };

        container
            .querySelector(".accept")
            .addEventListener("click", () => logAction("ACCEPTED")); // Accept button.
        container
            .querySelector(".decline")
            .addEventListener("click", () => logAction("DECLINED")); // Decline button.
        container
            .querySelector(".modify")
            .addEventListener("click", () => logAction("MODIFIED")); // Modify button.
        // Adding event listeners to the buttons, they call the logAction function.
    });
