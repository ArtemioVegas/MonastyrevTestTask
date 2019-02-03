# Задача
Необходимо создать функцию match(int, int): array предсказывающую исход
футбольного матча на основе статистики по предыдущим играм, которая находится в
файле data.php
* Входные параметры: номер команды из файла data.php (нумерация с нуля).  
* Выходные параметры: массив из двух элементов. Элемент с индексом ноль
  содержит количество голов, которое первая команда забила второй. Элемент с
  индексом один содержит количество голов, которое вторая команда забила
  первой.

Например, если вызвать match(0, 1) и она вернет массив [3, 2] - это означает, что
команда с номером 0 забьет 3 гола команде с номером 1, а команда с номером 1
забьет 2 гола команде с номером 0.  

# Требования к выполненной работе
* Решением должен быть файл с именем index.php, который содержит функцию match.
  Файл будет подключен к системе тестирования, которая будет вызывать функцию
  match.
* Задание должно быть выполнение на PHP 7.0 без использования фреймворков.
* Решение должно быть полностью “из коробки”, чтобы нам не надо было добавлять в
  нашу тестовую среду дополнительные расширения для PHP или зависимости через
  Composer. Если используете Composer, то пакуйте их в один архив с файлом
  index.php.
* На выполнение задание дается максимум двое суток. Но мы надеемся на куда более
  быстрое решение, так как задание не занимает много времени.
* В письме с выполненным заданием нужно указать количество часов,
затраченных на решение.

# Решение
Для решения данной задачи использовал распределение Пуассона.
Счет матча рассчитывается **рандомом с заданной вероятностью**.