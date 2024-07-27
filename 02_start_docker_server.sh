# Start the Docker server, export the port 80, bind the html folder containing the php web appplication
docker run -p 80:80 -it --mount type=bind,source="$(pwd)"/html,target=/var/www/html --rm --name archweb-sites-pkks archweb-sites-pkks
