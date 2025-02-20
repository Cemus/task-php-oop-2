<?php
class ViewCategory implements interfaceView{
    private string $message;

    

    
    public function displayView():string{
    ob_start();
    ?>
        <h1>Accueil</h1>
        <h1>Ajouter une catégorie</h1>
        <form action="" method="post">
                <label for="name">Saisir le nom de la catégorie</label>
                <input type="text" name="name">
                <input type="submit" value="ajouter" name="submit">
            </form>
            <?= $this->message ?>
    <?php
        return ob_get_clean();
    }

    public function getMessage(): string { return $this->message; }
    public function setMessage(string $message): self { $this->message = $message; return $this; }
}