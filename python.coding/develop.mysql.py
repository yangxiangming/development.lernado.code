# -*- coding: UTF-8 -*-

from config.mysqlpool import *

# select
def sampleList(new):
    cor = new.cursor()
    sql = "SELECT `id`, `sampleName`, `createTime`, `updateTime` FROM `sample` WHERE 1"
    try:
        cor.execute(sql)
        result = cor.fetchall()
        # for value in result:
        #     print value
        #
        # for val in result:
        #     id = val[0]
        #     sampleName = val[1]
        #     createTime = val[2]
        #     updateTime = val[3]
        #     newval = "id=%s, sampleName=%s, createTime=%s, updateTime=%s" % \
        #     (id, sampleName, createTime, updateTime)
        #     print newval

        i = cor.description
        print i
        for v in cor.fetchall():
            row = {}
            for k in range(len(i)-1):
                row[i[0]] = v[k]
            results.append(row)
        print results

    except Exception as e:
        print("Query Fail!".format(e))
    cor.close()

# editor
def sampleSave(new, data, where, bool):
    try:
        if bool:
            print 123;
    except Exception as e:
        print("Query Fail!".format(e))

new = connectpool()
sampleSave(new, [1, 1], [], 1)
