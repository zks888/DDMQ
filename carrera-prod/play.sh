# build mysql image
if [[ "$(docker images -q mysql:1.1 2> /dev/null)" == "" ]]; then
  docker build -t mysql:1.1 ./mysql
fi

# build ddmq image
if [[ "$(docker images -q ddmq:n01 2> /dev/null)" == "" ]]; then
  docker build -t ddmq:n01 ./n01
fi

# build ddmq image
if [[ "$(docker images -q ddmq:n02 2> /dev/null)" == "" ]]; then
  docker build -t ddmq:n02 ./n02
fi

# run mysql container
echo 'start mysql container...'
docker run -td --rm --name mysql --network bridge --ip 172.17.0.2 -p 127.0.0.1:3307:3306 mysql:1.1

# run ddmq container
echo 'start ddmq container n01.'
docker run -it --rm --name ddmqn01 --network bridge --ip 172.17.0.3 -p 127.0.0.1:8080:8080 --link mysql ddmq:n01

# run ddmq container
echo 'start ddmq container n02.'
docker run -it --rm --name ddmqn02 --network bridge --ip 172.17.0.4 --link mysql ddmq:n02
