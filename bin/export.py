# -*- coding: utf-8 -*-
# @author   : Vitaliy Charnou <graffov87@gmail.com>
import general, sys

sys.path.append('../src/Python/')
sys.path.append('../src/Python/Writer')
import Log, Export, Csv
from Log import *
from Export import *
from Csv import *

log = Log()
csv = Csv()
log.setBeginTime()
export = Export(general.config)
data = export.getData()
log.writeln(u'count: %.2f' % len(data))
headers = [i[0] for i in export.getDescription()]
csv.setFile('pupsik2.csv')
csv.setHeaders(headers)
csv.setInFile(data)
log.outEndTime()
