function getLocation() {
    var status = document.getElementById("location-status");

    if (navigator.geolocation) {
        status.value = "Getting location...";
        navigator.geolocation.getCurrentPosition(uploadLocation, showError);
    } else {
        status.value = "Geolocation is not supported by this browser.";
    }
}

function uploadLocation(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    document.getElementById("location-status").value = 
        "Latitude: " + latitude + 
        "\nLongitude: " + longitude + 
        "\nFetching location name...";

    // Reverse Geocode to get the location name using Nominatim API
    var url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`;

    fetch(url)
    .then(response => response.json())
    .then(data => {
        var locationName = data.display_name || "Unknown location";
        document.getElementById("location-status").value = 
            "Location: " + locationName + 
            "\nLatitude: " + latitude + 
            "\nLongitude: " + longitude;
    })
    .catch(error => {
        document.getElementById("location-status").value = 
            "Error retrieving location name.";
    });
}

function showError(error) {
    var status = document.getElementById("location-status");
    switch(error.code) {
        case error.PERMISSION_DENIED:
            status.value = "User denied the request for Geolocation.";
            break;
        case error.POSITION_UNAVAILABLE:
            status.value = "Location information is unavailable.";
            break;
        case error.TIMEOUT:
            status.value = "The request to get user location timed out.";
            break;
        case error.UNKNOWN_ERROR:
            status.value = "An unknown error occurred.";
            break;
    }
}