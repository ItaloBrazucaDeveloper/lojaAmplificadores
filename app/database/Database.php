<?PHP

namespace App\database;
use mysqli, mysqli_result;

class Database
{
  private static mysqli $mySqlConnection;

  public static function connect(
    string $hostName = "localhost",
    string $userName,
    string $userPasswd,
    string $databaseName
  ): bool|mysqli {
    self::$mySqlConnection = mysqli_connect(
      hostname: $hostName,
      username: $userName,
      password: $userPasswd,
      database: $databaseName
    );
    return self::$mySqlConnection;
  }

  public static function close(): bool
  {
    return mysqli_close(self::$mySqlConnection);
  }

  private static function prepareStatement(string $query = ""): bool
  {
    /* $stmt = $this->mySqlConnection->prepare($query);
    $stmt->bind_param("ss", $username, $password); */
  }

  private static function setConditions(array $conditions): string
  {
    if (count($conditions) > 0) {
      $conditionsOfColumns = array_map(
        callback: fn($key): string => "{$key} = '{$conditions[$key]}'",
        array: array_keys($conditions)
      );

      $conditionsOfColumns = implode(" AND ", $conditionsOfColumns);
    }
    return $conditionsOfColumns ?? "";
  }

  public static function create(): bool
  {

  }

  public static function update(): bool
  {

  }

  public static function read(
    string $tableName,
    array|string $columns = "*",
    array $conditions = []
  ): bool|mysqli_result {
    if (is_array($columns))
      $columns = implode(", ", $columns);

    $conditions = self::setConditions($conditions);

    $selectQuery = "
      SELECT {$columns}
      FROM `{$tableName}`
      " . ($conditions ? "WHERE {$conditions}" : "");

    return self::$mySqlConnection->query($selectQuery) ?? [];
  }

  public static function delete(): bool
  {

  }

}