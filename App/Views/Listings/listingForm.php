<?php
require '../App/Views/common/head.php';
require '../App/Views/common/navigation.php';

?>
<h1>Create Listing</h1>
<form action="/listings/addNew" method="post">
    <div>
        <label for="vehicleID">Vehicle ID</label>
        <input type="number" id="vehicleID" min="0" name="vehicleID">
    </div>

    <div>
        <label for="description">Description</label>
        <input type="text" id="description" name="description" placeholder="Description...">
    </div>

    <div>
        <label for="pricePerDay">Price per pay</label>
        <input type="number" id="pricePerDay" name="pricePerDay" placeholder="Price er day">
    </div>

    <div>
        <label for="pickupLocation">Pickup location</label>
        <input type="text" id="pickupLocation" name="pickupLocation" placeholder="Pickup location">
    </div>

    <div>
        <label for="returnLocation">Return location</label>
        <input type="text" id="returnLocation" name="returnLocation" placeholder="Return location">
    </div>

    <button type="submit">Submit</button>
</form>
