<html>
<body>

<form method="post" action="<?php echo $PHP_SELF;?>">

Get Quote: <input type="text" size="10" maxlength="10" name="stockVar"/>

<input type="submit" value="Get Quote" name="get_quote"/>
</form>

<br><br>

<?php

$stockVar = "Quote Variable";

if (isset ($_POST['get_quote'])) {

$stockVar = $_POST['stockVar'];
}

$open = fopen("http://download.finance.yahoo.com/d/quotes.csv?s=" . $stockVar . "&f=sl1d1t1c1ohgv&e=.csv", "r");
$quote = fread($open, 2000);
fclose($open);
$quote = str_replace("\"", "", $quote);
$quote = explode(",", $quote);
$quote = ($quote[1]);

echo "last trade for <b>$stockVar</b> was <b>$quote</b>";

echo "Quote is $quote";

?>




</body>
</html>