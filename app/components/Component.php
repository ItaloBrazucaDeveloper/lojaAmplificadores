<?PHP

namespace App\components;

abstract class Component
{
  private array $htmlAttributes;

  public function __construct($htmlAttributes = [])
  {
    $this->htmlAttributes = $htmlAttributes;
  }

  public abstract function render(): string;

  protected function generateId(): string
  {
    return uniqid();
  }

  protected function renderHtmlAttributes(): string
  {
    $attributes = array_map(
      fn($key, $value): string => (
        "$key='" . htmlspecialchars($value) . "'"
      ),
      array_keys($this->htmlAttributes),
      $this->htmlAttributes
    );
    return implode("\n", $attributes);
  }
}