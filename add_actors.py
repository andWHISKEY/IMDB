#!/usr/bin/env python
import sys
import getpass 
# import MySQLdb as mysqldb
import pymysql as mysqldb

userid=input('Username: ')
userpwd=getpass.getpass('Password: ')
dbname='IMDB'	# your databas ename

# connect to MySQL server
mydb = mysqldb.connect(host='localhost',
	user=userid,
	passwd=userpwd,
	db=dbname)
cursor = mydb.cursor()

fname=sys.argv[1]
for ldx, line in enumerate(open(fname,'r',encoding='UTF8')):
	if not ldx:				# skip first line (the header)
		continue

	tok=line.strip().split('\t')

	mid=tok[0]
	actorid=tok[1]
	actorname=tok[2]
	gender=tok[3]
	role=tok[4]
	
	# insert actor data into ACTORS
	actor_vals="%s, %s, %s"%('"{}"'.format(actorid), '"{}"'.format(actorname), '"{}"'.format(gender))
	sql = 'INSERT INTO ACTORS VALUES (%s)'%(actor_vals)

	try:
		cursor.execute(sql);
		print("Inserting actor [%s, %s]"%(actorid, actorname))
	except mysqldb.IntegrityError:
		print("%s already in ACTORS"%(actorid))
		

	# insert actor's role into ROLES
	role_vals="%s, %s, %s"%('"{}"'.format(role), '"{}"'.format(actorid), '"{}"'.format(mid))
	sql = 'INSERT INTO ROLES VALUES (%s)'%(role_vals)
	try:
		cursor.execute(sql);
		print("Inserting role [%s, %s, %s]"%(role, actorid, mid))
	except mysqldb.IntegrityError:
		print("%s already in ROLES"%(role))
		
	mydb.commit()

#close the connection to the database.
cursor.close()
print("Done")

