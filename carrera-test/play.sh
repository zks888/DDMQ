
# build ddmq image
if [[ "$(docker images -q ddmq:n01 2> /dev/null)" == "" ]]; then
  docker build -t ddmq:n01 ./n01
fi

# build ddmq image
if [[ "$(docker images -q ddmq:n02 2> /dev/null)" == "" ]]; then
  docker build -t ddmq:n02 ./n02
fi

# build ddmq image
if [[ "$(docker images -q ddmq:n03 2> /dev/null)" == "" ]]; then
  docker build -t ddmq:n03 ./n03
fi

# run ddmq container
echo 'start ddmq container n01.'
docker run -td --rm --name ddmqn01 --network ddmq-net --ip 172.18.0.3 -p 192.168.11.200:8080:8080 -p 192.168.11.200:9613:9613 -p 192.168.11.200:9713:9713 -v /usr/local/var/rocketmq:/root/rocketmq -v /usr/local/var/log/ddmq/n01:/root/logs --add-host=mysql:192.168.11.200 ddmq:n01

# run ddmq container
echo 'start ddmq container n02.'
docker run -td --rm --name ddmqn02 --network ddmq-net --ip 172.18.0.4 -p 192.168.11.200:8081:8080 -p 192.168.11.200:9614:9613 -p 192.168.11.200:9714:9713 -v /usr/local/var/rocketmq:/root/rocketmq -v /usr/local/var/log/ddmq/n02:/root/logs --add-host=mysql:192.168.11.200 ddmq:n02

# run ddmq container
echo 'start ddmq container n03.'
docker run -td --rm --name ddmqn03 --network ddmq-net --ip 172.18.0.5 -p 192.168.11.200:8082:8080 -p 192.168.11.200:9615:9613 -p 192.168.11.200:9715:9713 --add-host=mysql:192.168.11.200 ddmq:n03
