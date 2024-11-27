<?php

class Logger {
    public static function log($message, $level = 'info') {
        $date = date('Y-m-d H:i:s');
        $logMessage = "[$date][$level] $message" . PHP_EOL;
        
        $logFile = __DIR__ . '/../logs/' . date('Y-m-d') . '.log';
        $logDir = dirname($logFile);
        
        // Tạo thư mục logs nếu chưa tồn tại
        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true);
        }
        
        // Ghi log vào file
        file_put_contents($logFile, $logMessage, FILE_APPEND);
    }
} 