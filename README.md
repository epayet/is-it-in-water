# Is it in water?

TODO

docker build -t epayet/php-gd .
docker run -it --rm --name is-it-water-cli -v "$PWD":/app epayet/php-gd
