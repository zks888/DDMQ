
cd /root/namesvr && sh ./control.sh stop
cd /root/broker && sh ./control.sh stop

cd /root/consumer && sh ./control.sh stop
cd /root/producer && sh ./control.sh stop
cd /root/chronos && sh ./control.sh stop