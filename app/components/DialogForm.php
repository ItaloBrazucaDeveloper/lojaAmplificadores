<?PHP

namespace App\components;

class DialogForm extends Form
{
  public function render(): string
  {
    return "
      <dialog class='dialog-form'>
        <h3>
          Cadastro de funcionários
          <span>
            Cadastre funcionários no sistema!
          </span>
        </h3>
        " . parent::render() . "
      </dialog>
    ";
  }
}