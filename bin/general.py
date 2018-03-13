#! /usr/bin/env python
# @author   : Vitaliy Charnou <graffov87@gmail.com>
from subprocess import check_output
import json, os, sys


params = os.getcwd() + '/../../../../app/etc/env.php'
config = check_output(['php', '-r', 'echo json_encode(include "'+params+'");'])
config = json.loads(config)

#astr=ustr.encode("ascii","replace")
#for item in config:
    #print config[item]
#print config.keys()