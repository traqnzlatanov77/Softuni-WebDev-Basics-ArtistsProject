<form action="/Audio_Album_Softuni/songComments/create" class="form-horizontal" method="POST">
    <legend>Create Comment</legend>
    <div class="form-group">
        <label for="songCommentText" class="col-lg-2 control-label">Text</label>
        <div class="col-lg-4">
            <input type="text" class="form-control" id="songCommentText" placeholder="Text" name="songCommentText">
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-4 col-lg-offset-2">
            <select name="song_id" class="form-control">
                <OPTION VALUE=0>Choose
                    <?php
                    while($row = mysqli_fetch_array($this->songs_id))
                    {
                        $id=$row["id"];
                        echo "<option VALUE=\"$id\">".$id.'</option>';
                    }
                    ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <button type="reset" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>