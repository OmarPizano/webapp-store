<?
namespace tienda\core;

class Session
{
    public static function start() {
        if (!isset($_SESSION)) {
            session_start();
        }
    }
    public static function stop() {
        if (isset($_SESSION)) {
            session_destroy();
        }
    }
    public static function end() {
        session_destroy();
    }
    public static function get(string $key) {
        return $_SESSION[$key] ?? false;
    }
    public static function set(string $key, mixed $value) {
        $_SESSION[$key] = $value;
    }
    public static function unset(string $key) {
        $value = self::get($key);
        if ($value != false) {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }
    public static function alert(string $text, bool $good) {
        $type = ($good) ? 'good' : 'bad';
        self::set('ALERT', ['text' => $text, 'type' => $type]);
    }
    public static function getAlert() {
        return self::get('ALERT');
    }
    public static function unsetAlert() {
        return self::unset('ALERT');
    }
}