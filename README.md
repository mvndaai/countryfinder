# countryfinder
This is a client server setup that tells were a request comes from.

## Start the server
```
docker-compose up server
```

## Go the the page
http://localhost/restler/public/locate/index.php/locate/find

# Issue

* The client IP should be found in PHP using `$_SERVER['REMOTE_ADDR']`
* Docker uses a proxy so the address in `$_SERVER['REMOTE_ADDR']` is from the proxy not the client
* A solution should be use "net:host" to skip the proxy.
  * Port 80 is not available when using "net:host"
  * https://github.com/docker/docker/issues/15086

# Partial Completion
If you know the an IP you can pass it to the url.

Example: This link will return "Peru"
http://localhost/restler/public/locate/index.php/locate/find?ip=132.157.0.0

And this link "Romania"
http://localhost/restler/public/locate/index.php/locate/find?ip=5.2.128.0
