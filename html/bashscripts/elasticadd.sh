product_id="$1"
product_name="$2"
product_type="$3"
product_price="$4"

first="curl -XPOST 'localhost:9200/products/doc?pretty&pretty' -H
'Content-Type: application/json' -d'
{
	\"id\":\"$product_id\",
	\"name\":\"$product_name\", 
	\"category\":\"$product_type\",
	\"price\":\"$product_price\"
}
'"
