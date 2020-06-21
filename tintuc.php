<?php
require_once "autoload/autoload.php";
$db = new Database();
if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 1;
}
$sql = "SELECT * FROM news ORDER BY ID DESC";
$total = count($db->fetchsql($sql));
$news1 = $db->fetchJones("news", $sql, $total, $p, 5, true);

$total_page = $news1['page'];
unset($news1['page']);
?>

<?php include "layouts/head.php" ?>
<title>Miss Shop | Tin tức</title>
<body>
    <div class="wrapper">
        <?php include "layouts/header.php" ?>
        <!--end header-menu-fluid-->

        <div class="container">
            <div class="main">

                <div class="main-container">
                    <div class="row">
                        <?php include "layouts/sidebar.php" ?>

                        <div class="col-md-9 col-sm-9">
                            <div class="main-right">
                                <div class="shop-homepage" style="padding: 10px">
                                    <div class="filter-title-product" style="width: 100%">
                                          <a href="#"><b>TIN TỨC</b></a>
                                    </div>
                                   
                                    <?php foreach ($news1 as $item1): ?>
                                    
                                        <h3 style="font-weight: 700;"><?php echo $item1['title']?></h3>
                                        <div class="media">
                                            <div class="col-md-4">
                                                <div class="media-left">
                                                    <a href="chitiettintuc.php?id=<?php echo $item1['id'] ?>"><img  src="<?php base_url() ?>public/uploads/news/<?php echo $item1['image']; ?>" class="media-object img-responsive" style="width:100%; height: 150px"></a>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <a href="chitiettintuc.php?id=<?php echo $item1['id'] ?>"><h4 class="media-heading"><?php echo $item1['title']; ?></h4></a>
                                                <p style="color: #504E4E"><?= limit_text($item1['content'], 110) ?>...</p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <?php if ($total > 5): ?>
                                    <div style="text-align: center">
                                        <nav aria-label="...">
                                            <ul class="pagination">
                                                <?php if (isset($_GET['p'])) $prev = $_GET['p'] - 1; ?>
                                                <li class="page-item prev <?php if ($_GET['p'] == 1) echo "disabled" ?>   ">
                                                    <a class="page-link" <?php if (isset($_GET['p']) && $_GET['p'] > 1) echo "href='?p=$prev'" ?>>Previous</a>
                                                </li>
                                                <?php for ($i = 1; $i <= $total_page; $i++): ?>
                                                    <?php
                                                    if (isset($_GET['p']) && $_GET['p'] == $i) {
                                                        $active = "active";
                                                    } else {
                                                        $active = "";
                                                    }
                                                    ?>
                                                    <li class="page-item <?php echo $active ?>"><a class="page-link" href="?p=<?= $i ?>"><?= $i ?></a></li>
                                                <?php endfor ?>
                                                <li class="page-item  <?php if ($_GET['p'] == $total_page) echo "disabled" ?> ">
                                                    <?php if (isset($_GET['p'])) $next = $_GET['p'] + 1; ?>
                                                    <a class="page-link" <?php if (isset($_GET['p']) && $_GET['p'] < $total_page) echo "href='?p=$next'" ?>>Next</a>

                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!--end main-container-->
                </div>
                <!--end main-->
            </div>
            <!--end container-->
        </div>


        <script src="<?php base_url() ?>public/frontend/js/jquery.min.js"></script>
        <?php
        if (!isset($_GET['p'])) {
            echo '<script>
                $(".prev").addClass("disabled");
        $(".pagination li:nth-child(2)").addClass("active");
    </script>';
        }
        ?>
        <?php include "layouts/footer.php" ?>