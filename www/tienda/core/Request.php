<?
namespace tienda\core;

abstract class Request
{
    public static function getMvcArray()
    { 
        $path = $_SERVER['REQUEST_URI'] ?? false;
        if ($path === false) {
            return false;
        } else {
            $position = strpos($path, '?');
            if ($position != false) {
                $path = substr($path, 0, $position);
            }
            $array = explode('/', trim($path, '/'));
            if (strlen($array[0]) == 0) {
                return false;
            }
            $mvc['controller'] = (isset($array[0])) ? $array[0] : false;
            $mvc['action'] = (isset($array[1])) ? $array[1] : false;
            return $mvc;
        }
    }
}