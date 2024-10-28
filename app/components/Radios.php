<?PHP

namespace App\components;

class Radios extends Input
{
  private array $opcoes;
  private string $defaultChecked;

  /**
   * @param string $name
   * @param string[] $opcoes
   * @param string $label
   * @param string $defaultChecked
   * @param string[] $inputAttributes
   */
  public function __construct(
    string $name,
    array $opcoes,
    string $defaultChecked = "",
    string $label = "",
    array $inputAttributes = []
  ) {
    parent::__construct(
      name: $name,
      type: "radio",
      placeholder: "",
      label: $label,
      inputAttributes: $inputAttributes
    );
    $this->opcoes = $opcoes;
    $this->defaultChecked = $defaultChecked;
  }

  private function gerar_radios($opcao)
  {
    $id_input = $this->generateId();
    $is_this_checked = $this->defaultChecked === $opcao;
    $checked_attibute = $is_this_checked ? "checked" : "";
    return "
    <div class='input_radio'>
      <input
        {$checked_attibute}
        type='{$this->getType()}'
        name='{$this->getName()}'
        id='{$id_input}'
        value='{$opcao}'
        {$this->renderHtmlAttributes()}
      />
      <label for='{$id_input}'>{$opcao}</label>
    </div>";
  }

  public function render(): string
  {
    $inputs_radio = [];
    foreach ($this->opcoes as $opcao) {
      array_push($inputs_radio, $this->gerar_radios($opcao));
    }
    return "
      <div class='container_radios'>
        <span>{$this->getLabel()}:</span>
        " . implode("", $inputs_radio) . "  
      </div>
    ";
  }
}