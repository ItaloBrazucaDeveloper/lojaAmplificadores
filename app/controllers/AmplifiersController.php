<?PHP

namespace App\controllers;
use App\models\AmplifiersModel;
use App\components\Input;
use App\components\Select;

class AmplifiersController
{
  public function index()
  {
    [$headers, $rows] = $this->list();
    require "app/views/amplifiers.php";
  }

  public function createForm()
  {
    $session = "Amplificadores";
    $method = "POST";
    $action = "";
    $enctype = "multipart/form-data";
    $inputs = [
      new Input(
        name: "brand",
        placeholder: "Marca",
        inputAttributes: [
          "required" => true,
          "autofocus" => true,
        ]
      ),
      new Input(
        name: "model",
        placeholder: "Modelo",
        inputAttributes: [
          "required" => true,
        ]
      ),
      new Input(
        name: "price",
        placeholder: "Preço",
        inputAttributes: [
          "required" => true,
        ]
      ),
      new Input (
        name: "photo",
        type: "file",
        inputAttributes: [
          "accept" => "image/*",
          "required" => true,
        ]
      ),
      new Select(
        name: "type",
        label: "Tipo",
        opcoes: [
          "Guitarra",
          "Violão",
          "Baixo"
        ],
        inputAttributes: [
          "required" => true,
        ]
      ),
    ];
    require "app/views/create_form.php";
  }

  public function editForm()
  {
    require "app/views/edit_form.php";
  }

  private function list(): array
  {
    $response = AmplifiersModel::getAmplifiers();
    
    $headers = [
      "N°",
      "Marca",
      "Tipo",
      "Modelo",
      "Preço",
      "Editar"
    ];

    $amplifiersData = [];
    while ($amplifiersTableRow = $response->fetch_assoc()) {
      $amplifiersData[] = $amplifiersTableRow;
    }

    return [
      $headers,
      $amplifiersData
    ];
  }

  private function storePhotoOnTheServer(array $photoFile): string|null
  {
    $destinyFolder = "assets/images/";
    $extensionFile = pathinfo($photoFile["name"], PATHINFO_EXTENSION);

    $uniqueIdentificator = uniqid();
    $newFileName = "{$uniqueIdentificator}.{$extensionFile}";

    $isMoved = move_uploaded_file(
      $photoFile["tmp_name"],
      $destinyFolder.$newFileName
    );

    return $isMoved ? $destinyFolder.$newFileName : null;
  }
  
  public function create()
  {
    [
      "brand" => $brand,
      "model" => $model,
      "price" => $price,
      "type" => $type
    ] = $_POST;

    $tempFilePath = $_FILES["photo"];
    $newPathFile = $this->storePhotoOnTheServer($tempFilePath);

    if ($newPathFile) {
      $isCreated = AmplifiersModel::createAmplifiers(
        amplifier: [
          $brand,
          $model,
          $price,
          $type,
          $newPathFile
        ]
      );
    }

    $successQueyUri = $isCreated ? "true" : "false";
    header("Location: ?success={$successQueyUri}");
    exit;
  }
}