#!/usr/bin/env python

from pymongo import MongoClient
import sys

email = sys.argv[1]

client = MongoClient('localhost',27017)
db = client.bluehalo

template = {
				"email": email
			}

cursor = db.bluehalo.find(template)

print('<table><tr><th>Product</th><th>Price</th></tr>')

total = 0;

for document in cursor:
	print('<tr>')
	print('<td>' + document['name'] + '</td><td>' + document['price'] + '</td>')
	print('</tr>')
	price = int(document['price'])
	total = total + price

tax = total * 0.07
cart_total = total + tax
print('</table>')
print ('<table><tr> <th>Cart</th> <th>Tax</th> <th>Total</th></tr>')
print('<tr><td>' + str(total) + '</td><td>' + str(tax) + '</td><td>' + str(cart_total) + '</td></tr></table>')