<?PHP

namespace App\Helpers;

class DataHygiene
{
  public static function isEmptyString(string ...$datas): bool
  {
    foreach ($datas as $data) {
      if ($data === "" || $data === null)
        $hasEmptyString = true;
      break;
    }
    return $hasEmptyString ?? false;
  }

  public static function toLowerCase(string $words): string
  {
    return strtolower($words);
  }
}