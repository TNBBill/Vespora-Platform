rm -rf /projects/Vespora-Platform/webroot/files
rm -rf /projects/Vespora-Platform/webroot/images
rm -rf /projects/Vespora-Platform/webroot/css
rm -rf /projects/Vespora-Platform/webroot/js
rm -rf /projects/Vespora-Platform/config/config.ini.php
rm -rf /projects/Vespora-Platform/webroot/favicon.ico
ln -s /projects/TNB-Clients/platform.vespora.com/files/files /projects/Vespora-Platform/webroot/files
ln -s /projects/TNB-Clients/platform.vespora.com/files/images /projects/Vespora-Platform/webroot/images
ln -s /projects/TNB-Clients/platform.vespora.com/compile/css /projects/Vespora-Platform/webroot/css
ln -s /projects/TNB-Clients/platform.vespora.com/compile/js /projects/Vespora-Platform/webroot/js
ln -s /projects/TNB-Clients/platform.vespora.com/dev.ini.php /projects/Vespora-Platform/config/config.ini.php
ln -s /projects/TNB-Clients/platform.vespora.com/files/favicon.ico /projects/Vespora-Platform/webroot/favicon.ico
touch /projects/Vespora-Platform/config/config.ini.php

