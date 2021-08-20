## Настройка проекта
- склонировать проект
- запустить `composer install`
- настроить cоединение с базой `.env.local` файле

## Команда
Импорт запускается командой `php bin/console import-customers <countryCode> <numberToImport>`
Например : php bin/console import-customers AU 100

## API
ендпоинты доступын по адресам <your url>/customers или <your url>/customers/{id}
