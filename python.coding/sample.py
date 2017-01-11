# -*- coding: UTF-8 -*-

import mysql.connector

# 打开数据库连接
db = mysql.connector.connect(host='127.0.0.1', user='root', passwd='123456', db='develop')

# 使用cursor()方法获取操作游标
cursor = db.cursor()

# 使用execute方法执行SQL语句
cursor.execute("SELECT VERSION()")

# 使用 fetchone() 方法获取一条数据库。
data = cursor.fetchone()

print "Database version : %s " % data

sql = "SELECT `id`, `sampleName`, `createTime`, `updateTime` FROM `sample` WHERE 1"
try:
    cursor.execute(sql)
    result = cursor.fetchall()
    print result
except Exception as e:
    print("Query Fail!".format(e))

# 关闭数据库连接
db.close()
