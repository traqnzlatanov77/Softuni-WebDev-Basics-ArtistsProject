<div class="jumbotron">
    <h1 class="text-center">Songs Comments</h1>
    <p>
    <div class="container">
        <table class="table table-hover">
            <tr>
                <th>ID </th>
                <th>Text</th>
                <th>Playlist</th>
                <th></th>
            </tr>

            <?php foreach( $this->songcomments as $comment): ?>
                <tr>
                    <td><?php echo $comment['id']; ?></td>
                    <td><?php echo $comment['text']; ?></td>
                    <td><?php echo $comment['song_id']; ?></td>
                    <td><a href="/Audio_Album_Softuni/songComments/delete/<?= $comment['id'] ?>">[Delete]</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div class="text-center">
            <a href="/Audio_Album_Softuni/songComments/create" class="btn btn-success ">Comment Song</a>
        </div>
    </div>
    </p>
</div>