function calculateTotalPrice() {
    let d1 = document.getElementById("pickupDate").value;
    let d2 = document.getElementById("returnDate").value;
    let price= document.getElementById("price").innerHTML;
    if(d1 && d2){
        let dateOne = new Date(d1);
        let dateTwo = new Date(d2);
        let time = Math.abs(dateTwo - dateOne);
        let days = Math.ceil(time / (1000 * 60 * 60 * 24));
        let totalPrice = (days*price).toString();
        console.log(price);
    document.getElementById("totalPrice").innerHTML=totalPrice;
    }
}


// Initialize and add the map
function initMap() {
    // The location of Uluru
    const uluru = { lat: -25.344, lng: 131.031 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 4,
        center: uluru,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
    });
}

window.initMap = initMap;