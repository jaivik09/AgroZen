function populateStateDropdowns() {
    const states = ["Andaman and Nicobar", "Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar", "Chandigarh", "Chhattisgarh", "Dadra and Nagar", "Daman and Diu", "Delhi", "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jammu and Kashmir", "Jharkhand", "Karnataka", "Kerala", "Lakshadweep", "Madhya Pradesh", "Maharashtra", "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Puducherry", "Punjab", "Rajasthan", "Sikkim", "Tamil Nadu", "Telangana", "Tripura", "Uttar Pradesh", "Uttarakhand", "West Bengal"];
  
    const dropdowns = document.querySelectorAll('.state-dropdown');
    dropdowns.forEach(dropdown => {
        states.forEach(state => {
            const option = document.createElement('option');
            option.text = state;
            option.value = state;
            dropdown.add(option);
        });
    });
}

populateStateDropdowns();

const stateDropdowns = document.querySelectorAll(".state-dropdown");
const searchButton = document.querySelector(".search-btn");
const dateInput = document.querySelector(".Date-input");

const getAgriPrice = async () => {

    stateDropdowns.forEach((dropdown) => {
        const stateInput = dropdown.value;
        const apiUrl = `https://vegetablemarketprice.com/api/dataapi/market/${stateInput}/daywisedata?date=${dateInput.value}`;
        console.log(apiUrl);
        fetch(apiUrl)
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then((agriData) => {
                console.log("User Data:", agriData);
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
};

searchButton.addEventListener("click", getAgriPrice);