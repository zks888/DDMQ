## DDMQ PROD ##

1、创建自定义网络：

* docker network create --subnet=172.18.0.0/16 ddmq-net
* docker network ls

2、将carrera-prod/mysql/ddmq.sql导入宿主机MySQL的carrera_open_source库

* 这里宿主机的MySQL的root账号密码是wawa521
* 需要修改账号和密码，需要修改carrera-console/carrera-console/setting/carrera-console-dev.properties文件，并且重新编译

3、启动

* ./play.sh

