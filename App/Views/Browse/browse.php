<?php
require '../App/Views/common/head.php';
require '../App/Views/common/navigation.php';
?>

<h1>BROWSE LISTINGS</h1>

<form action="/browse/searchListings" method="GET">
    <input type="text" name="query" />
    <input type="submit" value="Search" />
</form>


    <?php
        // Look for a GET variable page if not found default is 1.
        if (isset($_GET["page"])) {
            $page  = $_GET["page"];
        }
        else {
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
     ?>
    <div class="card" style="width: 18rem;">
        <img src="../images/<?php echo  $listing['photoLink']?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo
                    $vehicles[$listing['vehicleID']]['brand'] . ' ' . $vehicles[$listing['vehicleID']]['model'] ?></h5>
            <p class="card-text"><?php echo 'Price per day : ' . $listing['pricePerDay'] . '€<br>'.
                                            'Pickup : ' . $listing['pickupLocation'] .' <br>'.
                                            'Return : ' . $listing['returnLocation']?></p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    <?php
    }
    if ($listings == []) {
        echo 'No matching listings were found';
    }
    ?>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php
                //if query is null then user browses
                if (!isset($query)) {
            ?>
                    <?php
                        if ($page > 1) {
                    ?>
                    <li class="page-item"><a class="page-link" href="<?php echo '?page='.($page-1) ?>">Previous</a></li>
                    <?php
                        }
                    ?>
                    <?php
                        for ($i = 1; $i <= $numberOfPages; $i++) {
                    ?>
                    <li <?php echo $i == $page ? 'class="page-item active"': 'class="page-item"'?> >
                        <a class="page-link" href="<?php echo '?page='.$i ?>"><?php echo $i ?></a></li>
                    <?php
                        }
                    ?>
                    <?php
                        if ($page < $numberOfPages) {
                    ?>
                    <li class="page-item"><a class="page-link" href="<?php echo '?page='.($page + 1) ?>">Next</a></li>
                    <?php
                        }
                    ?>
            <?php
                } else { // else if query is not null the user searched and search results are paginated
            ?>
                    <?php
                    if ($page > 1) {
                        ?>
                        <li class="page-item"><a class="page-link"
                                                 href="<?php echo '?query='.$query . '&page='.($page-1) ?>">
                                                    Previous</a></li>
                        <?php
                    }
                    ?>
                    <?php
                    for ($i = 1; $i <= $numberOfPages; $i++) {
                        ?>
                        <li <?php echo $i == $page ? 'class="page-item active"': 'class="page-item"'?> >
                            <a class="page-link"
                               href="<?php echo '?query='.$query . '&page='.$i ?>"><?php echo $i ?></a></li>
                        <?php
                    }
                    ?>
                    <?php
                    if ($page < $numberOfPages) {
                        ?>
                        <li class="page-item"><a class="page-link"
                                                 href="<?php echo '?query='.$query . '&page='.($page + 1) ?>">
                                                    Next</a></li>
                        <?php
                    }
                    ?>
            <?php
                }
            ?>
        </ul>
    </nav>
