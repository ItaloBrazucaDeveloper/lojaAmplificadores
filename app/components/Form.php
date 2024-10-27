<?PHP

namespace App\components;

class Form extends Component
{
  private string $method;
  private string $action;
  private string $enctype;
  private string $submitButtonText;
  /** @var Input[]  */
  private array $inputs;

  public function __construct(
    string $method,
    string $action,
    array $inputs,
    string $enctype = "",
    string $submitButtonText = "Enviar",
    array $htmlAttibutes = []
  ) {
    parent::__construct($htmlAttibutes);
    $this->action = $action;
    $this->method = $method;
    $this->enctype = $enctype;
    $this->submitButtonText = $submitButtonText;
    $this->inputs = $inputs;
  }

  private function renderedInputs(): array
  {
    return array_map(
      callback: fn($input): string => $input->render(),
      array: $this->inputs
    );
  }

  public function render(): string
  {
    return "
      <form
        action='{$this->action}'
        method='{$this->method}'
      >
        " . implode("", $this->renderedInputs()) . "
        <button type='submit'>{$this->submitButtonText}</button>
      </form>
    ";
  }
}