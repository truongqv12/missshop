
<?php
    require_once "autoload/autoload.php";
    $db = new Database();
    $sql = "SELECT * FROM slides ORDER BY id DESC LIMIT 5";
    $slides = $db->fetchsql($sql);
   
?>

<div class="slide">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <?php
            $count_slide = $db->countTable('slides');

        ?>
        <ol class="carousel-indicators">
            <?php for ($i = 0; $i < $count_slide; $i++): ?>
            <li data-target="#myCarousel" data-slide-to="<?= $i ?>" class="<?php if ($i == 0) echo 'active'; ?>"></li>
          <?php endfor; ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php $i = 0;  foreach ($slides as $item ): ?>
            <div class="item <?php if ($i ==0 ) echo 'active';?>">
                <img src="<?php base_url() ?>public/uploads/slides/<?php echo $item['image'] ?>" alt="Chania" class="img-responsive">
            </div>
            <?php $i++; endforeach; ?>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="prev-slide"> &#10094 </span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="next-slide"> &#10095 </span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>