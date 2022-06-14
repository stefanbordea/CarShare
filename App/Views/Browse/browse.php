<?php
require '../App/Views/common/head.php';
require '../App/Views/common/navigation.php';
?>

<div class="form-container">
    <form action="/browse/searchListings" method="GET" class="form">
        Search for a specific make or model:
        <input type="text" name="query" id="searchbar" />
        <input type="submit" value="Search" class="form-btn" id="searchButton" />
    </form>
</div>

<form action="" method="GET">
    <label for="sort">Sort by :</label>
    <select name="sort" id="sort">
        <option value="1">Price Ascending</option>
        <option value="2">Price Descending</option>
    </select>

    <?php
    //storing the query passed from Browse Controller for pagination of results
    $query = $qry;
    //if the user has searched pass the query for sorting of results
    if (isset($query)) {
    ?>
    <input type="hidden" name="query" value="<?php echo $query ?>">
    <?php
    }
    ?>
    <?php
    if (isset($_GET['page'])) {
        ?>
        <input type="hidden" name="page" value="<?php echo $_GET['page'] ?>">
        <?php
    }
    ?>
    <button type="submit">Sort</button>
</form>




<div class="row mt-4" style="margin-right: 0;">
    <?php

//    if (isset($_POST['sort'])) {
//        switch ($_POST['sort']) {
//            case 1:
//                $sortBy = "pricePerDay";
//                $order = "ASC";
//                break;
//            case 2:
//                $sortBy = "pricePerDay";
//                $order = "DESC";
//                break;
//        }
//        $listings = \App\Controllers\Listings::getListingsSorted($sortBy, $order);
//    }


    if (isset($_GET['sort'])) {
        switch ($_GET['sort']) {
            case 1:
                //Sort two-dimensional array $listings with usort function
                function build_sorter($key) {
                    return function ($a, $b) use ($key) {
                        //$a[$key] is less, equal or greater than $b[$key] the function returns -1, 0 or 1 respectively
                        return $a[$key] <=> $b[$key];
                    };
                }
                //usort is sorting the array based on the value return from build_sorter
                usort($listings, build_sorter('pricePerDay'));
                break;
            case 2:
                function build_sorter($key) {
                    return function ($a, $b) use ($key) {
                        return $b[$key] <=> $a[$key];
                    };
                }
                usort($listings, build_sorter('pricePerDay'));
                break;
        }
    }

    // Look for a GET variable page if not found default is 1.
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    } else {
        $page = 1;
    }




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
<p style="margin-left: 0.7em;">Found <?php echo $numberOfListings?> Results</p>
<nav class="pagin" aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php
        //changing the paginationURL based on whether the user is browsing, searching or sorting
        $paginationURL = '?page=';
        if (isset($query)) {
            $paginationURL = '?query=' . $query . '&page=';
        }
        if (isset($_GET['sort'])) {
            $paginationURL = '?sort=' . $_GET['sort'] .'&query=' . $query . '&page=';
        }


        ?>
            <?php
            if ($page > 1) {
            ?>
                <li class="page-item"><a class="page-link" href="<?php echo $paginationURL . ($page - 1) ?>">Previous</a></li>
            <?php
            }
            ?>
            <?php
            for ($i = 1; $i <= $numberOfPages; $i++) {
            ?>
                <li <?php echo $i == $page ? 'class="page-item active"' : 'class="page-item"' ?>>
                    <a class="page-link" href="<?php echo $paginationURL  . $i ?>"><?php echo $i ?></a>
                </li>
            <?php
            }
            ?>
            <?php
            if ($page < $numberOfPages) {
            ?>
                <li class="page-item"><a class="page-link" href="<?php echo $paginationURL  . ($page + 1) ?>">Next</a></li>
            <?php
            }
            ?>

    </ul>
</nav>