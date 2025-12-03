marp: true
size: 16:9
paginate: true
title: NGINX Deployment – Project 1
---
# NGINX Deployment (Reference)
- Install NGINX + PHP-FPM on server/VM
- Point root to project /code folder
- Use try_files to route through index.php
---
## Sample server block
```
server {
  listen 80;
  server_name localhost;
  root /var/www/project1/code;
  index index.php;
  location / { try_files $uri /index.php?$args; }
  location ~ \.php$ {
    include snippets/fastcgi-php.conf;
    fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
  }
}
```
