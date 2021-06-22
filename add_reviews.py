#!/usr/bin/env python
# for LINUX users
import sys
import getpass 
import pymysql as mysqldb

userid=input('Username: ')
userpwd=getpass.getpass('Password: ')
dbname='IMDB'   # use your databas name

# connect to MySQL server
mydb = mysqldb.connect(host='localhost',
   user=userid,
   passwd=userpwd,
   db=dbname)
cursor = mydb.cursor()

# read the 'movies.txt' data file
fname=sys.argv[1]
for ldx, line in enumerate(open(fname,'r',encoding='UTF8')):
   if not ldx:                  
      continue

   # tokenize attributes
   for c in ['\"', ',']:
      line=line.replace(c, '')
   tok=line.strip().split('\t')
   print(tok)

   for tidx, t in enumerate(tok):
      if not len(t):
         tok[tidx]='NULL'
      else:
         tok[tidx]=tok[tidx].strip()

   mid=tok[0]                  
   reviewid=tok[1]               
   reviewrating=float(tok[2].strip())            
   reviewdate=tok[3].strip()            
   reviewtext=tok[4].strip()   
   
   # creating one big tuple consisting of all the attribute values in SQL format
   # "0073486", "One Flew Over the Cuckoo's Nest", "1975", 133, 8.7, ..., 
   reviews_vals="%s, %s, %d, %s, %s"%('"{}"'.format(reviewid), '"{}"'.format(mid), reviewrating, '"{}"'.format(reviewdate), '"{}"'.format(reviewtext))
   
   # insert data into reviews
   sql = 'INSERT INTO REVIEWS VALUES (%s)'%(reviews_vals)
   print(sql)
   try:
      cursor.execute(sql);
      print("[OK] Inserting [%s, %s] to REVIEWS"%(reviewid, mid))
   except mysqldb.IntegrityError:
      print("[Error] %s already in REVIEWS"%(reviewid))

   # apply the INSERT and 
   mydb.commit()
         

# close the connection to the database.
cursor.close()
print("Done")