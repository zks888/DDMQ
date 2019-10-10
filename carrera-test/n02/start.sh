
sh /root/zookeeper/bin/zkServer.sh start

curl http://172.18.0.3:8080/carrera/api/odin/internal/v4/initZkPath
curl http://172.18.0.3:8080/carrera/api/odin/internal/v4/initAllZk

cd /root/namesvr && sh ./control.sh start
cd /root/broker && sh ./control.sh start

cd /root/consumer && sh ./control.sh start
cd /root/producer && sh ./control.sh start
cd /root/chronos && sh ./control.sh start