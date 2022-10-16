# php-discord-authorization
Авторизация через Discord на PHP!!!

1. Создайте application
2. Перейдите на вкладку oauth2
![Перейдите на oauth2 > General](https://github.com/sscefalix/php-discord-authorization/blob/main/images/to_oauth2.png?raw=true)
3. Скопируйте CLIENT ID и CLIENT SECRET
![Скопируйте CLIENT ID и CLIENT SECRET](https://github.com/sscefalix/php-discord-authorization/blob/main/images/copy_all.png?raw=true)
4. Вставьте их в config.php
5. Создайте перенаправление на страницу login.php
![Создайте перенаправление на страницу login.php](https://github.com/sscefalix/php-discord-authorization/blob/main/images/add_redirect_to_login.png?raw=true)
![Создайте перенаправление на страницу login.php](https://github.com/sscefalix/php-discord-authorization/blob/main/images/add_redirect_to_login2.png?raw=true)
6. Напишите ваше указанное перенаправление в config.php

7. Перейдите во вкладку oauth2 > URL Generator
![Перейдите во вкладку oauth2 > URL Generator](https://github.com/sscefalix/php-discord-authorization/blob/main/images/to_url_generator.png?raw=true)
8. Укажите SCOPES: identify, email и выберите REDIRECT_URI и скопируйте ссылку, вставьте в конфиг
![Укажите SCOPES: identify, email и выберите REDIRECT_URI и скопируйте ссылку, вставьте в конфиг](https://github.com/sscefalix/php-discord-authorization/blob/main/images/url_generator.png?raw=true)

9. Запустите сайт с помощью любого веб сервера:
https://ospanel.io
https://apache.org
https://nginx.org
