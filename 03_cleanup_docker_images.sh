docker images -a | grep archweb-sites-pkks-sc | awk '{print $1":"$2}' | xargs docker rmi
