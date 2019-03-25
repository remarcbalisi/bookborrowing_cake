<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BorrowedBook $borrowedBook
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $borrowedBook->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $borrowedBook->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Borrowed Books'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="borrowedBooks form large-9 medium-8 columns content">
    Borrowed By: <?php echo $borrowedBook->user->first_name. ' ' . $borrowedBook->user->last_name;  ?>
    <?= $this->Form->create($borrowedBook) ?>
    <fieldset>
        <legend><?= __('Edit Borrowed Book') ?></legend>
        <?php
            echo $this->Form->control('fine');
            echo $this->Form->control('is_returned');
            echo $this->Form->control('book_id', ['options' => $books]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
