<?php
/**
 * Load environment variables from a .env file (if exists) and store in $_ENV
 */
function loadEnv($path) {
    if (!file_exists($path)) return false;

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Skip comments
        if (strpos(trim($line), '#') === 0) continue;

        // Parse key=value
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode("=", $line, 2);
            $key = trim($key);
            $value = trim($value);

            // Remove quotes if present
            $value = trim($value, "\"'");

            // Set in $_ENV and system environment
            $_ENV[$key] = $value;
            putenv("$key=$value");
        }
    }
    return true;
}

/**
 * Get environment variable
 * Checks .env first (loaded into $_ENV), then system environment, else returns default
 */
function env($key, $default = null) {
    if (isset($_ENV[$key])) return $_ENV[$key];

    $val = getenv($key);
    if ($val !== false) return $val;

    return $default;
}
