// Get references to the necessary elements
const coffeeSelect = document.getElementById("coffeeSelection");
const inputBox = document.getElementById("myInput");
const payButton = document.getElementById("payButton");
const cancelButton = document.getElementById("cancelButton");
const totalAmountDisplay = document.getElementById("totalAmount");

// Object to store coffee prices
const coffeePrices = {
    "Cappuccino": 130,
    "Macchiato": 150,
    "Flat White": 140,
    "Latte": 120,
    "Mocha": 150,
    "Affogato": 160
};

// Function to calculate total amount
function calculateTotalAmount() {
    const selectedCoffee = coffeeSelect.value;
    const coffeePrice = coffeePrices[selectedCoffee];
    return coffeePrice || 0; // If coffee price is not found, default to 0
}

// Function to update total amount display
function updateTotalAmount() {
    const totalAmount = calculateTotalAmount();
    totalAmountDisplay.textContent = totalAmount + " Php";
}

// Event listener for coffee selection change
coffeeSelect.addEventListener("change", updateTotalAmount);

// Event listener for Pay Now button click
payButton.addEventListener("click", function() {
    const totalAmount = calculateTotalAmount();
    alert("Total amount to pay: " + totalAmount + " Php");
});

// Event listener for Cancel button click
cancelButton.addEventListener("click", function() {
    coffeeSelect.value = ""; // Reset selected coffee
    inputBox.value = ""; // Clear input box
    totalAmountDisplay.textContent = ""; // Clear total amount display
});

