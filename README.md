# sparrowtheme_Wordpress

<h2>Загрузка дефолтных данных через sparrowtheme.WordPress.xml</h2>
    <p>1: Заходим в админ панель WordPress</p>
    <p>2: Инструменты -> Импорт</p>
    <p>3: В таблице находим WordPress. Нажимаем на кнопку Установить </p>
    <p>4: Нажимаем на кнопку Запустить импорт</p>
    <p>5: Нажимаем на кнопку Выберите файл. Выбираем нужный файл. Нажимаем на кнопку Открыть</p>
    <p>6: Нажимаем на кнопку Загрузить и импортировать файл</p>
    <br>
    <h2>Загрузка дефолтных данных через sparrowtheme.sql</h2>
    <p>1: Открываем файл в любой редакторе</p>
    <p>2: В строке 768 и 769 замените на вашу домен <br>
        &nbsp;&nbsp;&nbsp;&nbsp;<b>Например: </b>(1, 'siteurl', 'http://sparrow', 'yes'),<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(2, 'home', 'http://sparrow', 'yes'),<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>На: </b>(1, 'siteurl', 'https://Girdes.com', 'yes'),<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(2, 'home', 'https://Girdes.com', 'yes'),
    </p>
    <p>3: Имортируйте на вашу БД</p>
