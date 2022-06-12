function calculateDays() {
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
    document.getElementById("totalPrice").innerText=totalPrice;
    }
}
