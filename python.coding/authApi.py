# -*- coding: UTF-8 -*-

from config.mysqlPool import *
import time

class authApi():

    def __init__(self):
        self.db = mysqlPool()

    def sampleList(self):
        sql = "SELECT `id`, `sampleName`, `createTime`, `updateTime` FROM `sample` WHERE 1"
        db = self.db
        cursor = db.cursor()
        try:
            cursor.execute(sql)
            result = cursor.fecthAll()
        except Exception as e:
            print "Error: unable to fecth data".format(e)
        return result

    def sampleSave(data, where):
        if(data['id']):
            sql = "INSERT INTO `sample`(`sampleName`, `createTime`, `updateTime`) VALUES (%s, %s, %s)" % \
            (data['sampleName'], data['createTime'], data['updateTime'])
        else:
            sql = "UPDATE `sample` SET `sampleName`=sampleName+1,`updateTime`=updateTime+1 WHERE id=%s" % (data['id'])

        try:
            cursor.execute(sql)
            db.commit()
        except Exception as e:
            db.rollback()
            print "Error: edit data fail!".format(e)
            
    def sampleDelete(data, where):
        if(data):
            sql = ""
        else:
            print "Error: data null!".format(e)
            
        try:
            
        except Exception as e:
            
            
    
ticks = time.time()
new = authApi()
tmp = new.sampleList()
print(tmp)
save = ['id'=1, 'sampleName'=>ticks, 'createTime'=>ticks, 'updateTime'=>ticks]
data = new.sampleSave(save, 1)
