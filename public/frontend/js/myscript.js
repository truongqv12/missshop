// $(document).ready(function () {
//     $('.update-cart').click(function (e) {
//         event.preventDefault();
//         var qty = $(this).parents("tr").find('.qty').val();
//         var key = $(this).attr('data-key');
//         $.ajax({
//             url : 'update-cart.php',
//             type: 'GET',
//             data : {'qty':qty, 'key':key},
//             success:function (data) {
//                 if (data == 1) {
//                     alert('Cập nhật giỏ hàng thành công');
//                     location.href="gio-hang.php";
//                 } if (data == 0) {
//                     alert('Số lượng lớn hơn số lượng sản phẩm hiện có');
//                     location.href="gio-hang.php";
//                 }
//             }
//         });
//     });
// });

