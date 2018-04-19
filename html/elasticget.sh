proName="$1"

first="curl -X GET "http://localhost:9200/products/_search?pretty" -H \
'Content-Type: application/json' -d \
'{ \"query\": { \"bool\": { \"must\": [ { \"match\": { \"proName\": \"$proName\" } } ] } } } '"

eval $first
