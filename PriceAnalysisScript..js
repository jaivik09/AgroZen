


const apiUrl = 'https://vegetablemarketprice.com/api/dataapi/market/gujarat/daywisedata?date=2024-03-11';

// Make a GET request using the Fetch API
fetch(apiUrl)
.then(response => {
    if (!response.ok) {
    throw new Error('Network response was not ok');
    }
    return response.json();
})
.then(userData => {
    // Process the retrieved user data
    console.log('User Data:', userData);
})
.catch(error => {
    console.error('Error:', error);
});
