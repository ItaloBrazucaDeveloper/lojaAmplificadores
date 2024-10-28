<?PHP

namespace App\components;

class DialogForm extends Form
{
  private string $dataAction;
  private string $title;
  private string $description;

  public function setDataAction(string $dataAction): void
  {
    $this->dataAction = $dataAction;
  }

  public function __construct(
    string $dataAction = "create",
    string $method,
    string $action,
    array $inputs,
    string $title = "",
    string $description = "",
    string $enctype = '',
    string $submitButtonText = 'Enviar',
    array $htmlAttibutes = []
  ) {
    parent::__construct(
      method: $method,
      action: $action,
      inputs: $inputs,
      enctype: $enctype,
      submitButtonText: $submitButtonText,
      htmlAttibutes: $htmlAttibutes
    );
    $this->dataAction = $dataAction;
    $this->title = $title;
    $this->description = $description;
  }

  public function render($hasCancelButton = false): string
  {
    return "
      <dialog
        class='dialog-form'
        data-action='{$this->dataAction}'
      >
        <h3>
          {$this->title}
          <span>
            {$this->description}
          </span>
        </h3>
        " . parent::render($hasCancelButton) . "
      </dialog>
    ";
  }
}