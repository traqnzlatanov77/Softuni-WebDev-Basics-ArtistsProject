<form action="/Audio_Album_Softuni/songs/create" class="form-horizontal" method="POST" enctype="multipart/form-data">
    <legend>Create Song</legend>
    <div class="form-group">
        <label for="song" class="col-lg-2 control-label">Artist</label>
        <div class="col-lg-4">
            <input type="text" class="form-control" id="song" placeholder="Artist" name="artist_name">
        </div>
    </div>
    <div class="form-group">
        <label for="songName" class="col-lg-2 control-label">Name</label>
        <div class="col-lg-4">
            <input type="text" class="form-control" id="songName" placeholder="Name" name="song_name">
        </div>
    </div>
    <div class="form-group">
        <label for="songDuration" class="col-lg-2 control-label">Duration</label>
        <div class="col-lg-4">
            <input type="text" class="form-control" id="songDuration" placeholder="Duration" name="song_duration">
        </div>
    </div>
    <div class="form-group">
        <label for="genre" class="col-lg-2 control-label">Genre</label>
        <div class="col-lg-4 ">

            <select name="genres_id" id="genre" class="form-control">
                <OPTION VALUE=0>Choose
                    <?php
                    while($row = mysqli_fetch_array($this->genres_id))
                    {
                        $id=$row["id"];
                        echo "<option VALUE=\"$id\">".$id.'</option>';
                    }
                    ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-8">
            <div class="col-lg-offset-4">
                <input class="btn btn-primary" type="file" name="input_file"/>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <button type="reset" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>