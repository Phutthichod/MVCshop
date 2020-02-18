<?php
// try {
    if (!isset($_SESSION['member']) || !is_a($_SESSION['member'],"Member"))
    {
        header("Location: " . Router::getSourcePath() . "index.php");

    }

require_once Router::getSourcePath()."inc/helper_func.inc.php";

// เก็บข้อมูลจากสิ่งที่ controller เตรียมไว้ให้
$products = $_SESSION['productList'];

// เริ่มต้นการเขียน view
$title = "My Cart";
ob_start();

?>

    <h1>ยินดีตอนรับสู่ N.S. Shop</h1>
    <form name="cartForm" id="cartForm" method="post" action="checkout.php">
        <?php
        $header = array("ลำดับ","ชื่อสินค้า","ราคาต่อชิ้น (บาท)","จำนวน");
        $data = array();
        $i = 0;
        foreach ($products as $prod) {
            $data[$i] = array($i+1,$prod->getProductName(),$prod->getPrice(),"<input type='number' name='prod_$i' id='prod_$i' value='0' min='0'/>");
            $i++;
        }
        showTable($header,$data);
        ?>

        <div style="margin: 1em; padding: 2em">
            <input type="submit" name="checkout" id ="checkout" value="Check Out"/>
            <input type="reset" name="cancel" id="cancel" value="Cancel" />
        </div>
    </form>

<?php
$content = ob_get_clean();

include Router::getSourcePath()."templates/layout.php";
// } catch (Throwable $e) { // PHP 7++
//     echo "Access denied: No Permission to view this page";
//     exit(1);
// }
?>
<?php
/*echo "<hr/>";
echo "<pre><code>";
show_source(__FILE__);
echo "</code></pre>";*/
