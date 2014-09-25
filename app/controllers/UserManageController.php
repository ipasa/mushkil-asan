<?php

class UserManageController extends BaseController {
    public function getregisterUser() {
        return View::make('users.register');
    }

    public function getloginUser() {
        return View::make('users.login');
    }
}