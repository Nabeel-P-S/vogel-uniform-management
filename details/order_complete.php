<?php
include("../connect.php");
$sql="SELECT orders.order_id,orders.reference_no, orders.order_date,orders.store_delivery_date,orders.main_delivery_date, orders.order_quantity,orders.order_total_cost,orders.order_item_cost,orders.order_fabric_cost,orders.order_addon_cost,orders.order_factory_item_cost,orders.order_factory_fabric_cost,orders.order_factory_addon_cost,orders.order_factory_total_cost,orders.agent_advance,orders.factory_advance,orders.factory_advance,orders.factory_balance,orders.agent_balance,orders.factory_balance,orders.production_status,orders.fabric_status,orders.stitch_status,orders.pack_status,orders.store_status,orders.dispatch_status,orders.delivery_status,orders.payment_status,customers.customer_id, customers.customer_name, customers.customer_address, customers.customer_place,customers.customer_image, customers.customer_pincode, customers.customer_district, customers.customer_state, customers.customer_country, customers.customer_email, customers.customer_mobile1, customers.customer_mobile2,customers.shop_name,customers.customer_adhar,customers.customer_license,vendors.factory_name,vendors.vendor_name,vendors.vendor_id, vendors.vendor_address,vendors.vendor_place,vendors.vendor_district,vendors.vendor_pincode,vendors.vendor_email,vendors.vendor_mobile1,colors.color,colors.color_id, vendors.vendor_mobile2,items.item_id,items.item_name,items.item_no,items.item_image,item_categories.category,orders.status,fabrics.fabric_id,fabrics.fabric,items.item_details  FROM orders
INNER JOIN customers on customers.customer_id=orders.customer_id
INNER JOIN fabrics on fabrics.fabric_id=orders.fabric_id
INNER JOIN vendors on vendors.vendor_id=orders.vendor_id
INNER JOIN items on items.item_id=orders.item_id
INNER JOIN colors on colors.color_id=orders.color_id

LEFT JOIN item_categories on item_categories.category_id=items.item_category_id 

where orders.order_id='$order_id'";
$query=mysqli_query($conn,$sql);

    $fetch=mysqli_fetch_array($query);
    $order_id=$fetch['order_id'];
    $item_id=$fetch['item_id'];
    $item_no=$fetch['item_no'];
    $item_name=$fetch['item_name'];
    $item_image=$fetch['item_image'];
    $item_details=$fetch['item_details'];


    $order_date=$fetch['order_date'];
    $store_delivery_date=$fetch['store_delivery_date'];
    $main_delivery_date=$fetch['main_delivery_date'];

    $order_item_cost=$fetch['order_item_cost'];
    $order_fabric_cost=$fetch['order_fabric_cost'];
    $order_addon_cost=$fetch['order_addon_cost'];
    $order_total_cost=$fetch['order_total_cost'];

    $order_factory_item_cost=$fetch['order_factory_item_cost'];
    $order_factory_addon_cost=$fetch['order_factory_addon_cost'];
    $order_factory_fabric_cost=$fetch['order_factory_fabric_cost'];
    $order_factory_total_cost=$fetch['order_factory_total_cost'];

    $color=$fetch['color'];
    $color_id=$fetch['color_id'];
    
    $order_category=$fetch['category'];
    $order_quantity=$fetch['order_quantity'];


    $customer_id=$fetch['customer_id'];
    $customer_name=$fetch['customer_name'];
    $customer_address=$fetch['customer_address'];
    $customer_place=$fetch['customer_place'];
    $customer_district=$fetch['customer_district'];
    $customer_state=$fetch['customer_state'];
    $customer_pincode=$fetch['customer_pincode'];
    $customer_country=$fetch['customer_country'];
    $customer_mobile1=$fetch['customer_mobile1'];
    $customer_mobile2=$fetch['customer_mobile2'];
    $customer_email=$fetch['customer_email'];
    $shop_name=$fetch['shop_name'];
    $customer_adhar=$fetch['customer_adhar'];
    $customer_license=$fetch['customer_license'];
    $customer_image=$fetch['customer_image'];


    $factory_name=$fetch['factory_name'];
    $vendor_name=$fetch['vendor_name'];
    $vendor_id=$fetch['vendor_id'];
    $vendor_address=$fetch['vendor_address'];
    $vendor_place=$fetch['vendor_place'];
    $vendor_district=$fetch['vendor_district'];
    $vendor_pincode=$fetch['vendor_pincode'];
    $vendor_email=$fetch['vendor_email'];
    $vendor_mobile1=$fetch['vendor_mobile1'];
    $vendor_mobile2=$fetch['vendor_mobile2'];

    $category=$fetch['category'];

    $reference_no=$fetch['reference_no'];

  
    $agent_advance=$fetch['agent_advance'];
    $agent_balance=$fetch['agent_balance'];
    $factory_advance=$fetch['factory_advance'];
    $factory_balance=$fetch['factory_balance'];

    $fabric=$fetch['fabric'];
    $fabric_id=$fetch['fabric_id'];

        $production_status=$fetch['production_status'];
        $fabric_status=$fetch['fabric_status'];
        $stitch_status=$fetch['stitch_status'];
        $pack_status=$fetch['pack_status'];
        $store_status=$fetch['store_status'];
        $dispatch_status=$fetch['dispatch_status'];
        $delivery_status=$fetch['delivery_status'];
        $payment_status=$fetch['payment_status'];
        $status=$fetch['status'];?>