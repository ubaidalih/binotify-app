<?php 
    require_once __DIR__."../../../models/User.php";

    $user = new User();
    $subscriber_id = $user->get_user_id($_COOKIE['username'])
?>
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
                        <button name="subject" type="submit" id="penyanyi" onclick='addSubscription(<?= $data['data'][$index]->user_id ?>,<?=  $subscriber_id ?>)'> <?= "Subscribe" ?> </button>
                    <?php elseif($data['data'][$index]->subscribed == "PENDING") :?>
                        <h4><?php echo "PENDING";?></h4>
                    <?php elseif($data['data'][$index]->subscribed == "REJECTED") :?>
                        <h4><?php echo "REJECTED";?></h4>
                        <button name="subject" type="submit" id="penyanyi" onclick='addSubscription(<?= $data['data'][$index]->user_id ?>,<?=  $subscriber_id ?>)'> <?= "Subscribe" ?> </button>
                    <?php else :?>
                        <button name="subject" type="submit" id="penyanyi" onclick='location.href="http://localhost/binotify-app/public/lagupremium/index/<?php echo $data['data'][$index]->user_id ?>/"'><?= "View" ?></button>
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