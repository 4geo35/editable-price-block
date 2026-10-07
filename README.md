### Установка

Добавить в `tailwind.admin.config.js`, созданный в пакете `tailwindcss-theme`.

    "./vendor/4geo35/editable-price-block/src/resources/views/livewire/admin/**/*.blade.php",
    "./vendor/4geo35/editable-price-block/src/resources/views/admin/**/*.blade.php",

Добавить в `tailwind.config.js`, созданный в пакете `tailwindcss-theme`.

    "./vendor/4geo35/editable-price-block/src/resources/views/components/**/*.blade.php",
    "./vendor/4geo35/editable-price-block/src/resources/views/web/**/*.blade.php",

Запустить миграции для создания таблиц `php artisan migrate`

#### Views

Сокращение для представлений: `eprb`

#### Config

Название файла: `editable-price-block`  
Название типа блока: `prices`

- `perCol` => `3`: количество элементов в строке при выводе. Возможные значения `1`, `2` или `3`
