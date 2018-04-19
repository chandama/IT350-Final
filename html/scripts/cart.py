#!/usr/bin/env python

from pymongo import MongoClient
import sys

email = sys.argv[1]
product_name = sys.argv[2]
product_price = sys.argv[3]

client = MongoClient('localhost',27017)
db = client.bluehalo

template = {
				"email": email,
				"name": product_name,
				"price": product_price
			}

db.bluehalo.insert(template)

#Follow mongodb installation instructions online
#sudo apt install python-pip
#sudo python -m pip install pymongo
#sudo python -m pip install --upgrade pymongo
#sudo pip install --upgrade pip
