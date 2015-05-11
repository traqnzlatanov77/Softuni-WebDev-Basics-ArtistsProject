<!--<h1>Login</h1>-->
<!--<form action="/Audio_Album_Softuni/account/login" method="post">-->
<!--    <label for="username">Username: </label>-->
<!--    <input id="username" type="text" name="username"/>-->
<!--    <br/>-->
<!--    <label for="password">Password: </label>-->
<!--    <input id="password" type="password" name="password"/>-->
<!--    <br/>-->
<!--    <input type="submit" value="Login"/>-->
<!--    <a href="/Audio_Album_Softuni/account/register">Go register</a>-->
<!--</form>-->

<form action="/Audio_Album_Softuni/account/login" class="form-horizontal" method="POST">
    <legend>Login</legend>
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
        <div class="col-lg-10 col-lg-offset-2">
            <button type="reset" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="/Audio_Album_Softuni/account/register" class="btn btn-success">Register</a>
        </div>
    </div>
</form>


