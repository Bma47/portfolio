<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
if(isset($_POST['Add_To_Card']))
{
}

if(isset($_POST['Remove_item']))
{
foreach($_SESSION['cart'] as $key => $value)
{
if($value['Item_Name'] == $_POST['Item_Name'])
{
unset($_SESSION['cart'][$key]);
$_SESSION ['cart']=array_values($_SESSION['cart'])
echo"<script>
alert('item Removed');
window.locition.href='mycart.php'



</script>";
}
}
}

}
?>