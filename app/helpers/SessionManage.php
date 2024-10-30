<?PHP

namespace App\Helpers;

class SessionManage
{
  public static function startSession()
  {
    session_set_cookie_params(0, httponly: true);
    session_start();
    session_regenerate_id();
  }

  public static function setSession(string $key, string $value)
  {
    $_SESSION[$key] = $value;
  }

  public static function getSession(string $key): mixed|null
  {
    return $_SESSION[$key] ?? null;
  }

  public static function destroySession()
  {
    session_destroy();
    $_SESSION = [];
    unset($_SESSION);
  }
}