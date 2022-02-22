## DEV-Server

### SFTP
    Создаем новую SSH конфигурацию по данным из группы (host - ip адрес сервера, user name - Логин, password - Пароль)

    На основе этой конфигурации создаем новое подключение SFTP:
      - указываем root path: /var/www/u1603788/data/www/dev.hend-made.space
      - указываем Deployment path: /

    !Добавить в excluded paths директории:
      - vendor
      - node_modules
      - Возможно еще какие-то мешающиеся

###### Будет полезно
    - Убрать автодеплой по Ctrl + S

### Laravel
- Когда подтащите к себе репозиторий не забудте создать файл .env (есть файл .env.example можно его скопировать командой cp).
```shell
cp .env.example .env
```

- Затем необходимо сгенерировать новый ключ командой.
```shell
php artisan key:generate
```

- Позже можно настроить остальные параметры (коннект с бд еще продумаю как сделать).

### GIT

###### git flow
- Именование веток в формате "номер_таска/описание", например, 123/personal-page
- Оформление коммитов в формате "номер_таска: текст коммита" в повелительном наклонении.
- Если необходимо более подробное описание формат коммита примерно следующий:
```
123: Добавить страницу пользователя

вывести список всех витрин пользователя
вывести личные данные пользователя
вывести рейтинг и отзывы о пользователе
```
- При создании веток без тасков необходимо вместо номера указывать тип ветки (например fix/bug-home-page).

###### Общее по git
- Незабываем делать npm run prod (на хосте нет ноды...).
- Тащим к себе репозиторий через fork. 
- Pull request создаем на ветку master.
