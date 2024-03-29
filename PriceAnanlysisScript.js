const populateStateDropdowns = () => {
    const states = [
        "Andaman", "AndhraPradesh", "Arunachal", "Assam", "Bihar", "Chandigarh", "Chhattisgarh",
        "DadraNagar", "DamanDiu", "Delhi", "Goa", "Gujarat", "Haryana", "HimachalPradesh", "JammuKashmir",
        "Jharkhand", "Karnataka", "Kerala", "Lakshadweep", "MadhyaPradesh", "Maharashtra", "Manipur",
        "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Puducherry", "Punjab", "Rajasthan", "Sikkim",
        "TamilNadu", "Telangana", "Tripura", "UttarPradesh", "Uttarakhand", "West Bengal"
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

const today = new Date();
const formattedDate = today.toISOString().split('T')[0];

document.getElementById('Date-input').value = formattedDate;

const getVegetablePrices = async (state, date) => {
    try {
        
        const response = await fetch(`https://vegetablemarketprice.com/api/dataapi/market/${state}/daywisedata?date=${date}`);
        const data = await response.json();

        const tableBody = document.querySelector('.table-body');
        tableBody.innerHTML = '';

        data.data.forEach(vegetable => {
            const row = `
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-[16px]">
                    <td class="px-6 py-4 text-center"> <!-- Add text-center class to center the content -->
                        <img src="https://vegetablemarketprice.com/${vegetable.table.table_image_url}" class="justify-center mx-auto h-[30px] w-[30px]">
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        ${vegetable.vegetablename}
                    </th>
                    <td class="px-6 py-4">
                        ${vegetable.price}
                    </td>
                    <td class="px-6 py-4">
                        ${vegetable.retailprice}
                    </td>
                    <td class="px-6 py-4">
                        ${vegetable.shopingmallprice}
                    </td>
                </tr>
            `;
            tableBody.innerHTML += row;
        });
    } catch (error) {
        console.error('Error fetching data:', error);
    }
};


const searchButton = document.querySelector('.search-btn');
searchButton.addEventListener('click', () => {
    const state = document.getElementById('state-dropdown').value;
    const date = document.getElementById('Date-input').value;
    getVegetablePrices(state, date);
});
