<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?= $this->Html->charset() ?>
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= \Cake\Core\Configure::read('Website.title') ?> - <?= strip_tags($this->fetch('title')) ?>
    </title>

    <?= $this->Html->css(['base', 'cake'/*, 'foundation'*/, 'font-awesome', 'style']) ?>
    <?= $this->fetch('css') ?>
</head>
<body>
    <?= $this->element('header') ?>
    <?= $this->element('nav') ?>
    <?= $this->Flash->render() ?>
    <section class="container clearfix">
        <?= $this->fetch('content') ?>
    </section>
    <?= $this->element('footer') ?>
    <?= $this->fetch('script') ?>
</body>
</html>
