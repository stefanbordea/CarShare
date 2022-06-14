<html>
<?php
require '../App/Views/common/head.php';
require '../App/Views/common/navigation.php';
use App\Authentication;
?>
<head>
    <link rel="stylesheet" href="/css/profile.css">
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
        <ul class="nav nav-tabs" id="profileTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active profileTab" id="tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link profileTab" id="tab" data-bs-toggle="tab" data-bs-target="#listings" type="button" role="tab" aria-controls="listings" aria-selected="false">My Listings</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link profileTab" id="tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
            </li>
    </ul>
        </div>
    </div>
    
</div>
    <div class="tab-content formBox" id="myTabContent">
        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            <div class="container" style="text-align: center;">
                <div class="row" >
                    <div class="col-md-6" id="firstColumn">
                            First Name:
                    </div>
                    <div class="col-md-6" id="secondColumn">
                        <?php foreach($license as $license) : echo $license['fname']; ?>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6" id="firstColumn">
                        Last Name:
                    </div>
                    <div class="col-md-6" id="secondColumn">
                        <?php  echo $license['lname']; ?>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6" id="firstColumn">
                        Date Of Birth:
                    </div>
                    <div class="col-md-6" id="secondColumn">
                        <?php echo $license['dateOfBirth'];  endforeach; ?>
                    </div>

                </div>
                <a href="/edit">Change Password</a>
            </div>

        </div>
        <div class="tab-pane" id="listings" role="tabpanel" aria-labelledby="home-tab">



            <?php foreach ($listings as $listing)  {
                if($_SESSION['user_id'] == $listing['userID']){
            $url = "/Listings/index?id=".$listing['vehicleID'];
            ?>
            <div class="card" style="width: 18rem;" method="GET" id="profileCards">
                <img src="../images/<?php echo  $listing['photoLink']?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $vehicles[$listing['vehicleID']]['brand'] . ' ' . $vehicles[$listing['vehicleID']]['model'] ?></h5>
                    <p class="card-text"><?php echo 'Price per day : ' . $listing['pricePerDay'] . '€<br>'.
                            'Pickup : ' . $listing['pickupLocation'] .' <br>'.
                            'Return : ' . $listing['returnLocation']?></p>
                    <a href="<?php echo $url;?>" class="btn btn-primary">More Details</a>
                </div>
            </div>
                    <?php
                }
            }
            ?>
        </div>

        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Contact</div>

    </div>

<?php // foreach($license as $license) { ?>
<!--    <h3> Hello, --><?php //echo $license['fname'] . " ". $license['lname'];?><!--</h3>-->
<!--    --><?php //}?>

<?php
require '../App/Views/common/footer.php';
?>
</html>
