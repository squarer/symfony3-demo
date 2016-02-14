composer install
mkdir web/vendor && mkdir web/vendor/css
wget https://raw.githubusercontent.com/cblweb/semantic-ui-bootstrap/master/css/smt-bootstrap.css -NP web/vendor/css
wget https://raw.githubusercontent.com/lipis/bootstrap-social/gh-pages/bootstrap-social.css -NP web/vendor/css
rm -rf var/cache/*
