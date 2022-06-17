<html>
<?php
require '../App/Views/common/head.php';
require '../App/Views/common/navigation.php';

?>

<body id="list-container">

<form action="/listings/addNew" method="post" enctype="multipart/form-data" id="formBox">


    <h3>You are nearly there!</h3>
    <div class="listform">
        <form action="/listings/addNew" method="post" enctype="multipart/form-data">
            <div class="col-md-6">

              

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

    <!-- The area for the drag & drop-->
    <div class="drop-zone">
        <span class="drop-zone__prompt">Drop image here or click to upload</span>
        <input type="file" name="fileToUpload" id="image" class="drop-zone__input" required>
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
<script src="/js/drag.js"></script>
