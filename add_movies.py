#!/usr/bin/env python
import sys
import getpass 
import pymysql as MySQLdb


userid=input('Username: ')
userpwd=getpass.getpass('Password: ')
dbname='IMDB'

# connect to MySQL server
mydb = MySQLdb.connect(host='localhost',
	user=userid,
	passwd=userpwd,
	db=dbname)
cursor = mydb.cursor()

# read the 'movies.txt' data file
fname=sys.argv[1]
for ldx, line in enumerate(open(fname,'r',encoding='UTF8')):
	if not ldx:						# skip first line (the header)
		continue

	#removing special characters in string (you can add more when required)
	#special characters = ['\"', ',']
	for c in ['\"', ',']:
		line=line.replace(c, '')
	tok=line.split('\t')
	print(tok)

	# setting NULL values
	for tidx, t in enumerate(tok):
		if not len(t):
			tok[tidx]='NULL'
		else:
			tok[tidx]=tok[tidx].strip()

	mid=tok[0]					# movie id
	mname=tok[1]					# name of movie
	myear=tok[2]					# year of movie
	mgenre=tok[3]					# genre 
	runtime=tok[4]					# runtime
	rating=tok[5]					# rating
	plot=tok[6]						# plot
	budget=tok[7]					# budget
	gross_glob=tok[8]				# global budget
	sub_id=tok[9]					# submitter id


	# creating one big tuple consisting of all the attribute values in SQL format
	# "0073486", "One Flew Over the Cuckoo's Nest", "1975", 133, 8.7, ..., 
	movie_vals="%s, %s, %s, %s, %s, %s, %s, %s, %s"%('"{}"'.format(mid), '"{}"'.format(mname), '"{}"'.format(myear), runtime, rating, '"{}"'.format(plot), budget, gross_glob, '"{}"'.format(sub_id))
	
	# insert data into MOVIES
	sql = 'INSERT INTO MOVIES VALUES (%s)'%(movie_vals)
	print(sql)
	try:
		cursor.execute(sql);
		print("[OK] Inserting [%s, %s] to MOVIES"%(mid, mname))
	except MySQLdb.IntegrityError:
		print("[Error] %s already in MOVIES"%(mid))


	# insert movie genres into MOVIE_GENRES
	for t in mgenre.strip().split('|'):
		val='"{}"'.format(t.strip())

		# "0073486", "Drama"
		sql = 'INSERT INTO MOVIE_GENRES VALUES (%s, %s)'%('"{}"'.format(mid), val)
		try:
			cursor.execute(sql);
			print("[OK] Inserting [%s, %s] to MOVIE_GENRES"%(mid, val))
		except MySQLdb.IntegrityError:
			print("[Error] %s already in MOVIE_GENRES"%(mid))

	# apply the INSERT and 
	mydb.commit()
			

# close the connection to the database.
cursor.close()
print("Done")

