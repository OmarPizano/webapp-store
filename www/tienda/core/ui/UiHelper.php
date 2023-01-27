<?
namespace tienda\core\ui;
use tienda\core\Session;

class UiHelper
{
    /**
     * Si hay una alerta activa, la muestra.
     * Elimina la alerta inmediatamente después de mostrarla.
     */
    public static function checkAlert() {
        $alert = Session::getAlert();
        if ($alert != false) {
            Alert::show($alert['text'], $alert['type']);
            Session::unsetAlert();
        }
    }
}