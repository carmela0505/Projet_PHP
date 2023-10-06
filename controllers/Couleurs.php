
<?php

class Couleurs extends Controller
{
    protected Model $Couleur;

    public function index(): void
    {
        $this->loadModel("Couleur");
        $allColors = $this->Couleur->getAll();
        $btnId = "btnCouleurs";
        $this->render('index', compact('allColors','btnId'));
    }

    public function edit(int $currentColorId)
    {
        $btnId = "btnCouleurs";

        $this->render('edit', compact('currentColorId','btnId'));
    }

    public function newColor(): void
    {
        $couleur = $_POST['couleur'];
        if (!empty($_POST['couleur'])) {
            $this->loadModel("Couleur");
            $this->Couleur->insert($couleur);
            $this->redirectWithMessage("Couleur bien ajoutée", "success");
        } else {
            header("Location: " . PATH . "/couleurs");
        }
    }

    public function updateColor(): void
    {
        if (!empty($_POST['updatedColor'])) {
            $currentColorId = $_POST['id'];
            $updatedColor = $_POST['updatedColor'];
            $this->loadModel("Couleur");
            $this->Couleur->update($currentColorId, $updatedColor);
            $this->redirectWithMessage('Couleur bien modifiée', 'info');
        }
    }

    public function deleteColor(int $id): void
    {
        $this->loadModel("Couleur");
        $this->Couleur->delete($id);
        $this->redirectWithMessage('Couleur bien supprimée', 'danger');
    }


    private function redirectWithMessage($message, $type_message = null): void
    {
        $this->loadModel("Couleur");
        $allColors = $this->Couleur->getAll();
        $btnId = "btnCouleurs";
        $this->render('index', compact('allColors', 'message', 'type_message','btnId'));
    }
}
