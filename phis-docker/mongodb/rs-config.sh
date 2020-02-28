#mongo --eval 'rsconf = {_id:"opensilex",members:[{_id: 0,host: "mongodb:27017"}]}; rs.initiate(rsconf);'
mongo --eval 'rs.initiate();'
