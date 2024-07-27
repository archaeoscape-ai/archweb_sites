docker images -a | grep archweb-sites-pkks | awk '{print $1":"$2}' | xargs docker rmi
