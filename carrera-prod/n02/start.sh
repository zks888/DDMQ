
cd /root/namesvr && sh ./control.sh start
cd /root/broker && sh ./control.sh start

cd /root/consumer && sh ./control.sh start
cd /root/producer && sh ./control.sh start
cd /root/chronos && sh ./control.sh start