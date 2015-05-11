<div class="jumbotron">
    <h1 class="text-center">Songs</h1>
    <p>
    <div class="container">
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Ranking</th>
                <th></th>
                <th>Name</th>
                <th>Artist</th>
                <th>Duration</th>
                <th>GenreID</th>
                <th>Listen Online</th>
                <th>Download</th>
                <th>Action</th>
                <!--                <th>Action</th>-->
            </tr>

            <?php foreach( $this->songs as $song ): ?>
                <tr>
                    <td><?= $song['id'] ?></td>
                    <td>
                        <div id="rank-arrows">
                            <a href="/Audio_Album_Softuni/songs/upRank/<?= $song['id'] ?>" class="glyphicon glyphicon-chevron-up"></a>
                            <a href="/Audio_Album_Softuni/songs/downRank/<?= $song['id'] ?>" class="glyphicon glyphicon-chevron-down"></a>
                        </div>
                    </td>
                    <td><?= htmlspecialchars($song['Rank']) ?></td>
                    <td><?= htmlspecialchars($song['song_name']) ?></td>
                    <td><?= htmlspecialchars($song['artist']) ?></td>
                    <td><?= htmlspecialchars($song['duration']) ?></td>
                    <td><?= htmlspecialchars($song['genres_id']) ?></td>
                    <td>
                        <audio controls="controls" preload="auto">
                            <source src="1431196184_Khia%20-%20My%20neck,%20my%20back.wav" type="audio/mpeg"/>
                        </audio>
                    </td>
                    <td><a href="/Audio_Album_Softuni/songs/download/<?= $song['id'] ?>">DOWNLOAD</a></td>
                    <td><a href="/Audio_Album_Softuni/songs/delete/<?= $song['id'] ?>">[Delete]</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="/Audio_Album_Softuni/songs/create" class="btn btn-primary">Upload Song</a>
        <a href="/Audio_Album_Softuni/songComments/" class="btn btn-info">View Comments</a>
        <!--        <a href="/Audio_Album_Softuni/genres/create" class="btn btn-primary">Create Playlist</a>-->
    </div>
    </p>
</div>