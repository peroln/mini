## Вступление
Выданные файлы являются обрезанной версией одного из проектов, которые мы ведем.  
В основе фреймворк Yii2 с advanced шаблоном.  
Тестовое задание является проверкой возможности и скорости программиста к адаптации к нашей среде разработки, а также минимальная задача по использованию компоненов торговли в работе.

## Инициализация проекта
Копировать файлы, создать Mysql БД, поменять конфиг БД в common/config/main-local.php , домен привязать к backend/web

## Задача
- Сделать загрузку курсов валют с биржи Binance
- Сохранить данные в БД для удобного использования в гипотетических торгах
- Распечатать курсы на странице

## Помощь
Для подключения к Binance используется библиотека https://github.com/jaggedsoft/php-binance-api  
В классе common/components/BinanceExchange.php уже реализован пример получения курса валют  
Класс console/controllers/ExampleController - пример использования контроллера для выполнения из консоли, тамже вызывается функция получения курса валют  
В классе backend/controllers/SiteController.php находится простейшая функция вывода данных на страницу, также к ней подключен view файл backend/views/site/index.php , домашняя страница сайта  
В ходе выполнения задачи, Вам также надо будет создать модель к таблице БД, через Yii2 это можно быстро сделать через gii, для этого можно воспользоваться веб интерфейсом http://сайт/gii/model