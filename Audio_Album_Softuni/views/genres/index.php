<div class="jumbotron">
    <h1 class="text-center">Genres</h1>
    <p>
    <div class="container">
        <table class="table table-hover">
            <tr>
                <th>ID </th>
                <th>Name</th>
<!--                <th>Action</th>-->
            </tr>

            <?php foreach( $this->genres as $genre ): ?>
                <tr>
                    <td><?php echo $genre['id']; ?></td>
                    <td><?php echo $genre['name']; ?></td>
<!--                    <td><a href="/Audio_Album_Softuni/genres/delete/--><?//= $genre['id'] ?><!--">[Delete]</a></td>-->
                </tr>
            <?php endforeach; ?>
        </table>
<!--        <a href="/Audio_Album_Softuni/genres/create" class="btn btn-primary">Create Playlist</a>-->
    </div>
    </p>
</div>