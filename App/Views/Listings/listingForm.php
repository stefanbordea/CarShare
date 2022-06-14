<html>
<?php
require '../App/Views/common/head.php';
require '../App/Views/common/navigation.php';

?>
<h1>Create Listing</h1>
<form action="/listings/addNew" method="post" enctype="multipart/form-data" id="formBox">


    <div>
        <label for="pricePerDay">Price per day</label>
        <input type="number" id="pricePerDay" name="pricePerDay" required>
    </div>

    <div>
        <label for="pickupLocation">Pickup location</label>
        <input type="text" id="pickupLocation" name="pickupLocation" required>
    </div>

    <div>
        <label for="returnLocation">Return location</label>
        <input type="text" id="returnLocation" name="returnLocation" required>
    </div>

    <div>
        <label for="description">Description</label>
        <input type="text" id="description" name="description" placeholder="Description...">
    </div>

    <div>
        Select image to upload:
        <input type="file" name="fileToUpload" id="image" required>
    </div>

    <div>
        <input type="hidden" id="vehicleID" name="vehicleID" value="<?php echo $vehicleID ?>">
    </div>


    <button type="submit">Submit</button>
</form>

<?php
require '../App/Views/common/footer.php';
?>
</html>