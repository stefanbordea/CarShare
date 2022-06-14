<html>
<?php
require '../App/Views/common/head.php';
require '../App/Views/common/navigation.php';

?>

<h1>Enter vehicle infromation</h1>
<form action="/vehicles/addNew" method="post" enctype="multipart/form-data">
    <div>
        <label for="brand">Vehicle Brand</label>
        <input type="text" id="brand"  name="brand">
    </div>

    <div>
        <label for="model">Vehicle Model</label>
        <input type="text" id="model"  name="model">
    </div>


    <div>
        <label for="year">Year</label>
        <input type="number" id="year" name="year">
    </div>

    <br>
    <div>
        Type of fuel:
        <input type="radio" name="typeOfFuel" value="Gas">Gas
        <input type="radio" name="typeOfFuel" value="Diesel">Diesel
        <input type="radio" name="typeOfFuel" value="LPG">LPG
        <input type="radio" name="typeOfFuel" value="Gas">Electric
    </div>
    <br>


    <div>
        Features<br>
        <input type="checkbox" name="features[]" value="ABS">ABS<br>
        <input type="checkbox" name="features[]" value="ParkingSensor">Parking sensor<br>
        <input type="checkbox" name="features[]" value="CruiseControl">Cruise control<br>
        <input type="checkbox" name="features[]" value="GPS">GPS<br>
        <input type="checkbox" name="features[]" value="Turbo">Turbo<br>
        <input type="checkbox" name="features[]" value="RearCamera">Rear Camera<br>
        <input type="checkbox" name="features[]" value="Bluetooth">Bluetooth<br>
        <input type="checkbox" name="features[]" value="AirCondition">Air condition<br>
    </div>

    <button type="submit">Submit</button>
</form>

<?php
require '../App/Views/common/footer.php';
?>
</html>
