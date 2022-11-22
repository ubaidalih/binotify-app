<section>
    <h2>Penyanyi</h2>
    <?php if ($data == false) :?>
        <div class="no-result">
            <h3>No singer found</h3>
        </div>
    <?php else:?>
        <?php for($index = 0; $index < count($data['data']); $index++) : ?>
            <div class="music-card">
                <div class="info">
                    <h4> <?php echo $index + 1;?> </h4>
                    <div class="detail">
                        <h4 class="artist-name"> <?php echo $data['data'][$index]->name ?></h4>
                    </div>
                    <?php if ($data['data'][$index]->subscribed == false) :?>
                        <button name="subject" type="submit" id="penyanyi" onclick=""><?= "Subscribe" ?></button>
                    <?php else:?>
                        <button name="subject" type="submit" id="penyanyi" onclick="location.href='http://localhost/binotify-app/public/lagupremium/index/<?php echo $data['data'][$index]->user_id ?>/'"><?= "View" ?></button>
                    <?php endif;?> 
                </div>
            </div>
        <?php endfor; ?>
        <div class="pag-section">
        <?php for($i=1;$i<=$data['pageTotal'];$i++):?>
            <button name="subject" type="submit" id="page" onclick="goToPenyanyiPage(<?=$i?>)"><?= $i?></button>
        <?php endfor;?>
        </div>
    <?php endif;?>
</section>