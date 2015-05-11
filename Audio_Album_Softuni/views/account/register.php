<!--<h1>Register</h1>-->
<!--<form action="/Audio_Album_Softuni/account/register" method="post">-->
<!--    <label for="username">Username: </label>-->
<!--    <input id="username" type="text" name="username"/>-->
<!--    <br/>-->
<!--    <label for="password">Password: </label>-->
<!--    <input id="password" type="password" name="password"/>-->
<!--    <br/>-->
<!--    <input type="submit" value="Register"/>-->
<!--    <a href="/Audio_Album_Softuni/account/login">Login</a>-->
<!--</form>-->

<form action="/Audio_Album_Softuni/account/register" class="form-horizontal" method="POST">
    <legend>Register</legend>
    <div class="form-group">
        <label for="inputUsername" class="col-lg-2 control-label">Username</label>
        <div class="col-lg-4">
            <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword" class="col-lg-2 control-label">Password</label>
        <div class="col-lg-4">
            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-lg-2 control-label">Email</label>
        <div class="col-lg-4">
            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <button type="reset" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-success">Register</button>
            <a href="/Audio_Album_Softuni/account/login" class="btn btn-primary">Login</a>
        </div>
    </div>
</form>

