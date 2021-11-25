sudo chmod -R 777 ./
sudo chown -R jose:www-data ./
sudo usermod -a -G www-data jose
sudo find ./ -type f -exec chmod 644 {} \;
sudo find ./ -type d -exec chmod 755 {} \;
sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache
