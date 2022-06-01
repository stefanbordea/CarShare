<html>
<?php
require '../App/Views/common/head.php';
require '../App/Views/common/navigation.php';
?>
<!---------------------->
<!-- CAROUSEL-->
<!---------------------->

<body>

<div id="demo" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/images/car-sunset3.jpg" alt="" class="d-block">
    </div>
    <div class="carousel-item">
      <img src="/images/suv.jpg" alt="" class="d-block">
    </div>
    <div class="carousel-item">
      <img src="/images/travel-family.jpg" alt="" class="d-block">
    </div>
  </div>

  <!-- Next and previous -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<!---------------------->
<!-- CARDS-->
<!---------------------->
<div class="container">
  <div class="row g-3">
    <!--1ST CARD---------------->
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card">
        <img class="card-img-top"src="/images/city.jpg" alt="City cars" style="height:180px;">
        <div class="card-body">
          <h4 class="card-title">City</h4>
          <p class="card-text">Move around the city with no hassle</p>
          <a href="#" class="btn btn-primary">View Category</a>
        </div>
      </div>
    </div>
    <!--2ND CARD---------------->
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card">
        <img class="card-img-top" src="/images/long-range.jpg" alt="Long-range cars" style="height:180px;">
        <div class="card-body">
          <h4 class="card-title">Long-range</h4>
          <p class="card-text">Ideal for travel and business</p>
          <a href="#" class="btn btn-primary">View Category</a>
        </div>
      </div>
    </div>
    <!--3RD CARD---------------->
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card">
        <img class="card-img-top" src="/images/flex.jpg" alt="Luxury cars" style="height:180px;">
        <div class="card-body">
          <h4 class="card-title">Lux</h4>
          <p class="card-text">Flex all you want</p>
          <a href="#" class="btn btn-primary">View Category</a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>
<?php

?>

</html>
    require '../App/Views/common/head.php';
    require '../App/Views/common/navigation.php';
    use App\Authentication;

?>

<h1>HOME PAGE</h1>

<?php
    if(Authentication::isLoggedIn()):
?>
User with email <?php echo $_SESSION['user_email']; ?> is logged in. <a href="/logout">Log out</a>.

<?php else: ?>
<a href="/signup">Sign up</a> or <a href="/login">Log in</a>.

<?php endif; ?>
