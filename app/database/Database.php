<?PHP

namespace App\database;
use mysqli;
use mysqli_result;

class Database
{
  private static mysqli $mySqlConnection;

  public function __construct(
    string $hostname,
    string $username,
    string $userpasswd,
    string $nameDatabase
  ) {
    $this->hostname = $hostname;
    $this->username = $username;
    $this->userpasswd = $userpasswd;
    $this->nameDatabase = $nameDatabase;
  }

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

  private static function extractConditionsColumns(array $columns): string
  {
    $columnsStringKeys = array_filter(
      array: $columns,
      callback: function ($key) use ($columns): bool {
        $isKeyStringType = gettype($key) === "string";
        return $isKeyStringType ? $columns[$key] : false;
      },
      mode: ARRAY_FILTER_USE_KEY
    );

    if (count($columnsStringKeys) > 0) {
      $conditionsOfColumns = array_map(
        callback: fn($key, $value): string => "{$key} = '{$value}'",
        array: array_keys($columnsStringKeys),
        arrays: $columnsStringKeys
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
    string $limit = "10"
  ): bool|mysqli_result {
    $conditions = "";

    if (is_array($columns)) {
      $conditions = self::extractConditionsColumns($columns);
      $columns = implode(", ", $columns);
    }

    $selectQuery = "
      SELECT {$columns}
      FROM `{$tableName}`
      
    ";

    return self::$mySqlConnection->query($selectQuery);
  }

  public static function delete(): bool
  {

  }

}