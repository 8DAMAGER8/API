FROM nginx:1.25-alpine

ARG UID
ARG GID

ENV UID=${UID}
ENV GID=${GID}

RUN mkdir -p /var/www/html

# MacOS staff group's gid is 20, so is the dialout group in alpine linux. We're not using it, let's just remove it.
RUN delgroup dialout \
    && addgroup -g ${GID} --system laravel \
    && adduser -G laravel --system -D -s /bin/sh -u ${UID} laravel \
    && sed -i "s/user  nginx/user laravel/g" /etc/nginx/nginx.conf

ADD ./nginx/default.conf /etc/nginx/conf.d/
