<?php

namespace tienda\core\ui;

class UserInfo
{
    public static function userActions(
        string $cart_href,
        string $cart_text,
        string $exit_href,
        string $exit_text ) {
            echo sprintf('
            <div id="user-actions">
                <a href="%s">%s</a>
                <a href="%s">%s</a>
            </div>
            ', $cart_href, $cart_text, $exit_href, $exit_text);
    }
    public static function userInfo(
        string $profile_href,
        string $profile_img,
        string $username) {
            echo sprintf('
            <div id="user-img">
                <a href="%s"><img src="%s" alt="profile"></a>
                <p>%s</p>
            </div>
            ', $profile_href, $profile_img, $username);
    }
}