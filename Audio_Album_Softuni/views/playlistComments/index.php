<div class="jumbotron">
    <h1 class="text-center">Playlists Comments</h1>
    <p>
    <div class="container">
        <table class="table table-hover">
            <tr>
                <th>ID </th>
                <th>Text</th>
                <th>Playlist</th>
                <th></th>
            </tr>

            <?php foreach( $this->playlistscomments as $comment): ?>
                <tr>
                    <td><?php echo $comment['id']; ?></td>
                    <td><?php echo $comment['text']; ?></td>
                    <td><?php echo $comment['playlist_id']; ?></td>
                    <td><a href="/Audio_Album_Softuni/playlistComments/delete/<?= $comment['id'] ?>">[Delete]</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div class="text-center">
            <a href="/Audio_Album_Softuni/playlistComments/create" class="btn btn-success ">Comment Playlist</a>
        </div>
    </div>
    </p>
</div>