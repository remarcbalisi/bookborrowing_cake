<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BorrowedBook[]|\Cake\Collection\CollectionInterface $borrowedBooks
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Borrowed Book'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="borrowedBooks index large-9 medium-8 columns content">
    <h3><?= __('Borrowed Books') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fine') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_returned') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('book_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('borrowed_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified_at') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($borrowedBooks as $borrowedBook): ?>
            <tr>
                <td><?= $this->Number->format($borrowedBook->id) ?></td>
                <td><?= $this->Number->format($borrowedBook->fine) ?></td>
                <td><?= h($borrowedBook->is_returned) ? 'Yes' : 'No' ?></td>
                <td><?= $borrowedBook->has('user') ? $this->Html->link($borrowedBook->user->first_name .' '.$borrowedBook->user->last_name, ['controller' => 'Users', 'action' => 'view', $borrowedBook->user->id]) : '' ?></td>
                <td><?= $borrowedBook->has('book') ? $this->Html->link($borrowedBook->book->title, ['controller' => 'Books', 'action' => 'view', $borrowedBook->book->id]) : '' ?></td>
                <td><?= h($borrowedBook->created_at) ?></td>
                <td><?= h($borrowedBook->modified_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $borrowedBook->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $borrowedBook->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $borrowedBook->id], ['confirm' => __('Are you sure you want to delete # {0}?', $borrowedBook->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
