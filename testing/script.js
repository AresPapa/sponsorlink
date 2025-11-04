const button = document.getElementById("actionButton");
const description = document.getElementById("description");

button.addEventListener("click", () => {
  description.classList.toggle("expanded");
  button.textContent = description.classList.contains("expanded")
    ? "Read less"
    : "Read more";
});
