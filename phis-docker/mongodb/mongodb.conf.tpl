# mongod.conf
# for documentation of all options, see:
#   http://docs.mongodb.org/manual/reference/configuration-options/

# where and how to store data.
storage:
  dbPath: /bitnami/mongodb/data/db
  journal:
    enabled: true
  directoryPerDB: false

# where to write logging data.
systemLog:
  destination: file
  quiet: false
  logAppend: true
  logRotate: reopen
  path: /opt/bitnami/mongodb/logs/mongodb.log
  verbosity: 0

# network interfaces
net:
  port: 27017
  unixDomainSocket:
    enabled: true
    pathPrefix: /opt/bitnami/mongodb/tmp
  ipv6: false
  bindIpAll: true
  #bindIp:

# replica set options
replication:
  replSetName: opensilex
  #enableMajorityReadConcern: true

# process management options
processManagement:
   fork: false
   pidFilePath: /opt/bitnami/mongodb/tmp/mongodb.pid

# set parameter options
setParameter:
   enableLocalhostAuthBypass: true

# security options
security:
  authorization: disabled
  #keyFile: replace_me

