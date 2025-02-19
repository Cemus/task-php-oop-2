<?php
class ViewError implements interfaceView{
    public function displayView():string{
    ob_start();
    ?>
            <section>
                <h1>Erreur ! Page non trouvée...</h1>
            </section>
    <?php
        return ob_get_clean();
    }
}