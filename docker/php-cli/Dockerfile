FROM phpdockerio/php73-cli:latest
WORKDIR "/application"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install  \
    php-memcached php-memcache php-xdebug php-redis acl \
    php7.3-bcmath php7.3-bz2 php7.3-gd php-imagick php7.3-intl php-mongodb php-ssh2 php-yaml php-zmq  &&\
    apt-get -y install fish supervisor vim && \
    curl -sL http://gordalina.github.io/cachetool/downloads/cachetool.phar -o /usr/local/bin/cachetool && chmod +x /usr/local/bin/cachetool && \
    curl -sL https://deb.nodesource.com/setup_9.x -o /tmp/nodesource_setup.sh && \
    bash /tmp/nodesource_setup.sh && \
    apt-get -y install gcc g++ make && \
    apt-get -y --no-install-recommends install nodejs build-essential && npm install -g bower && npm install -g uglifycss && npm install -g uglify-js && npm install -g less && \
    curl -sL https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
    echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list && \
    apt-get update && apt-get install yarn && \
    apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install git
RUN apt-get update \
    && apt-get -y install git \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
