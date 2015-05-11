<div class="jumbotron">
    <h1 class="text-center">Playlists</h1>
    <p>
    <div class="container">
        <table class="table table-hover">
            <tr>
                <th>ID </th>
                <th>Name</th>
                <th></th>
                <th>Action</th>
            </tr>

            <?php foreach( $this->playlists as $playlist): ?>
                <tr>
                    <td><?php echo $playlist['id']; ?></td>
                    <td><?php echo $playlist['name']; ?></td>
                    <td></td>
                    <td><a href="/Audio_Album_Softuni/playlists/delete/<?= $playlist['id'] ?>">[Delete]</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="/Audio_Album_Softuni/playlists/create" class="btn btn-primary">Create Playlist</a>
        <a href="/Audio_Album_Softuni/playlistComments/" class="btn btn-info">View Comments</a>
    </div>
    </p>
</div>