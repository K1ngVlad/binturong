<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogPageVisit
{
    public function handle(Request $request, Closure $next)
    {
        // Логируем информацию о посещении страницы
        Log::info('User visited page: ' . $request->path());

        // Получаем ответ от следующего middleware
        $response = $next($request);

        // Получаем содержимое ответа
        
        $logs = file_get_contents(storage_path('logs/laravel.log'));
        $logsArray = array_reverse(array_filter(explode("\n", $logs)));
        
        // Ограничим количество логов до 10 последних записей
        $recentLogs = array_slice($logsArray, 0, 10);

        // Формируем JavaScript-код для вывода логов в консоль
        $logScript = "<script>console.log(" . json_encode($recentLogs) . ");</script>";

        // Вставляем скрипт в HTML-код ответа
        $content = $response->getContent();
        $content = str_replace('</body>', $logScript . '</body>', $content);
        $response->setContent($content);

        return $response;
    }
}
