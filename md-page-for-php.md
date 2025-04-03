- [В `php-md-reader` (ПАПКА С php кодом)](./php-md-reader)

---

# ✨ **aMAGIC md-page.js в PHP (пока просто идея)**  
### *Используем Markdown в PHP — просто и элегантно!*  
```php
<?php
/*
 * MAGIC md-page.js - Markdown to HTML Converter
 * Description: Превращаем Markdown в HTML — просто и элегантно!
 * Version: 1.0
 * Author: Your Name
 */

// Основной контент в Markdown-формате
$content = <<<MD
# ✨ MAGIC md-page.js  
### *Превращаем Markdown в HTML — просто и элегантно!*  

---

## 🔗 Источник скрипта  
Библиотека **`md-page.js`** взята из репозитория Oscar Morrison:  
- **CDN-ссылка**: [https://cdn.jsdelivr.net/gh/oscarmorrison/md-page@5833d6d1/](https://cdn.jsdelivr.net/gh/oscarmorrison/md-page@5833d6d1/)  
- **Прямая загрузка**: [md-page.js](https://cdn.rawgit.com/oscarmorrison/md-page/5833d6d1/md-page.js)  

---

## 🛠 Установка за 3 шага  

### 1️⃣ Подготовка файлов  
Скопируйте в папку с вашими `.md`-документами:  
- `md-page.js`  
- `md-page.css`  

### 2️⃣ Добавьте HTML-шапку  
Вставьте этот код в начало вашего Markdown-файла:  
MD;
```


```html
<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="md-page.css">
<script src="md-page.js"></script><noscript>
```

### 3️⃣ Пишите Markdown как обычно!  

---

## 🌐 Как открыть в браузере?  
- **Локально**: Переименуйте `.md` → `.html`  
- **На хостинге**: Можно оставить `.md` или убрать расширение  

---

## 💡 Важные нюансы  
### 📌 Альтернативная загрузка скрипта  
```html
<script src="https://cdn.rawgit.com/oscarmorrison/md-page/5833d6d1/md-page.js"></script><noscript>
```  

### 🎨 Кастомизация стилей  
Файл `md-page.css` можно редактировать под свой дизайн.

---

## 🚀 Пример использования  
```markdown
# Привет, мир!  
Это **Markdown** → **HTML** преобразование.
```

```PHP
// Генерация HTML-страницы
function generatePage($markdown) {
    $html_header = <<<HEAD
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MD-Page Converter</title>
    <link rel="stylesheet" href="md-page.css">
    <script src="md-page.js"></script><noscript>
    <style>
        body { max-width: 800px; margin: 0 auto; padding: 20px; }
        pre { background: #f5f5f5; padding: 15px; border-radius: 5px; }
    </style>
</head>
<body>
HEAD;

    $html_footer = <<<FOOT
</body>
</html>
FOOT;

    return $html_header . "\n" . $markdown . "\n" . $html_footer;
}

// Вывод результата
echo generatePage($content);
?>
```

### Ключевые особенности реализации:
1. **Структура файла**:
   - PHP-переменная с Markdown-контентом
   - Функция для генерации полной HTML-страницы
   - Автоматический вывод результата

2. **Оптимизации**:
   - HEREDOC-синтаксис для удобного хранения многострочного текста
   - Встроенные CSS-стили для базового форматирования
   - Чёткое разделение логики и контента

3. **Использование**:
   - Сохраните как `.php` файл
   - Доступно через веб-сервер
   - Автоматически преобразует Markdown в HTML

Для работы с реальным Markdown-парсером можно добавить:
```php
// Альтернатива с использованием парсера (если нужно)
require_once 'markdown_parser.php';
$html_content = Markdown($content);
echo generatePage($html_content);
```
