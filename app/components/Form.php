<?PHP

namespace App\components;

class Form extends Component
{
  private string $method;
  private string $action;
  private string $enctype;
  private string $submitButtonText;
  /** @var array<Input|Radio|Select  */
  private array $inputs;

  public function setMethod(string $method): void
  {
    $this->method = $method;
  }

  public function setAction(string $action): void
  {
    $this->action = $action;
  }

  public function setInputs(array $inputs): void
  {
    $this->inputs = $inputs;
  }

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

  public function render($hasCancelButton = false): string
  {
    return "
      <form
        action='{$this->action}'
        method='{$this->method}'
        enctype='{$this->enctype}'
      >
        " .
          implode("", $this->renderedInputs())
        . "
        <footer class='form-buttons'>
          " . (
            $hasCancelButton ?
            "<button type='button' class='cancel-button'>Cancelar</button>" : ""
          ) . "
          <button type='submit'>{$this->submitButtonText}</button>
        </footer>
      </form>
    ";
  }
}