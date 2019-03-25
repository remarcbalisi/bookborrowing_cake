<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BorrowedBook $borrowedBook
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Borrowed Book'), ['action' => 'edit', $borrowedBook->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Borrowed Book'), ['action' => 'delete', $borrowedBook->id], ['confirm' => __('Are you sure you want to delete # {0}?', $borrowedBook->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Borrowed Books'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Borrowed Book'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="borrowedBooks view large-9 medium-8 columns content">
    <h3><?= h($borrowedBook->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $borrowedBook->has('user') ? $this->Html->link($borrowedBook->user->id, ['controller' => 'Users', 'action' => 'view', $borrowedBook->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Book') ?></th>
            <td><?= $borrowedBook->has('book') ? $this->Html->link($borrowedBook->book->title, ['controller' => 'Books', 'action' => 'view', $borrowedBook->book->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($borrowedBook->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fine') ?></th>
            <td><?= $this->Number->format($borrowedBook->fine) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($borrowedBook->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified At') ?></th>
            <td><?= h($borrowedBook->modified_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Returned') ?></th>
            <td><?= $borrowedBook->is_returned ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
