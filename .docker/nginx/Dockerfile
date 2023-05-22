FROM nginx:stable-alpine

ENV TZ=Asia/Bangkok

COPY ./.docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./.docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# Make Directory - Workspace
RUN mkdir -p /var/www/html

# ADD and set Group
RUN addgroup -g 1000 ubuntu && adduser -G ubuntu -g ubuntu -s /bin/sh -D ubuntu

# Set Group to Workspace
RUN chown ubuntu:ubuntu /var/www/html