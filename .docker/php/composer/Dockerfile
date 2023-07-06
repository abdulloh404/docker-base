FROM composer:latest

# ADD and set Group
RUN addgroup -g 1000 ubuntu && adduser -G ubuntu -g ubuntu -s /bin/sh -D ubuntu

# Set Profile to All Files
RUN chown -R ubuntu:ubuntu /var/www/html

# Run in work space
WORKDIR /var/www/html