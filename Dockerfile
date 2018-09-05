# starting from a wordpress:4.9.8 Docker image
FROM wordpress:4.9.8

# adding label for the author
LABEL author "Maxime Pierre <max@webmediasolutionz.com>"

# same as doing `$ cd /var/www/html`
WORKDIR /var/www/html

# loading project inside Docker container and changing 
# ownership of the files to www-data user
COPY --chown=www-data ./web .

# loading PHP configuration inside Docker container and changing
# ownership of the files to www-data user
COPY --chown=www-data ./php.ini php.ini

# setting up wordpress db password variable
ENV WORDPRESS_DB_PASSWORD password01

# exposing appropriate ports
EXPOSE 80 443