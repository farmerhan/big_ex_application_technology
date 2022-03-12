<?php

$db = mysqli_connect("localhost", "root", "", "shopdothethao");

// items function Starts ///

function items()
{
    global $db;

    $get_cus = "select ma_kh from khach_hang where email='{$_SESSION['customer_email']}'";

    $result_get_cus = mysqli_query($db, $get_cus);

    $cus_id = mysqli_fetch_array($result_get_cus)['ma_kh'];

    $get_items = "select * from gio_hang where ma_khach_hang='$cus_id'";

    $run_items = mysqli_query($db, $get_items);

    $count_items = mysqli_num_rows($run_items);

    echo $count_items;
}

// items function Ends ///

// total_price function Starts //

function total_price()
{

    global $db;

    $ip_add = getRealUserIp();

    $total = 0;

    $select_cart = "select * from cart where ip_add='$ip_add'";

    $run_cart = mysqli_query($db, $select_cart);

    while ($record = mysqli_fetch_array($run_cart)) {

        $pro_id = $record['p_id'];

        $pro_qty = $record['qty'];

        $sub_total = $record['p_price'] * $pro_qty;

        $total += $sub_total;
    }

    echo "$" . $total;
}

// total_price function Ends //

function getProForSearch() {
    $query = "select * from do_the_thao order by 1 DESC LIMIT 0,8";

    if(isset($_POST['input_price']) || isset($_POST['input_name'])) {
        $name = '';
        $amount = '';
        if(isset($_POST['input_name'])) {
            $name = $_POST['input_name'];
        }
        if(isset($_POST['input_price'])) {
            $amount = $_POST['input_price'];
        }
        
        if($name != ''  && $amount != '') {
            $query = "SELECT * FROM do_the_thao WHERE gia_sp < $amount AND ten_sp like '%$name%'";
        } else if($name != '') {
            $query = "SELECT * FROM do_the_thao WHERE ten_sp like '%$name%'";
        } else if($amount > 0) {
            $query = "SELECT * FROM do_the_thao WHERE gia_sp < $amount";
        }
    }
    return $query;
}

// getPro function Starts //

function getPro()
{

    global $db;

    $get_products = getProForSearch();

    $run_products = mysqli_query($db, $get_products);

    if (mysqli_num_rows($run_products) > 0) {

        while ($row_products = mysqli_fetch_array($run_products)) {

            $pro_id = $row_products['ma_sp'];

            $pro_name = $row_products['ten_sp'];

            $pro_price = $row_products['gia_sp'];

            $pro_img = $row_products['anh_chup'];

            $pro_url = $row_products['url_san_pham'];
                echo "
                
                <div class='col-md-4 col-sm-6 center-responsive' >
                
                    <div class='product' >
                    
                        <a href='$pro_url' >
                        
                            <img src='admin/product_images/$pro_img' class='img-responsive' >
                        
                        </a>
                        
                        <div class='text' >
                        
                            <hr>
                            
                            <h3><a href='$pro_url' >$pro_name</a></h3>
                            
                            <p class='price' > $$pro_price </p>
                            
                            <p class='buttons' >
                            
                                <a href='$pro_url' class='btn btn-default' >View details</a>
                                
                                <a href='$pro_url' class='btn btn-danger'>
                                
                                <i class='fa fa-shopping-cart' data-price=$pro_price></i> Add To Cart
                                
                                </a>
                        
                            </p>

                        </div>
                    </div>
                </div>";
        }
    } else {
        echo "<center><b style='font-size: 20px'>No found items when you have searched</b><center>";
    }
}

// getPro function Ends //