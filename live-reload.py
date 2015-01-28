#!/usr/bin/env python
import os
from livereload import Server, shell

server = Server()
server.watch((os.getcwd()+'\\application'))
server.watch((os.getcwd()+'\\static'))
server.watch((os.getcwd()+'\\statics'))
server.watch((os.getcwd()+'\\tpl'))
server.watch((os.getcwd()+'\\tpl_admin'))

server.serve(port=8080,host='localhost')
