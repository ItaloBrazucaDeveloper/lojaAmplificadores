<?PHP

namespace App\Components;

class Select extends Input
{
  /** @var string[] */
  private array $opcoes;
  private bool $default_selected;

  public function __construct(
    string $name,
    array $options,
    string $label = "",
    array $inputAttributes = []
  ) {
    parent::__construct(
      name: $name,
      type: "select",
      placeholder: "",
      label: $label,
      inputAttributes: $inputAttributes
    );
    $this->opcoes = $options;
  }

  private function gerar_opcoes(mixed $opcao, mixed $valor = ""): string
  {
    if (gettype($opcao) == "integer") {
      $opcao = $valor;
    }
    return "
      <option value='{$valor}'>
        {$opcao}
      </option>
    ";
  }

  public function render(): string
  {
    $inputs_options = [];
    foreach ($this->opcoes as $opcao => $valor) {
      array_push($inputs_options, $this->gerar_opcoes($opcao, $valor));
    }
    $id_select = $this->generateId();
    return "
      <div>
        <label for='{$id_select}'>
          {$this->getLabel()}
        </label>
        <select name={$this->getName()} id='{$id_select}'>
          " . implode("", $inputs_options) . "
        </select>
      </div>
    ";
  }
}