<?php
include "header.php";
?>
<br>
<br>
<br>
<br>
<?php
//after submitting the form you get the value of selected product
if(isset($_GET['id'])){
    $product_id=$_GET['ID'];
    $productQuery = $conn->query("select id, destination,departure from charges WHERE id='".$product_id."'");
    $productResult = $productQuery ->fetch_assoc();
  //use the value of productResult in your textbooxes
}else{
    $productResult =array();
}
?>
<form method='get' action=''>
  <select name='ID' onchange="this.form.submit()">
 <?php
     while ($row = $result->fetch_assoc()) {
         unset($id, $name);
         $id = $row['id'];
         $name = $row['destination'];
         echo '<option value="'.$id.'">'.$name.'</option>';
     }?>
    </select>
    </form>
    <br>
    <br>
    <br>
    <br><br>
    <br>
    <br>
    <br>
<?php

$conn = new mysqli('localhost', 'root', '', 'travel')
or die ('Cannot connect to db');

$result = $conn->query("select id, destination from charges");

// Build up an array of options to show in our select box.
$productSelectOptions = array();
while ($row = $result->fetch_assoc()) {
    $productSelectOptions[$row['id']] = $row['destination'];
}

?>

    <h3>EDIT PRODUCT</h3>

    <p>
        <strong>SELECT PRODUCT:</strong>
        <select name="ID" id="productSelect">
            <?php foreach ($productSelectOptions as $val => $text): ?>
                <option value="<?= $val; ?>"><?= $text; ?></option>
            <?php endforeach; ?>
        </select>
    </p>

    <h3>ID:</h3>

    <p>
        <input type="text" name="id_text" id="idText" />
    </p>

    <!-- Include jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script>
        var $productSelect = $('#productSelect');
        var $idText = $('#idText');

        // This should be the path to a PHP script set up to receive $_POST['product']
        // and return the product info in a JSON encoded array.
        // You should also set the Content-Type of the response to application/json so as our javascript parses it automatically.
        var apiUrl = '/try.php';

        function refreshInputsForProduct(product)
        {
            $.post(apiUrl, {product: product}, function(r) {
                /**
                 * Assuming your PHP API responds with a JSON encoded array, with the ID available.
                 */
                $idText.val(r.ID);
            });
        }

        // Listen for when a new product is selected.
        $productSelect.change(function() {
            var product = $(this).val();
            refreshInputsForProduct(product);
        });
    </script>

	<?php
include "footer.php";