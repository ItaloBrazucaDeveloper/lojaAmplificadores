<?PHP

namespace App\components;

class Table
{
  private function renderTableHeader(array $headers): string
  {
    $tableHeader = implode(
      separator: "",
      array: array_map(
        callback: fn($header): string => "<th>{$header}</th>",
        array: $headers
      )
    );
    return "<tr>{$tableHeader}</tr>";
  }

  private function renderTableRow(array $row): string
  {
    $tableRow = implode(
      separator: "",
      array: array_map(
        callback: fn($cell): string => "<td>{$cell}</td>",
        array: $row
      )
    );
    return "<tr>{$tableRow}</tr>";
  }

  public function render(array $headers, array $rows): string
  {
    $tableHeader = $this->renderTableHeader($headers);
    $tableRows = implode(
      separator: "",
      array: array_map(
        callback: fn($row): string => $this->renderTableRow($row),
        array: $rows
      )
    );
    return "
      <table>
        <thead>{$tableHeader}</thead>
        <tbody>{$tableRows}</tbody>
      </table>
    ";
  }
}