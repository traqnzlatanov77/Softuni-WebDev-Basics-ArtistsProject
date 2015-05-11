<h2 class="text-center"><?= htmlspecialchars($this->title) ?></h2>

<!--<form method="post" action="/Audio_Album_Softuni/playlists/create" >-->
<!--    Name: <input type="text" name="playlist_name"/>-->
<!--    <br/>-->
<!--    <input type="submit" value="create new playlist"/>-->
<!--</form>-->

<form action="/Audio_Album_Softuni/playlists/create" class="form-horizontal" method="POST">
    <legend>Create Playlist</legend>
    <div class="form-group">
        <label for="playlistName" class="col-lg-2 control-label">Name</label>
        <div class="col-lg-4">
            <input type="text" class="form-control" id="playlistName" placeholder="Name" name="playlist_name">
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <button type="reset" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>
