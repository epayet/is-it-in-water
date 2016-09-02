# Is it in water?

This app tells you whether a certain point (latitude, longitude) is in water or not.

## Usage

* Point in water: 51.511223,1.090069
* Google map link: https://goo.gl/maps/AkkTEi9J9j92
* Screenshot: ![In water example](docs/img/in-water.png?raw=true "In water example")
* API response: http://is-it-in-water.eu-gb.mybluemix.net/?lat=51.511223&lng=1.090069 => `true`

* Point NOT in water: 51.680247,0.604739
* Google map link: https://goo.gl/maps/vfPqpCRCRFD2
* Screenshot: ![Not in water example](docs/img/not-in-water.png?raw=true "Not in water example")
* API response: http://is-it-in-water.eu-gb.mybluemix.net/?lat=51.680247&lng=0.604739 => `false`

## Why

Why would you do this you may ask.

Why not?

More seriously, this was more like a playground to me to train with Docker and CloudFoundry.

Why PHP? Stop asking questions.

## How

This is a simple trick: it uses Google Maps to get 40x40 pixels around the point and read a few pixels. If the color is the same blue as the water in Google Maps, then it is in water. Otherwise, it's not. If Google decides to change the blue color of its water, then everything breaks :/

## Contribute

You need PHP with gd extension and a Google Map API key.

### API

`docker run --rm -e "API_KEY=YourKey" -v $PWD:/srv -p 2015:2015 abiosoft/caddy:php`

This will run a Caddy instance in a docker container.

### Cli

`API_KEY=YourKey php cli.php someLatitude someLongitude`

You can also use a docker container to run it if you want to avoid all the hassle about php, gd, etc.

`docker run -it --rm -e "API_KEY=YourKey" -v "$PWD":/app epayet/php-gd php cli.php 51.511223 1.090069`

## TODO

* Extract php-gd image: `docker build -t epayet/php-gd .`

## License

MIT License

Copyright (c) 2016 Emmanuel Payet

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
