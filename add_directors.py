#!/usr/bin/env python
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
   directorid=tok[1]               
   directorname=tok[2]               
   directorgenre=tok[3]               
   
   # creating one big tuple consisting of all the attribute values in SQL format
   # "0073486", "One Flew Over the Cuckoo's Nest", "1975", 133, 8.7, ..., 
   director_vals="%s, %s"%('"{}"'.format(directorid), '"{}"'.format(directorname))
   
   # insert data into DIRECTORS
   sql = 'INSERT INTO DIRECTORS VALUES (%s)'%(director_vals)
   print(sql)
   try:
      cursor.execute(sql);
      print("[OK] Inserting [%s, %s] to DIRECTORS"%(directorid, directorname))
   except mysqldb.IntegrityError:
      print("[Error] %s already in DIRECTORS"%(directorid))

   # insert director genres into DIRECTOR_GENRES
   for t in directorgenre.strip().split('|'):
      val='"{}"'.format(t.strip())

      # "0073486", "Drama"
      sql = 'INSERT INTO DIRECTORS_GENRES VALUES (%s, %s)'%('"{}"'.format(directorid), val)
      print(sql)
      try:
         cursor.execute(sql);
         print("[OK] Inserting [%s, %s] to DIRECTOR_GENRES"%(directorid , val))
      except mysqldb.IntegrityError:
         print("[Error] %s already in DIRECTOR_GENRES"%(directorid ))
   
   moviedirector_vals="%s, %s"%('"{}"'.format(directorid), '"{}"'.format(mid))
   sql = 'INSERT INTO MOVIE_DIRECTORS VALUES (%s)'%(moviedirector_vals)
   print(sql)
   try:
      cursor.execute(sql);
      print("[OK] Inserting role [%s, %s]"%(directorid, mid))
   except mysqldb.IntegrityError:
      print("[Error]%s already in MOVIE_DIRECTORS"%(directorid))

   # apply the INSERT and 
   mydb.commit()
         

# close the connection to the database.
cursor.close()
print("Done")
