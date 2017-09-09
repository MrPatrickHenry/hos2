composer install
chmod -R gu+w storage && chmod -R guo+w storage && chmod 777 -R * && chown apache:apache -R * && php artisan cache:clear && php artisan view:clear
cp -a httpd.conf /etc/httpd/conf/httpd.conf
echo PASS