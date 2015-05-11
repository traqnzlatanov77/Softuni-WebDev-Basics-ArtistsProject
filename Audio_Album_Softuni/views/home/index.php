<h2 class="text-center">Welcome to Traqn's audio album system</h2>
<?php if(!($this->isLoggedIn)) { ?>
    <div class="jumbotron text-center">
        <a href="/Audio_Album_Softuni/account/login" class="btn btn-primary">Login</a>
        <a href="/Audio_Album_Softuni/account/register" class="btn btn-primary">Register</a>
    </div>
<?php } else {?>
    <div class="jumbotron">
        <h3 class="text-center">Hello, <?php echo $_SESSION['username'] ?></h3>
    </div>
<?php  } ?>