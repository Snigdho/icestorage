from mysql:latest
# create the database
ENV MYSQL_DATABASE icestoragedb
ENV MYSQL_ROOT_PASSWORD=password
ENV MYSQL_ALLOW_EMPTY_PASSWORD true
# read the tables and sql to the docker container
COPY icestoragedb.sql /docker-entrypoint-initdb.d
# expose the port 
EXPOSE 3306

