# @author   : Vitaliy Charnou <graffov87@gmail.com>
import sys

# sys.path.append('../src/Python/')
import AbstractDirection
from AbstractDirection import *


class Export(AbstractDirection):

    def getData(self):
        self.connection.execute("select * from catalog_product_entity where updated_at >='1970-01-01 00:00:00'")
        data = self.connection.fetchall()

        return data

    def getDescription(self):

        return self.connection.description
