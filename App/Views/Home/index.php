<?php
    require '../App/Views/common/head.php';
    require '../App/Views/common/navigation.php';
?>

<h1>HOME PAGE</h1>

<?php
    if(isset($_SESSION['user_id'])):
?>
User with ID <?php echo $_SESSION['user_id']; ?> is logged in.

<?php else: ?>
<a href="/signup">Sign up</a> or <a href="/login">Log in</a>.

<?php endif; ?>
