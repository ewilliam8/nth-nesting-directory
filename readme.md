Каталог с н-вложенностью. Построение древовидной системы данных любой вложенности.

· Создание, редактирование, удаление, перенос раздела;
· Создание, редактирование, удаление, перенос элемента;
· Просмотр, сортировка по времени, сортировка по алфовиту каталога.

Элемент и раздел могут быть привязаны только к одному разделу. Для хранения данных используется MySQL. Без использования фреймворков. 

Структура данных:

    Раздел:
    ·   Ид раздела
    ·   Наименование
    ·   Дата создания
    ·   Дата модификации
    ·   Описание
    ·   Ид родительского раздела

    Элемент:
    ·   Ид элемента
    ·   Ид раздела
    ·   Наименование
    ·   Дата создания
    ·   Дата модификации
    ·   Тип элемента(новость, статья, отзыв, комментарий)
    ·   Произвольные данные 

Общий вид
![Alt text](https://github.com/ewilliam8/nth-nesting-directory/blob/master/src/web/img/main.png)

Создание раздела (узла)
![Alt text](https://github.com/ewilliam8/nth-nesting-directory/blob/master/src/web/img/addChapter.png)

Создание элемента
![Alt text](https://github.com/ewilliam8/nth-nesting-directory/blob/master/src/web/img/addElem.png)

Изменение раздела
![Alt text](https://github.com/ewilliam8/nth-nesting-directory/blob/master/src/web/img/changeChapter.png)

Изменение элемента
![Alt text](https://github.com/ewilliam8/nth-nesting-directory/blob/master/src/web/img/changeElem.png)

Удаление раздела
![Alt text](https://github.com/ewilliam8/nth-nesting-directory/blob/master/src/web/img/deleteChapter.png)

Удаление элемента
![Alt text](https://github.com/ewilliam8/nth-nesting-directory/blob/master/src/web/img/deleteElem.png)

Сортировка по времени, сортировка по алфовиту каталога находится в панеле управления
![Alt text](https://github.com/ewilliam8/nth-nesting-directory/blob/master/src/web/img/control.png)