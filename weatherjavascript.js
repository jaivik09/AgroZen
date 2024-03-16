const cityInput = document.querySelector(".city-input");
const searchButton = document.querySelector(".search-btn");
const currentWeatherDiv = document.querySelector(".current-weather");
const weatherCardsDiv = document.querySelector(".days-forecast .weather-cards");

const createWeatherCard = (cityName, weatherItem, index) => {

    if (index === 0) {
        return `<div class="details">
                    <h2>${cityName} (${weatherItem.last_updated.split(" ")[0]})</h2>
                    <h6>Temperature: ${weatherItem.temp_c}°C</h6>
                    <h6>Wind: ${weatherItem.wind_kph} KpH</h6>
                    <h6>Humidity: ${weatherItem.humidity}%</h6>
                </div>
                <div class="icon">
                    <img src="https:${weatherItem.condition.icon}" alt="weather-icon" style="display: block; margin: 0 auto; width: 100px; height: 100px;">
                    <h6>${weatherItem.condition.text}</h6>
                </div>`;
    } else {
        return `<li class="card">
                    <h3>${cityName} (${weatherItem.date})</h3>
                    <h6>Temp: ${(weatherItem.day.avgtemp_c).toFixed(2)}°C</h6>
                    <h6>Wind: ${weatherItem.day.maxwind_kph} KpH</h6>
                    <h6>Humidity: ${weatherItem.day.avghumidity}%</h6>
                    <h6>Chances of RAIN: ${weatherItem.day.daily_chance_of_rain}%</h6>
                    <div class="icon" style="text-align: center;">
                        <img src="https:${weatherItem.day.condition.icon}" alt="weather-icon" style="display: block; margin: 0 auto;">
                        <h6>${weatherItem.day.condition.text}</h6>
                    </div>
                </li>`;
    }
}

const getWeatherDetails = async () => {
    
    const city = cityInput.value.trim();
    if (!city) return;

    const url = `https://weatherapi-com.p.rapidapi.com/forecast.json?q=${city}&days=3`;
    const options = {
        method: 'GET',
        headers: {
            'X-RapidAPI-Key': 'e3e1f729b3msh85cf864fd1caf13p122909jsnce497d2a4a79',
            'X-RapidAPI-Host': 'weatherapi-com.p.rapidapi.com'
        }
    };

    try {
        const response = await fetch(url, options);
        if (!response.ok) {
            throw new Error('Failed to fetch weather data');
        }
        const result = await response.json();

        const cityName = result.location.name;
        const currentWeather = result.current;
        const forecast = result.forecast.forecastday;

        const currentHtml = createWeatherCard(cityName, currentWeather, 0);
        currentWeatherDiv.innerHTML = currentHtml;

        const forecastHtml = forecast.map((day, index) => {
            return createWeatherCard(cityName, day, index + 1);
        }).join('');
        weatherCardsDiv.innerHTML = forecastHtml;

    } catch (error) {
        console.error(error);
    }
}

searchButton.addEventListener("click", getWeatherDetails);
cityInput.addEventListener("keyup", (e) => {
    if (e.key === "Enter") {
        getWeatherDetails();
    }
});
