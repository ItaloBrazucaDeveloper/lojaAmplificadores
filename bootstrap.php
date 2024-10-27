<?PHP

session_set_cookie_params(0, httponly: true);
session_start();
session_regenerate_id();