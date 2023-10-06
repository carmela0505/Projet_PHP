<?php

class Fabricants extends Controller
{
    protected Model $Fabricant;

    public function index(): void
    {
        $this->loadModel("Fabricant");
        $allFabricants = $this->Fabricant->getAll();
        $btnId = "btnFabricant";
        $this->render('index', compact('allFabricants','btnId'));
    }

    public function edit(int $currentFabricantId)
    {
        $btnId = "btnFabricant";
        $this->render('edit', compact('currentFabricantId','btnId'));
    }

    public function newFabricant(): void
    {
        $fabricant = $_POST['fabricant'];
        if (!empty($_POST['fabricant'])) {
            $this->loadModel("Fabricant");
            $this->Fabricant->insert($fabricant);
            $this->redirectWithMessage("Fabricant bien ajouté", "success");
        } else {
            header("Location: " . PATH . "/fabricants");
        }
    }

    public function updateFabricant(): void
    {
        if (!empty($_POST['updatedFabricant'])) {
            $currentFabricantId = $_POST['id'];
            $updatedFabricant = $_POST['updatedFabricant'];
            $this->loadModel("Fabricant");
            $this->Fabricant->update($currentFabricantId, $updatedFabricant);
            // $allColors = $this->Couleur->getAll();
            $this->redirectWithMessage('Fabricant bien modifié', 'info');
        }
    }

    public function deleteFabricant(int $id): void
    {
        $this->loadModel("Fabricant");
        $this->Fabricant->delete($id);
        $this->redirectWithMessage('Fabricant bien supprimé', 'danger');
    }


    private function redirectWithMessage($message, $type_message = null): void
    {
        $this->loadModel("Fabricant");
        $allFabricants = $this->Fabricant->getAll();
        $btnId = "btnFabricant";
        $this->render('index', compact('allFabricants', 'message', 'type_message', 'btnId'));
    }
}
