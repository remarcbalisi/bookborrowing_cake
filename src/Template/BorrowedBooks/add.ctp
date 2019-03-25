<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BorrowedBook $borrowedBook
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Borrowed Books'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="borrowedBooks form large-9 medium-8 columns content">
    <?= $this->Form->create($borrowedBook) ?>
    <fieldset>
        <legend><?= __('Add Borrowed Book') ?></legend>
        <?php
            echo $this->Form->control('fine');
            echo $this->Form->control('is_returned');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('book_id', ['options' => $books]);
            echo $this->Form->control('created_at', ['empty' => true]);
            echo $this->Form->control('modified_at', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
