<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** Fechar div's */
if($this->session->logged_in) {
?>
            </div>
<?php
}
?>
        </div> <!-- fim .row 1 -->
    </div> <!-- fim div .container -->
<?php

/** Exibir footer "interno", apenas se estiver logado */
if($this->session->logged_in) {
?>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-lg-6 text_footer">
                    <h4>Poesias de Monteiro Lobato</h4>

                    <p>
                        – A vida, senhor Visconde, é um pisca-pisca. A gente nasce, isto é, começa a piscar. Quem pára
                        de piscar chegou ao fim, morreu. Piscar é abrir e fechar os olhos – viver é isso. É um dorme e
                        acorda, dorme e acorda, até que dorme e não acorda mais [...]
                        A vida das gentes neste mundo, senhor Sabugo, é isso. Um rosário de piscados. Cada pisco é um
                        dia. Pisca e mama, pisca e brinca, pisca e estuda, pisca e ama, pisca e cria filhos, pisca e
                        geme os reumatismos, e por fim pisca pela última vez e morre.
                        – E depois que morre?, perguntou o Visconde.
                        – Depois que morre, vira hipótese. É ou não é?
                    </p>
                </div>

                <div class="col-xs-6 col-lg-6 text_footer">
                    <h4>Poesias de Monteiro Lobato</h4>

                    <p>Assim como é de cedo que se torce o pepino, também é trabalhando a criança que se consegue boa
                        safra de adultos.</p>

                    <h4>Poesias de Monteiro Lobato</h4>

                    <p>Acho a criatura humana muito mais interessante no período infantil do que depois de idiotamente
                        tornar-se adulta.</p>
                </div>
            </div>
            <hr/>
            <p id="company"><?php
                echo anchor('https://github.com/Ricardo-Costa/TAREFA-DE-CASA/blob/master/README.md', SYS_TITLE, array('target' => '_BLANK'));
                echo '<br/> Code licensed under ';
                echo anchor('https://github.com/Ricardo-Costa/TAREFA-DE-CASA/blob/master/LICENSE', 'MIT', array('target' => '_BLANK'));
                echo '<br/>' . date('Y');
                ?></p>
        </div>
    </footer>
    <?php
}
?>
</body>
</html>