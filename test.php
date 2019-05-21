
<html>

<body>
    <h3>Get Value from multiple checkbox in PHP</h3>
    <form action="test.php" method="get">
        <input type="checkbox" name="fruit_list[]" value="1">Apple&nbsp;
        <input type="checkbox" name="fruit_list" value="2">Banana&nbsp;
        <input type="checkbox" name="fruit_list" value="3">Mango
        <input type="checkbox" name="fruit_list" value="4">Guava</br></br>
        <input type="checkbox" name="fruit_list" value="5">Orange</br></br>
        <input type="submit" value="Save" />
    </form>

    <body>

</html>
<?php
if(isset($_GET['fruit_list']))
{
$fruit_list = array();
foreach($_GET['fruit_list'] as $val)
{
$fruit_list[] = (int) $val;
}
$fruit_list = implode(',', $fruit_list);
echo "Fruits Value are :- ".''.$fruit_list;
exit;
}
?>