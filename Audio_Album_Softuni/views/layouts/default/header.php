<DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="content/styles.css"/>
        <link rel="stylesheet" href="../content/styles.css"/>
        <link rel="stylesheet" href="content/bootstrap-3.3.4-dist/css/bootstrap.css"/>
        <link rel="stylesheet" href="../content/bootstrap-3.3.4-dist/css/bootstrap.css"/>


        <script src="content/jQuery/jquery-2.1.3.min.js"></script>
        <script src="content/bootstrap-3.3.4-dist/js/bootstrap.js"></script>
        <title>
            <?php if ( isset($this->title)) echo htmlspecialchars($this->title) ?>
        </title>
    </head>
    <body>
        <header>
<!--            <a href="/Audio_Album_Softuni"><img src="/Audio_Album_Softuni/content/images/logo.png" alt=""/></a>-->
<!--            <ul>-->
<!--                <li>-->
<!--                    <a href="/Audio_Album_Softuni">Home</a>-->
<!--                    --><?php //if( $this->isLoggedIn) : ?>
<!--                    <a href="/Audio_Album_Softuni/playlists">Playlists</a>-->
<!--                    <a href="/Audio_Album_Softuni/genres">Genres</a>-->
<!--                    <a href="/Audio_Album_Softuni/songs">Songs</a>-->
<!--                    --><?php //endif ?>
<!--                </li>-->
<!--            </ul>-->
<!--            --><?php //if($this->isLoggedIn) : ?>
<!--            <div id="logged-in-info">-->
<!--                <span>Hello, --><?php //echo($_SESSION['username']) ?><!--</span>-->
<!---->
<!--                <form action="/Audio_Album_Softuni/account/logout">-->
<!--                    <input type="submit" value="Logout"/>-->
<!--                </form>-->
<!--            </div>-->
<!--            --><?php //endif; ?>
        </header>

        <div class="bs-component">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/Audio_Album_Softuni">Home</a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <?php if( $this->isLoggedIn ) : ?>
                                <li><a href="/Audio_Album_Softuni/playlists">Playlists</a></li>
                                <li><a href="/Audio_Album_Softuni/genres">Genres</a></li>
                                <li><a href="/Audio_Album_Softuni/songs">Songs</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Itmes<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/Audio_Album_Softuni/playlists">Playlists</a></li>
                                    <li><a href="/Audio_Album_Softuni/genres">Genres</a></li>
                                    <li><a href="/Audio_Album_Softuni/songs">Songs</a></li>
                                    <li class="divider"></li>
                                </ul>
                            </li>
                            <?php endif ?>
                        </ul>
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <?php
                            if( !empty( $this->isLoggedIn )) {
                                echo "<li><a class='navbar-brand'>Hello, {$_SESSION['username']}</a></li>
                                          <li class='active'><a href='/Audio_Album_Softuni/account/logout'>Logout <span class='sr-only'>(current)</span></a></li>";
                            }
                            else {
                                echo "<li class='active'><a href='/Audio_Album_Softuni/account/login'>Login <span class='sr-only'>(current)</span></a></li>";
                                echo "<li class='active'><a href='/Audio_Album_Softuni/account/register'>Register <span class='sr-only'>(current)</span></a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div>
        </div>

        <?php include('messages.php'); ?>