FROM joyqi/typecho:nightly-php7.4-apache
# 跳过缓存，因为railway无法指定docker build --no_cache参数，所以理论会一直使用缓存，
# 故无法git clone到新的仓库文件，无论仓库更新多少次railway都会使用缓存！
#ADD "https://www.random.org/cgi-bin/randbyte?nbytes=10&format=h" skipcache
COPY ./usr /usr/src/typecho/usr/
COPY ./file-upload.php /usr/src/typecho/usr/
run mv /usr/src/typecho/usr/file-upload.php /usr/src/typecho/admin/
