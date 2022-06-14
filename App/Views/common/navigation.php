    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 text-white">Home</a></li>
                    <li><a href="/browse" class="nav-link px-2 text-white">Browse</a></li>
                    <li><a href="/about" class="nav-link px-2 text-white">About</a></li>
                </ul>
                <a href="/createListing"><button type="button" class="btn btn-outline-light me-2 listingButton">Create a Listing</button></a>

                <div class="text-end">
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <a href="/profile"><button type="button" class="btn btn-outline-light me-2">Profile</button></a>
                        <a href="/logout"><button type="button" class="btn btn-outline-light">Log out</button></a>
                    <?php
}
else { ?>
                        <a href="/login"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
                        <a href="/signup"><button type="button" class="btn btn-warning">Sign-up</button></a>
                    <?php
}?>
                    <img src="/images/toggle.png" width="30" height="30" id="darkModeToggle" class="darkModeToggle"></img>
                    <label for="darkModeToggle">
                </div>
            </div>
        </div>
    </header>