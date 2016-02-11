composer install
mkdir web/vendor && mkdir web/vendor/css
wget https://raw.githubusercontent.com/cblweb/semantic-ui-bootstrap/master/css/smt-bootstrap.css -P web/vendor/css
rm -rf var/cache/*
