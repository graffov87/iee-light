# @author   : Vitaliy Charnou <graffov87@gmail.com>
import time


class Log:
    __beginTime = 0

    def writeln(self, text):
        print text

    def setBeginTime(self):
        self.__beginTime = time.time()

    def outEndTime(self):
        endTime = time.time()
        print u'speed: %.2f' % (endTime - self.__beginTime)