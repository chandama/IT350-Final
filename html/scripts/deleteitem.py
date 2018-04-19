#!/usr/bin/env python

from pymongo import MongoClient
import sys

email = sys.argv[1]
client = MongoClient('localhost',27017)
db = client.bluehalo

template = {
				"email": email,
			}

db.bluehalo.remove(template)

