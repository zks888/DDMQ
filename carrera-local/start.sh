zkServer start

cd /Users/zhaokaishan/work/DDMQ/carrera-local/console && sh ./control.sh start

while ! nc -z localhost 8080; do
  sleep 0.1
done

curl http://localhost:8080/carrera/api/odin/internal/v4/initZkPath
curl http://localhost:8080/carrera/api/odin/internal/v4/initAllZk

cd /Users/zhaokaishan/work/DDMQ/carrera-local/namesvr && sh ./control.sh start
cd /Users/zhaokaishan/work/DDMQ/carrera-local/broker && sh ./control.sh start

cd /Users/zhaokaishan/work/DDMQ/carrera-local/consumer && sh ./control.sh start
cd /Users/zhaokaishan/work/DDMQ/carrera-local/producer && sh ./control.sh start
cd /Users/zhaokaishan/work/DDMQ/carrera-local/chronos && sh ./control.sh start