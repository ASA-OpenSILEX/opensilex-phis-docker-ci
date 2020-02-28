FROM bitnami/mongodb:4.0

#RUN apt-get update && apt-get install -y vim
USER root
RUN sudo apt-get update && apt-get install -y vim && apt-get install -y locate 
ADD mongodb.conf.tpl /opt/bitnami/mongodb/templates/
ADD rs-config.sh /docker-entrypoint-initdb.d/
