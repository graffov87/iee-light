# @author   : Vitaliy Charnou <graffov87@gmail.com>
import csv


class Csv:
    __file = ''

    def setFile(self, file):
        self.__file = file

    def getFile(self):
        return self.__file

    def setHeaders(self, headers):
        with open(self.__file, "w") as csvFile:
            writer = csv.writer(csvFile)
            writer.writerow(headers)

    def setInFile(self, data):
        with open(self.__file, "a+") as csvFile:
            writer = csv.writer(csvFile)
            for line in data:
                writer.writerow(line)
