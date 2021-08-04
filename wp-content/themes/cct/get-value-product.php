<?php $mk = get_option( 'posts_per_page' );
$args = array( 'post_type' => 'product', 'posts_per_page' => -1 );
$products = new WP_Query( $args );
$total_product= $products->found_posts;
$product_categories = get_terms( 'product_cat' );
?>

<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>-->
<script>
    $(document).ready(function(){
        var obj_item = {};
        obj_item['all'] = parseInt(<?php echo json_encode($total_product) ?>);
        <?php
        foreach( $product_categories as $cat )  {
        ?>
        obj_item[<?php  echo json_encode($cat->slug) ?>] = <?php echo json_encode($cat->count)?>;
        <?php
        }
        ?>

        $('.load-more-pc').click(function(event) {
            var product_cat = $('#page button.active').attr('type_product').toString();
            var offset = show_item = $('.list-new').children().length;
            $.ajax({ // Hàm ajax
                type : "post", //Phương thức truyền post hoặc get
                dataType : "html", //Dạng dữ liệu trả về xml, json, script, or html
                async: false,
                url : '<?php echo admin_url('admin-ajax.php');?>', // Nơi xử lý dữ liệu
                data : {
                    action: "loadmore", //Tên action, dữ liệu gởi lên cho server
                    offset: offset, // gởi số lượng bài viết đã hiển thị cho server
                    product_cat: product_cat,
                },
                beforeSend: function(){
                    // Có thể thực hiện công việc load hình ảnh quay quay trước khi đổ dữ liệu ra
                },
                success: function(response) {
                    $('.list-new').append(response);
                    var show_item = $('.list-new').children().length;
                    product_cat = product_cat.toLowerCase();
                    if(show_item >= obj_item[product_cat]){
                        $('.load-more-pc').css('display','none');
                    }
                },
                error: function( jqXHR, textStatus, errorThrown ){
                    //Làm gì đó khi có lỗi xảy ra
                    console.log( 'The following error occured: ' + textStatus, errorThrown );
                }
            });
        });

        $('.filter_list').click(function(event) {
            var offset = parseInt(<?php echo json_encode($mk) ?>) // reset offset
            $('.load-more-pc').css('display','block');
            $('#page button').removeClass('active');
            $(this).addClass('active');
            var product_cat = $(this).attr('type_product').toString();
            $.ajax({ // Hàm ajax
                type : "post", //Phương thức truyền post hoặc get
                dataType : "html", //Dạng dữ liệu trả về xml, json, script, or html
                async: false,
                url : '<?php echo admin_url('admin-ajax.php');?>', // Nơi xử lý dữ liệu
                data : {
                    action: "loaditem", //Tên action, dữ liệu gởi lên cho server
                    offset: offset, // gởi số lượng bài viết đã hiển thị cho server
                    product_cat: product_cat, // gởi số lượng bài viết đã hiển thị cho server
                },
                beforeSend: function(){
                    // Có thể thực hiện công việc load hình ảnh quay quay trước khi đổ dữ liệu ra
                },
                success: function(response) {
                    $('.list-new').html('');
                    $('.list-new').html(response);
                    var show_item = $('.list-new').children().length;
                    product_cat = product_cat.toLowerCase();
                    if(show_item >= obj_item[product_cat]){
                        $('.load-more-pc').css('display','none');
                    }
                },
                error: function( jqXHR, textStatus, errorThrown ){
                    //Làm gì đó khi có lỗi xảy ra
                    console.log( 'The following error occured: ' + textStatus, errorThrown );
                }
            });
        });
    });
</script>