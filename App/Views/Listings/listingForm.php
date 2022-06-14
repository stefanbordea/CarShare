<?php
require '../App/Views/common/head.php';
require '../App/Views/common/navigation.php';

?>

<body id="list-container">


    <h3>You are nearly there!</h3>
    <div class="listform">
        <form action="/listings/addNew" method="post" enctype="multipart/form-data">
            <div class="col-md-6">

                <div class="input-box">
                    <label class="col-sm-2 col-form-label" for="pricePerDay">Price per pay (in Euros €)</label>
                    <input type="text" id="pricePerDay" name="pricePerDay">
                </div>
               
                
                <div class="input-box">
                    <label class="col-sm-2 col-form-label" for=" pickupLocation">Pickup location</label>
                    <input type="text" id=" pickupLocation" name="pickupLocation">
                </div>
               
                <div class="input-box">
                    <label class="col-sm-2 col-form-label" for="pricePerDay">Return location</label>
                    <input type="text" id="returnLocation" name="returnLocation">
                </div>
                
                <div class="input-box">
                    <label class="col-sm-2 col-form-label" for="pricePerDay">Description</label>
                    <input type="text" id="description" name="description">
                </div>
                <!-- 
            <div>
                <label for="pricePerDay">Price per pay</label>
                <input type="number" id="pricePerDay" name="pricePerDay">
            </div>

            <div>
                <label for="pickupLocation">Pickup location</label>
                <input type="text" id="pickupLocation" name="pickupLocation">
            </div>

            <div>
                <label for="returnLocation">Return location</label>
                <input type="text" id="returnLocation" name="returnLocation">
            </div>

            <div>
                <label for="description">Description</label>
                <input type="text" id="description" name="description" placeholder="Description...">
            </div> -->

                <div>
                    Select image to upload:
                    <input type="file" name="fileToUpload" id="image">
                </div>

                <div>
                    <input type="hidden" id="vehicleID" name="vehicleID" value="<?php echo $vehicleID ?>">
                </div>


                <button type="submit">Submit</button>
        </form>
    </div>
</body>