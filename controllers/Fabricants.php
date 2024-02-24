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
            $this->redirectWithMessage("Fabricant " .$fabricant. " bien ajouté", "success");
        } else {
            header("Location: " . PATH . "/fabricants");
        }
    }

    public function updateFabricant(): void
    {
        if (!empty($_POST['updatedFabricant'])) {
            $currentFabricantId = htmlentities($_POST['id']);
            $updatedFabricant = htmlentities($_POST['updatedFabricant']);
            $this->loadModel("Fabricant");
            $this->Fabricant->update($currentFabricantId, $updatedFabricant);
            // $allColors = $this->Couleur->getAll();
            $this->redirectWithMessage('Fabricant ' .$updatedFabricant. ' bien modifié', 'info');
        }
    }

    public function deleteFabricant(int $id): void
    {
        $this->loadModel("Fabricant");
        $this->Fabricant->delete(htmlentities($id));
        $this->redirectWithMessage('Fabricant ' .$id. ' bien supprimé', 'danger');
    }


    private function redirectWithMessage($message, $type_message = null): void
    {
        $this->loadModel("Fabricant");
        $allFabricants = $this->Fabricant->getAll();
        $btnId = "btnFabricant";
        $this->render('index', compact('allFabricants', 'message', 'type_message', 'btnId'));
    }
}
