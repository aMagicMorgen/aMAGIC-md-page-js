<?php
// Подключаем шапку
header('Content-Type: text/html; charset=utf-8');
echo <<<HTML
<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<style>
body {
  font: 400 16px/1.5 "Helvetica Neue", Helvetica, Arial, sans-serif;
  color: #111;
   margin: 20px;
    max-width: 800px;
    border: 1px solid #e1e4e8;
    padding: 10px 40px;
    padding-bottom: 20px;
    border-radius: 10px;
    margin-left: auto;
    margin-right: auto;
    box-shadow: 0 10px 15px -3px rgb(0 0 0 / 10%), 0 4px 6px -2px rgb(0 0 0 / 5%);
}
/**
 * Links
 */
a {
  color: #0366d6;
  text-decoration: none; }
  a:visited {
    color: #0366d6; }
  a:hover {
    color: #0366d6;
    text-decoration: underline; }
* {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
  color: #24292e; }
</style>
<script>
// Удаляем target="_blank" у всех ссылок после загрузки страницы
document.addEventListener('DOMContentLoaded', function() {
    // Находим все ссылки на странице
    const links = document.querySelectorAll('a[target="_blank"]');
    // Перебираем все найденные ссылки и удаляем target="_blank"
    links.forEach(link => {
        link.removeAttribute('target');
    });
    // Для динамически загружаемого контента (если меняется содержимое через AJAX)
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.addedNodes.length) {
                document.querySelectorAll('a[target="_blank"]').forEach(link => {
                    link.removeAttribute('target');
                });
            }
        });
    });
    // Начинаем наблюдение за изменениями в body
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
});
</script>
<!--script src="md-page.js"></script><noscript-->
<script src="https://cdn.rawgit.com/oscarmorrison/md-page/5833d6d1/md-page.js"></script><noscript>

HTML;

// Функция для безопасного получения имен файлов
function getMarkdownFiles() {
    $files = [];
    foreach (glob("*.md") as $file) {
        if (is_file($file)) {
            $name = pathinfo($file, PATHINFO_FILENAME);
            $files[$name] = $file;
        }
    }
    return $files;
}
// Генерация меню
$mdFiles = getMarkdownFiles();
if (!empty($mdFiles)) {
    echo "## Доступные документы\n\n";
    foreach ($mdFiles as $name => $file) {
        // Стандартный Markdown (открывается в текущем окне)
        echo "- [{$name}](?md=" . urlencode($file) . ")\n";
        }
    echo "\n---\n\n";
}
// Отображение выбранного файла
if (isset($_GET['md']) && file_exists($_GET['md'])) {
    $safeFile = basename($_GET['md']);
    echo "## $safeFile\n";
    if (pathinfo($safeFile, PATHINFO_EXTENSION) === 'md') {
        echo file_get_contents($safeFile);
    }
} else {
    echo "<h1>Добро пожаловать!</h1>";
    echo "<p>Выберите документ из списка выше или добавьте .md файлы в эту папку.</p>";
}
