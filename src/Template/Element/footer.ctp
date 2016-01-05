<footer>
    Developed and designed by <?= $this->Text->toList(\Cake\Core\Configure::read('Website.authors')) ?><br>
    Powered by
    <?= $this->Html->link('CakePHP', 'http://cakephp.org/', ['target' => '_blank']) ?>,
    <?= $this->Html->link('FontAwesome', 'http://fortawesome.github.io/Font-Awesome/', ['target' => '_blank']) ?>,
    <?= $this->Html->link('Foundation', 'http://foundation.zurb.com/', ['target' => '_blank']) ?>,
    <?= $this->Html->link('Bootstrap', 'http://getbootstrap.com/', ['target' => '_blank']) ?>.
</footer>