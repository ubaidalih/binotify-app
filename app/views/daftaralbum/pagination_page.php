<section>
    <h2>Albums</h2>
    <?php if ($data == false) :?>
        <div class="no-result">
            <h3>No album found</h3>
        </div>
    <?php else:?>
        <?php foreach($data['data'] as $index => $album) : ?>
            <?php if($_COOKIE['role']==1):?>
                <a href="/tugas-besar-1/public/detailalbum/admin/<?php echo $album[0] ?>">
            <?php else:?>
                <a href="/tugas-besar-1/public/detailalbum/user/<?php echo $album[0] ?>">
            <?php endif;?>
                <div class="music-card">
                    <div class="info">
                        <h4> <?php echo $index + 1;?> </h4>
                        <img src = "<?php echo $album[3];?>"/>
                        <div class="detail">
                            <h4> <?php echo $album[0]?></h4>
                            <h4 class="artist-name"> <?php echo $album[1]?></h4>
                        </div>
                        <div class="detail-other"><h4><?php echo $album[2]?></h4></div>
                        <div class="detail-other"><h4><?php echo $album[4]?></h4></div>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
        <div class="pag-section">
        <?php for($i=1;$i<=$data['pageTotal'];$i++):?>
            <button name="subject" type="submit" id="page" onclick="goToAlbumPage(<?=$i?>)"><?= $i?></button>
        <?php endfor;?>
        </div>
    <?php endif;?>
</section>