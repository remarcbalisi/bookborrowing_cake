<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Borrowed Books'), ['controller' => 'BorrowedBooks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Borrowed Book'), ['controller' => 'BorrowedBooks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Middle Name') ?></th>
            <td><?= h($user->middle_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($user->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified At') ?></th>
            <td><?= h($user->modified_at) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Borrowed Books') ?></h4>
        <?php if (!empty($user->borrowed_books)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Fine') ?></th>
                <th scope="col"><?= __('Is Returned') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Book Id') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Modified At') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->borrowed_books as $borrowedBooks): ?>
            <tr>
                <td><?= h($borrowedBooks->id) ?></td>
                <td><?= h($borrowedBooks->fine) ?></td>
                <td><?= h($borrowedBooks->is_returned) ?></td>
                <td><?= h($borrowedBooks->user_id) ?></td>
                <td><?= h($borrowedBooks->book_id) ?></td>
                <td><?= h($borrowedBooks->created_at) ?></td>
                <td><?= h($borrowedBooks->modified_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BorrowedBooks', 'action' => 'view', $borrowedBooks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BorrowedBooks', 'action' => 'edit', $borrowedBooks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BorrowedBooks', 'action' => 'delete', $borrowedBooks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $borrowedBooks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
