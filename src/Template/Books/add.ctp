<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Books'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Borrowed Books'), ['controller' => 'BorrowedBooks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Borrowed Book'), ['controller' => 'BorrowedBooks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="books form large-9 medium-8 columns content">
    <?= $this->Form->create($book) ?>
    <fieldset>
        <legend><?= __('Add Book') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('description');
            echo $this->Form->control('count');
            echo $this->Form->control('author');
            echo $this->Form->control('publisher');
            echo $this->Form->control('category');
            echo $this->Form->control('created_at', ['empty' => true]);
            echo $this->Form->control('modified_at', ['empty' => true]);
            echo $this->Form->control('slug');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
