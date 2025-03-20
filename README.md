# Лабораторная работа №4
## Цель

Выполнив данную работу студент сможет подготовить образ контейнера для запуска веб-сайта на базе Apache HTTP Server + PHP (mod_php) + MariaDB.

## Задание

Создать Dockerfile для сборки образа контейнера, который будет содержать веб-сайт на базе Apache HTTP Server + PHP (mod_php) + MariaDB. База данных MariaDB должна храниться в монтируемом томе. Сервер должен быть доступен по порту 8000.
Установить сайт WordPress. Проверить работоспособность сайта.

## Рабочий процесс

1. Первым делом копируем созданный репозитории и создаем нужные папки для файлов конфигурации
![1](https://i.imgur.com/Xb4AvC9.png)

2. Далее создаю докер файл на основе последней версии `Debian` 

![2](https://i.imgur.com/1mzb7PV.png)

Тут утилита `run` сначала обновляет все пакеты для работы с самыми свежими версиями, далее устанавливаются все необходимые пакеты и очищается кэш для уменьшения размера образа 

3. Строим образ и создаем контейнер

запускаем докер и вводим команду для присвоение тега контейнеру

![](https://i.imgur.com/ZnN2MT6.png)

`-t` - строит и задает имя образу

Затем запускаем контейнер в фоновом режимом с `bash`
![](https://i.imgur.com/QI6v3JU.png)

Далее нужно скопировать файлы конфигурациииз контейнера в созданные мною папки
![](https://i.imgur.com/qjRJqKl.png)

Проверяем:
![](https://i.imgur.com/byyc31Y.png)

Stop && Delete container!
![](https://i.imgur.com/C3NNoY1.png)

4. Настройка конфигурационных файлов

в файле конфигурации веб сервера указываем домен на котором работает сервер, адрес эл почты админа сервера, и какие файлы будут использоваться по умолчанию: если `index.php` отсутствкует -> то файл по умолчаю `index.html`

```bash
	ServerName localhost
	ServerAdmin djurinschi.andreiai@gmail.com
	DocumentRoot /var/www/html
	DirectoryIndex index.php index.html
```

в файле конфигурации php указываем место для логирования php ошибок
```bash
error_log = /var/log/php_errors.log
```

```bash 
memory_limit = 128M
upload_max_filesize = 128M
post_max_size = 128M
max_execution_time = 120
```

`memory_limit` - директива ограничивает максимальный объём памяти, который PHP может использовать для выполнения скрипта.

`upload_max_filesize ` - yказывает максимальный размер файла, который можно загрузить на сервер через php

`post_max_size` - oпределяет максимальный размер данных, которые могут быть отправлены через HTTP post запросы

`max_execution_time` - yстанавливает максимальное время в секундах, которое PHP может потратить на выполнение одного скрипта

В конфигурации mariaDB просто расскоментируем строку пути логирования ошибок

`log_error = /var/log/mysql/error.log`

5. Создаем конфигурационный фалй supervisor(для управления процессами в Linux) в характерной папке и копируем следующие строки

```bash
[supervisord]
# запуск в интерактивном режиме
nodaemon=true
# файли не логируются
logfile=/dev/null
# имя пользователя
user=root

# apache2
[program:apache2]
command=/usr/sbin/apache2ctl -D FOREGROUND
# апаче будет автоматически запущен при старте 
autostart=true
# автоматически перезапущен при ошибке
autorestart=true
# кол-во попыток перезапуска
startretries=3
stderr_logfile=/proc/self/fd/2
# запуск апаче от пользователя root
user=root

# mariadb
[program:mariadb]
# бд будет запущена от пользователя mysql
command=/usr/sbin/mariadbd --user=mysql
autostart=true
autorestart=true
startretries=3
stderr_logfile=/proc/self/fd/2
user=mysql
```









