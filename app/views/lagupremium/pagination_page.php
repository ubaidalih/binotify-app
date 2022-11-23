<section>
    <h2>Song</h2>
    <?php if ($data["list_of_song"] == false) :?>
        <div class="no-result">
            <h3>No song found</h3>
        </div>
    <?php else:?>
        <?php for( $index = 0; $index < count($data['list_of_song']); $index++) : ?>
            <div class="music-card">
                <div class="info">
                    <h4> <?php echo $index + 1;?> </h4>
                    <div class="detail">
                        <h4> <?php $data["name"]?></h4>
                        <h4 class="artist-name"> <?php echo $data["list_of_song"][$index]->judul ?></h4>
                    </div>
                    <div class="detail-other">
                        <audio controls>
                            <!-- <source src="http://localhost:3000/binotify-rest-service/public/audio/TULUS - Sewindu (Official Music Video)_wpst_4m_c-E.mp3" type="audio/mpeg" > -->
                            <source src= <?php echo $data["list_of_song"]->audio_path; ?> type="audio/mpeg" >
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
        <div class="pag-section">
        <?php for($i=1;$i<=$data['pageTotal'];$i++):?>
            <button name="subject" type="submit" id="page" onclick="goToSongPage(<?=$i?>)"><?= $i?></button>
        <?php endfor;?>
        </div>
    <?php endif;?>
</section>