<?php
$open = "order";
require "../../autoload/autoload.php";

require "../../layouts/head.php";
?>

<?php
$db = new Database();
if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 1;
}


$sql = "SELECT orders.id, orders.customer_id, orders.total, orders.status, orders.phone, orders.address, customers.name, customers.email
                FROM orders
                INNER JOIN  customers ON orders.customer_id = customers.id";
$total = $db->countTable("orders");

$data = $db->fetchJones("orders", $sql, $total, $p, 10, true);

$total_page = $data['page'];
unset($data['page']);

$path = $_SERVER['SCRIPT_NAME'];
?>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <?php require "../../layouts/header.php" ?>
        <!-- =============================================== -->
        <!-- Left side column. contains the sidebar -->
        <?php require "../../layouts/sidebar.php" ?>
        <!-- =============================================== -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Đơn hàng
                    <small>danh sách</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Đơn hàng</a></li>
                    <li class="active">Danh sách</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="box">

                    <div class="box-body">
                        <?php require_once '../../../partials/notification.php'; ?>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                $stt = 1;
                                foreach ($data as $item):
                                    ?>
                                    <tr>

                                        <td><?= $stt ?></td>
                                <input class="address" type="hidden" value="<?= $item['address'] ?>"> </input>
                                <td class="name"><?= $item["name"] ?></td>
                                <td><?= $item["email"] ?></td>
                                <td><?= $item["phone"] ?></td>
                                <td><?= number_format($item['total'], 0, ",", "."); ?> đ</td>

                                <td>

                                    <a href="status.php?id=<?= $item['id'] ?>" class="<?php echo $item['status'] == 0 ? "btn-xs btn-danger" : "btn-xs btn-info"; ?>">
                                        <?php echo $item['status'] == 0 ? "chưa xử lý" : "đã xử lý"; ?>
                                    </a>
                                </td>

                                <td>
                                    <a href="#" class="glyphicon glyphicon-eye-open view_order  btn btn-xs btn-primary"
                                       id_order="<?= $item['id'] ?>"  data-toggle="modal" href="#">Xem</a> |

                                    <a onclick="return confirm('Bạn có chắn chắn muốn xóa đơn hàng')" href="delete.php?id=<?= $item['id'] ?> "class="btn btn-xs btn-danger"><i class="fa fa-times"></i> Xóa</a>
                                </td>
                                </tr>
                                <?php
                                $stt++;
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            <nav aria-label="...">
                                <ul class="pagination">
                                    <?php if (isset($_GET['p'])) $prev = $_GET['p'] - 1; ?>
                                    <li class="page-item <?php if ($_GET['p'] == 1) echo "disabled" ?>   ">
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
                        <div class="frame-modal"></div>
                    </div>
                </div>

                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <?php
        if (!isset($_GET['p'])) {
            echo '<script>
        $(".pagination li:nth-child(2)").addClass("active");
    </script>';
        }
        ?>
        <!-- /.content-wrapper -->
        <?php require "../../layouts/footer.php" ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".view_order").click(function () {

                    var id = $(this).attr("id_order");
                    var name = $(this).parents("td").prev().prev().prev().prev().prev().text();
                    var phone = $(this).parents("td").prev().prev().prev().text();
                    var price = $(this).parents("td").prev().prev().text();
                    var address = $(this).parents("tr").find(".address").val();
                    $.ajax({
                        url: "view.php",
                        type: "post",
                        dataType: "html",
                        data: {
                            id: id,
                            name: name,
                            phone: phone,
                            price: price,
                            address: address

                        },
                        success: function (data) {
                            $('.frame-modal').html(data);
                            $('#modal-view-order').modal();
//                            $('#modal-view-order').modal('show');

                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }

                    });

                });

            });
        </script>
