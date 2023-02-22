FROM joyqi/typecho:nightly-php7.4-apache
COPY ./file-upload.php /usr/src/typecho/usr/file-upload.php
COPY ./usr /usr/src/typecho/usr/
