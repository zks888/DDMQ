# build ddmq image
if [[ "$(docker images -q ddmq:n01 2> /dev/null)" == "" ]]; then
  docker build -t ddmq:n01 ./n01
fi

# build ddmq image
if [[ "$(docker images -q ddmq:n02 2> /dev/null)" == "" ]]; then
  docker build -t ddmq:n02 ./n02
fi

# run ddmq container
echo 'start ddmq container n01.'
docker run -it --rm -p 127.0.0.1:8080:8080 -p 127.0.0.1:9613:9613 -p 127.0.0.1:9713:9713 --add-host=mysql:192.168.1.11 --name ddmq ddmq:n01

# run ddmq container
echo 'start ddmq container n02.'
docker run -it --rm -p 127.0.0.1:8080:8080 -p 127.0.0.1:9613:9613 -p 127.0.0.1:9713:9713 --add-host=mysql:192.168.1.11 --name ddmq ddmq:n02
