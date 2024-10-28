<?PHP

namespace App\components;

class Input extends Component
{
  private string $name;
  private string $label;
  private string $placeholder;
  private string $type;

  public function getName(): string
  {
    return $this->name;
  }

  public function setName(string $name): void
  {
    $this->name = $name;
  }

  public function getLabel(): string
  {
    return $this->label;
  }

  public function setLabel(string $label): void
  {
    $this->label = $label;
  }

  public function getPlaceholder(): string
  {
    return $this->placeholder;
  }

  public function setPlaceholder(string $placeholder): void
  {
    $this->placeholder = $placeholder;
  }

  public function getType(): string
  {
    return $this->type;
  }

  public function setType(string $type): void
  {
    $this->type = $type;
  }

  /**
   * @param string $name
   * @param string $type
   * @param string $label
   * @param string $placeholder
   * @param string[] $inputAttributes
   */
  public function __construct(
    string $name,
    string $type = "text",
    string $placeholder = "",
    string $label = "",
    array $inputAttributes = []
  ) {
    parent::__construct($inputAttributes);
    $this->type = $type;
    $this->name = $name;
    $this->label = $label;
    $this->placeholder = $placeholder;
  }

  public function render(): string
  {
    $inputId = $this->generateId();
    $hasPlaceholder = $this->placeholder !== "";
    $midClassName = $hasPlaceholder ? "_with_placeholder_" : "_";
    $className = "input{$midClassName}container";

    return "
      <div class='{$className}'>
        <label for='{$inputId}'>
          {$this->label}
        </label>
        <input
          type='{$this->type}'
          name='{$this->name}'
          id='{$inputId}'
          placeholder='{$this->placeholder}'
          {$this->renderHtmlAttributes()}
        />
      </div>
    ";
  }
}