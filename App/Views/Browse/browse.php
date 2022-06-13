<?php
require '../App/Views/common/head.php';
require '../App/Views/common/navigation.php';
?>

<div class="form-container">
    <form action="/browse/searchListings" method="GET" class="form">
        Search for a specific make or model:
        <input type="text" name="query" id="searchbar" />
        <input type="submit" value="Search" class="form-btn" />
    </form>
</div>

<div class="row mt-4">
    <?php

    // Look for a GET variable page if not found default is 1.
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    } else {
        $page = 1;
    }


    //storing the query passed from Browse Controller for pagination of results
    $query = $qry;
    $numberOfListings = count($listings);
    $listingsPerPage = 5;
    $numberOfPages = ceil($numberOfListings / $listingsPerPage);
    $startFrom = ($page - 1) * $listingsPerPage;
    $endAt = $page < $numberOfPages ? $page * $listingsPerPage : $numberOfListings;

    for ($i = $startFrom; $i < $endAt; $i++) {
        $listing = $listings[$i];
        $url = "/Listings/index?id=" . $listing['vehicleID'];

    ?>

        <div class="col-md-3 mt-3" id="browseCardContainer">
            <div class="card" method="GET" id="browseCards">
                <img src="../images/<?php echo  $listing['photoLink'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo
                                            $vehicles[$listing['vehicleID']]['brand'] . ' ' . $vehicles[$listing['vehicleID']]['model'] ?></h5>
                    <p class="card-text"><?php echo 'Price per day : ' . $listing['pricePerDay'] . '€<br>' .
                                                'Pickup : ' . $listing['pickupLocation'] . ' <br>' .
                                                'Return : ' . $listing['returnLocation'] ?></p>
                    <a href="<?php echo $url; ?>" class="btn btn-primary">More Details</a>
                </div>
            </div>
        </div>

    <?php
    }
    if ($listings == []) {
        echo 'No matching listings were found';
    }
    ?>
</div>
<nav class="pagin" aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php
        //if query is null then user browses
        if (!isset($query)) {
        ?>
            <?php
            if ($page > 1) {
            ?>
                <li class="page-item"><a class="page-link" href="<?php echo '?page=' . ($page - 1) ?>">Previous</a></li>
            <?php
            }
            ?>
            <?php
            for ($i = 1; $i <= $numberOfPages; $i++) {
            ?>
                <li <?php echo $i == $page ? 'class="page-item active"' : 'class="page-item"' ?>>
                    <a class="page-link" href="<?php echo '?page=' . $i ?>"><?php echo $i ?></a>
                </li>
            <?php
            }
            ?>
            <?php
            if ($page < $numberOfPages) {
            ?>
                <li class="page-item"><a class="page-link" href="<?php echo '?page=' . ($page + 1) ?>">Next</a></li>
            <?php
            }
            ?>
        <?php
        } else { // else if query is not null the user searched and search results are paginated
        ?>
            <?php
            if ($page > 1) {
            ?>
                <li class="page-item"><a class="page-link" href="<?php echo '?query=' . $query . '&page=' . ($page - 1) ?>">
                        Previous</a></li>
            <?php
            }
            ?>
            <?php
            for ($i = 1; $i <= $numberOfPages; $i++) {
            ?>
                <li <?php echo $i == $page ? 'class="page-item active"' : 'class="page-item"' ?>>
                    <a class="page-link" href="<?php echo '?query=' . $query . '&page=' . $i ?>"><?php echo $i ?></a>
                </li>
            <?php
            }
            ?>
            <?php
            if ($page < $numberOfPages) {
            ?>
                <li class="page-item"><a class="page-link" href="<?php echo '?query=' . $query . '&page=' . ($page + 1) ?>">
                        Next</a></li>
            <?php
            }
            ?>
        <?php
        }
        ?>
    </ul>
</nav>