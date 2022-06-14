<html>
<?php
require '../App/Views/common/head.php';
require '../App/Views/common/navigation.php';

?>
<div class="veh-container">
    <h3 class="head">Earn passive income with your car</h3>
</div>
<span class="promote-listing">
    <img src="/images/socar-post.jpg" alt="" class="veh-img">
    <img src="/images/veh-rent.jpg" alt="" class="veh-img">
    <img src="/images/passive-income.jpg" alt="" class="veh-img">
</span>
<div class="vehform-container">
    <form action="/vehicles/addNew" method="post" enctype="multipart/form-data" id="formBox">>
        <div class="row mb-3">
            <div class="col" style="font-size:20px;">
                <p>Step 1: Enter your vehicle information:</po>
            </div>
            <div class="col-md-6">

                <div class="input-box">
                    <label class="col-sm-2 col-form-label" for="brand">Vehicle Brand</label>
                    <input type="text" id="brand" name="brand">
                </div>
<!-- <h1>Enter vehicle infromation</h1>
<form action="/vehicles/addNew" method="post" enctype="multipart/form-data" id="formBox">
    <div>
        <label for="brand">Vehicle Brand</label>-->
        <input type="text" id="brand"  name="brand" required>
    </div>

    <div>
        <label for="model">Vehicle Model</label>
        <input type="text" id="model"  name="model" required>
    </div>


    <div>
        <label for="year">Year</label>
        <input type="number" id="year" name="year" min="1960" max="2022" required>
    </div>

    <br>
    <div>
        Type of fuel:
        <input type="radio" name="typeOfFuel" value="Gas" required>Gas
        <input type="radio" name="typeOfFuel" value="Diesel">Diesel
        <input type="radio" name="typeOfFuel" value="LPG">LPG
        <input type="radio" name="typeOfFuel" value="Gas">Electric
    </div>
    <br>


              
            </div>

            <div class="col" id="extras">
                Features<br>
                <div class="form-check">
                    <input class="form-check-input" name="features[]" type="checkbox" value="ABS" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        ABS
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" name="features[]" type="checkbox" value="ParkingSensor" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        ParkingSensor
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" name="features[]" type="checkbox" value="CruiseControl" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                    CruiseControl
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" name="features[]" type="checkbox" value="GPS" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        GPS
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" name="features[]" type="checkbox" value="Turbo" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                    Turbo
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" name="features[]" type="checkbox" value="RearCamera" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                    Rear Camera
                    </label>
                </div>
                
                <div class="form-check">
                    <input class="form-check-input" name="features[]" type="checkbox" value="Bluetooth" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                    Bluetooth
                    </label>
                </div>
                
                <div class="form-check">
                    <input class="form-check-input" name="features[]" type="checkbox" value="AirCondition" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                    Air Condition
                    </label>
                </div>
                <button type="submit" class="vehsubmit">Submit</button>
                <!--                 
                <input type="checkbox" name="features[]" value="ABS">ABS<br>
                <input type="checkbox" name="features[]" value="ParkingSensor">Parking sensor<br>
                <input type="checkbox" name="features[]" value="CruiseControl">Cruise control<br>
                <input type="checkbox" name="features[]" value="GPS">GPS<br>
                <input type="checkbox" name="features[]" value="Turbo">Turbo<br>
                <input type="checkbox" name="features[]" value="RearCamera">Rear Camera<br>
                <input type="checkbox" name="features[]" value="Bluetooth">Bluetooth<br>
                <input type="checkbox" name="features[]" value="AirCondition">Air condition<br> -->

               

            </div>
        </div>
</div>
</form>
<?php
require '../App/Views/common/footer.php';
?>
</html>
