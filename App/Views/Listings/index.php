<html>
<?php

require '../App/Views/common/head.php';
require '../App/Views/common/navigation.php';
?>
<head>
    <script src="/js/script.js"></script>
  </head>

<div class="container" id="browseContainer" class="formBox">
<?php
$passedId =$_GET['id'];
foreach($listings as $listing){





    if($listing['vehicleID'] == $passedId){ ?>

        <div class="row" id="listingTitle">
                <div class="photo" id="firstColumn" >
                    <h1> <?php echo $vehicles[$listing['vehicleID']]['brand'] . ' ' . $vehicles[$listing['vehicleID']]['model'] ?></h1>

                </div>
        </div>



        <div class="listingImage">
                <img src="../images/<?php echo  $listing['photoLink']?>" class="img-fluid" alt="..."  >
        </div>


    <div class="row">
        <div class="col-md-6" id="firstColumnListing">
            Uploaded by:
        </div>
        <div class="col-md-6" id="secondColumnListing">
<!--                --><?php //echo $licenses[$listing['userID']]['lname']; ?>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6" id="firstColumnListing">
            Brand:
        </div>
        <div class="col-md-6" id="secondColumnListing">
            <?php echo $vehicles[$listing['vehicleID']]['brand']; ?>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6" id="firstColumnListing">
            Model:
        </div>
        <div class="col-md-6" id="secondColumnListing">
            <?php echo $vehicles[$listing['vehicleID']]['model'] ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" id="firstColumnListing">
            Year:
        </div>
        <div class="col-md-6" id="secondColumnListing">
            <?php echo $vehicles[$listing['vehicleID']]['year'] ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" id="firstColumnListing">
            Type:
        </div>
        <div class="col-md-6" id="secondColumnListing">
            <?php echo $vehicles[$listing['vehicleID']]['type'] ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" id="firstColumnListing">
            Pick-up Location:
        </div>
        <div class="col-md-6" id="secondColumnListing">
            <?php echo $listing['pickupLocation'] ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 " id="firstColumnListing">
            Return Location:
        </div>
        <div class="col-md-6 " id="secondColumnListing">
            <?php echo $listing['returnLocation'] ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 " id="firstColumnListing">
            Price Per Day:
        </div>
        <div class="col-md-6 " id="secondColumnListing">
             <p id="price"><?php echo $listing['pricePerDay'] ?> </p>
        </div>
    </div>

    <div class="row ">
        <div class="col-md-6 " id="firstColumnListing">
            Select Pickup Date:
        </div>
        <div class="col-md-6 " id="secondColumnListing" >
            <input class="form-control datepicker" type="date" placeholder ="Select DateTime" id="pickupDate">
        </div>
    </div>
    <div class="row ">
        <div class="col-md-6 " id="firstColumnListing">
            Select Return Date:
        </div>
        <div class="col-md-6 " id="secondColumnListing">
            <input class="form-control datepicker " type="date" placeholder ="Select DateTime" id="returnDate">
        </div>
    </div>
    <div class="row last">
        <div class="col-md-6 " id="firstColumnListing">
            Total Price for
        </div>
        <div class="col-md-6 " id="secondColumnListing">
            <p id="totalPrice"> </p>
        </div>
    </div>
    <div class="row last">
        <div class="col-md-6 date" id="firstColumnListing">
            <button class="btn btn-primary" onclick="calculateTotalPrice()" id="calculatePrice">Calculate Price</button>
        </div>

    </div>
</div>

<?php
}
}
?>


<?php
require '../App/Views/common/footer.php';
?>
</html>

