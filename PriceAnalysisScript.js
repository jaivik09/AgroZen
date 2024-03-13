function populateStateDropdowns() {
    const states = ["Assam", "Bihar", "Chandigarh", "Chhattisgarh", "Delhi", "Goa", "Gujarat", "Haryana", "Jharkhand", "Karnataka", "Kerala", "Lakshadweep", "Maharashtra", "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Puducherry", "Punjab", "Rajasthan", "Sikkim", "Telangana", "Tripura", "Uttarakhand", "West Bengal", 
                    "Andaman", //Andaman
                    "AndhraPradesh", //AndhraPradesh
                    "Arunachal", //Arunacha;
                    "DadraNagar", //DadraNagar
                    "DamanDiu", //DamanDiu
                    "HimachalPradesh", //HimachalPradesh
                    "JammuKashmir", //JammuKashmir
                    "MadhyaPradesh", //MadhyaPradesh
                    "TamilNadu", //TamilNadu
                    "UttarPradesh"];//UttarPradesh
  
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
        const apiUrl = `https://vegetablemarketprice.com/api/dataapi/market/${stateDropdowns.value}/daywisedata?date=${dateInput.value}`;
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