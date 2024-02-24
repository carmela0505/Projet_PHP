<?php

class Bieres extends Controller
{
    protected Model $Biere;

    public function index(): void
    {
        $this->loadModel("Biere");
        $allBieres = $this->Biere->getAll();
        $btnId = "btnBiere";
        $this->render('index', compact('allBieres','btnId'));
    }

    public function edit(int $currentBiereId)
    {
        $btnId = "btnBiere";

        $this->render('edit', compact('currentBiereId','btnId'));
    }

    public function newBiere(): void
    {
        $biere = $_POST['biere'];
        if (!empty($_POST['biere'])) {
            $this->loadModel("Biere");
            $this->Biere->insert($biere);
            $this->redirectWithMessage("Biere " .$biere." bien ajoutée", "success");
        } else {
            header("Location: " . PATH . "/bieres");
        }
    }

    public function updateBiere(): void
    {
        if (!empty($_POST['updatedBiere'])) {
            $currentBiereId = htmlentities($_POST['id']);
            $updatedBiere = htmlentities($_POST['updatedBiere']);
            $this->loadModel("Biere");
            $this->Biere->update($currentBiereId, $updatedBiere);
            $this->redirectWithMessage('Biere ' .$updatedBiere. ' bien modifiée', 'info');
        }
    }

    public function deleteBiere(int $id): void
    {
        $this->loadModel("Biere");
        $this->Biere->delete($id);
        $this->redirectWithMessage('Biere ' .$id. ' bien supprimée', 'danger');
    }


    private function redirectWithMessage($message, $type_message = null): void
    {
        $this->loadModel("Biere");
        $allBieres = $this->Biere->getAll();
        $btnId = "btnBiere";
        $this->render('index', compact('allBieres', 'message', 'type_message','btnId'));
    }
}
