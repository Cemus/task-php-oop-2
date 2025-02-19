<?php
class ViewDeco implements interfaceView{
    public function displayView():string{
    ob_start();
    ?>
            <section>
                <h1>Vous avez été deconnecté, redirection en cours...</h1>
            </section>
    <?php
        return ob_get_clean();
    }
}