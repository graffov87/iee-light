# -*- coding: utf-8 -*-
# @author   : Vitaliy Charnou <graffov87@gmail.com>

from subprocess import check_output
import json, os, sys

params = os.getcwd() + '/../../../../../../app/etc/env.php'
config = check_output(['php', '-r', 'echo json_encode(include "'+params+'");'])
config = json.loads(config)

sys.path.append('../Model/')
sys.path.append('../Model/Writer')
import Log, Export, Csv
from Log import *
from Export import *
from Csv import *

log = Log()
csv = Csv()
log.setBeginTime()
export = Export(config)
data = export.getData()
log.writeln(u'count: %.2f' % len(data))
headers = [i[0] for i in export.getDescription()]
csv.setFile('pupsik2.csv')
csv.setHeaders(headers)
csv.setInFile(data)
log.outEndTime()
