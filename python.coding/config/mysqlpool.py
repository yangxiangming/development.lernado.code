##
# date: 28 Nov 2016
# author: yangxiangming@live.com
# description: python for mysql connector pool
##

# -*- coding: UTF-8 -*-

import mysql.connector

def connectpool():
    config = {
        'host':'127.0.0.1',
        'port':3306,
        'user':'root',
        'passwd':'123456',
        'db':'develop',
        'charset':'utf8'
    }
    try:
        return mysql.connector.connect(**config)
    except Exception as e:
        print('Connector Fail!'.format(e))
