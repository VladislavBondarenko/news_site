<?php

abstract class AdminBase
{
    public static function checkAdmin() {
        if (!User::checkAdmin()) {
            die('Access denied');
        }
    }
}
