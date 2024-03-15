function populateStateDropdowns() {
    const states = [
        "Andaman",
        "AndhraPradesh",
        "Arunachal",
        "Assam",
        "Bihar",
        "Chandigarh",
        "Chhattisgarh",
        "DadraNagar",
        "DamanDiu",
        "Delhi",
        "Goa",
        "Gujarat",
        "Haryana",
        "HimachalPradesh",
        "JammuKashmir",
        "Jharkhand",
        "Karnataka",
        "Kerala",
        "Lakshadweep",
        "MadhyaPradesh",
        "Maharashtra",
        "Manipur",
        "Meghalaya",
        "Mizoram",
        "Nagaland",
        "Odisha",
        "Puducherry",
        "Punjab",
        "Rajasthan",
        "Sikkim",
        "TamilNadu",
        "Telangana",
        "Tripura",
        "UttarPradesh",
        "Uttarakhand",
        "West Bengal"
    ];
  
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
        const apiUrl = `https://vegetablemarketprice.com/api/dataapi/market/${dropdown.value}/daywisedata?date=${dateInput.value}`;
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