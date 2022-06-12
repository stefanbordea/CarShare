<?php
require '../App/Views/common/head.php';
require '../App/Views/common/navigation.php';
use App\Authentication;
?>
<head>
    <link rel="stylesheet" href="/css/profile.css">
</head>
    <ul class="nav nav-tabs" id="profileTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab" data-bs-toggle="tab" data-bs-target="#listings" type="button" role="tab" aria-controls="listings" aria-selected="false">My Listings</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            <div class="container">
                <div class="row">
                    <div class="col-md-6" id="firstColumn">
                            First Name:
                    </div>
                    <div class="col-md-6" id="secondColumn">
                        <?php foreach($license as $lisence) : echo $lisence['fname']; ?>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-6" id="firstColumn">
                        Last Name:
                    </div>
                    <div class="col-md-6" id="secondColumn">
                        <?php  echo $lisence['lname']; ?>
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
            </div>

        </div>
        <div class="tab-pane fade" id="listings" role="tabpanel" aria-labelledby="home-tab">Listings</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Contact</div>
    </div>
<?php // foreach($license as $license) { ?>
<!--    <h3> Hello, --><?php //echo $license['fname'] . " ". $license['lname'];?><!--</h3>-->
<!--    --><?php //}?>

