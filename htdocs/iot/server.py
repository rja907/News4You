from socket import *

host = "192.168.0.122"

print host

port = 7777

s = socket(AF_INET, SOCK_STREAM)

print "Socket Made"

s.bind((host,port))

print "Socket Bound"

s.listen(5)

print "Listening for connections..."

q,addr = s.accept()

msg = q.recv(1024)

print "Message from client : " + msg
 