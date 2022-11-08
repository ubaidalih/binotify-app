<section>
    <h2>Songs</h2>
    <div class="sort-filter-container">
        <button class="sort-button" onclick="sortTitle()" > Sort by title</button> 
        <button class="sort-button" onclick="sortDate()"> Sort by Date</button>
        <div class="dropdown">
            <button class="dropbtn">Filter by Genre</button>
                <div class="dropdown-content">
                    <?php for($i=0;$i<count($data['genre']);$i++):?>
                        <button class="genre-button" id="genre" value="<?=$data['genre'][$i][0]?>" onclick="filterGenre(this.value)"> <?php echo $data['genre'][$i][0];?> </button>
                    <?php endfor; ?>
                </div>
        </div>
    </div>
    <?php if ($data['music'] == false) :?>
        <div class="no-result">
            <h3>No song found</h3>
        </div>
    <?php else:?>
        <?php foreach($data['music']['data'] as $index => $song) : ?>
        <div class="music-card">
            <a href="/tugas-besar-1/public/detaillagu/user/<?php echo $song[0] ?>">
                <div class="info">
                    <h4> <?php echo $index + 1;?> </h4>
                    <img src = "<?php echo $song[4];?>"/>
                    <div class="detail">
                        <h4> <?php echo $song[0]?></h4>
                        <h4 class="artist-name"> <?php echo $song[2]?></h4>
                    </div>
                    <div class="detail-other"><h4><?php echo $song[1]?></h4></div>
                    <div class="detail-other"><h4><?php echo $song[3]?></h4></div>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
        <div class="pag-section">
        <?php for($i=1;$i<=$data['music']['pageTotal'];$i++):?>
            <button name="subject" type="submit" id="page" onclick="goToPage(<?=$i?>)"><?= $i?></button>
        <?php endfor;?>
        </div>
    <?php endif;?>
</section>