<?php

namespace tienda\core\ui;

class UserInfo
{
    public static function userInfo(
        string $profile_href,
        string $profile_img,
        string $username) {
            echo sprintf('
            <a class="user-profile" href="%s">
                <img src="%s" alt="profile">
                <p>%s</p>
            </a>
            ', $profile_href, $profile_img, $username);
    }
}