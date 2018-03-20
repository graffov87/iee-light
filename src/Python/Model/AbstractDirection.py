# @author   : Vitaliy Charnou <graffov87@gmail.com>
import MySQLdb
import gc


class AbstractDirection:
    connection = 0
    __db = 0

    def __init__(self, params):
        hosts = params.get('db').get('connection').get('default')
        try:
            self.__db = MySQLdb.connect(hosts.get('host'), hosts.get('username'), hosts.get('password'),
                                        hosts.get("dbname"))
            self.connection = self.__db.cursor()
        except MySQLdb.Error as e:
            print "MySQL Error [%d]: %s" % (e.args[0], e.args[1])

    def __del__(self):
        self.__db.close()
        gc.collect()
