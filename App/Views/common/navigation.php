

    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 text-white">Home</a></li>
                    <li><a href="/Browse/browse" class="nav-link px-2 text-white">Browse</a></li>
                    <li><a href="/About/about" class="nav-link px-2 text-white">About</a></li>
                </ul>
                <a href="/Listings/listingForm"><button type="button" class="btn btn-outline-light me-2 listingButton">Create a Listing</button></a>

                <div class="text-end">
                    <?php if(isset($_SESSION['user_id'])) { ?>
                        <a href="/Profile/profile"><button type="button" class="btn btn-outline-light me-2">Profile</button></a>
                        <a href="/logout"><button type="button" class="btn btn-outline-light">Log out</button></a>
                    <?php } else{ ?>
                        <a href="/Login/login"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
                        <a href="/Signup/signup"><button type="button" class="btn btn-warning">Sign-up</button></a>
                    <?php }?>
                </div>
            </div>
        </div>
    </header>



    <footer class="w-100" id="footerID">
        <div class="footerContainer">
            <div class="footer">
                <div class="footerLeft">
                    <h5 class="text-white mb-3">More links</h5>
                    <ul class="footerNavigation list-unstyled ">
                        <li><a href="/"  class="nav-link px-2 text-white">Home</a></li>
                        <li><a href="/Browse/browse"  class="nav-link px-2 text-white">Browse</a></li>
                        <li><a href="/About/about"  class="nav-link px-2 text-white">About</a></li>
                        <li><a href="/Privacy/privacy"  class="nav-link px-2 text-white">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="footerRight">
                    <h5 class="h1 text-white">Something</h5>
                    <p class="small ">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                    <p class="small mb-0">&copy; Copyrights. All rights reserved. <a class="text-primary" href="#">www.carshare.com</a></p>

                </div>

            </div>
        </div>
    </footer>