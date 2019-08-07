FROM phpdockerio/php73-fpm:latest
WORKDIR "/application"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install  php7.3-mysql php7.3-sqlite3 php-xdebug php7.3-bcmath php7.3-bz2 php7.3-gd php-imagick php7.3-imap php7.3-intl php-ssh2 php7.3-xsl php-yaml \
   && curl -sL https://deb.nodesource.com/setup_10.x -o /tmp/nodesource_setup.sh && bash /tmp/nodesource_setup.sh \
   && apt-get -y install nodejs build-essential \
   && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
   && echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list \
   && apt-get update && apt-get install yarn \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install git
RUN apt-get update \
    && apt-get -y install git \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

