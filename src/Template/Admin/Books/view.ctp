<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Book'), ['action' => 'edit', $book->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Book'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Books'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Borrowed Books'), ['controller' => 'BorrowedBooks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Borrowed Book'), ['controller' => 'BorrowedBooks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="books view large-9 medium-8 columns content">
    <h3><?= h($book->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($book->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td><?= h($book->author) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Publisher') ?></th>
            <td><?= h($book->publisher) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= h($book->category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($book->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($book->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Count') ?></th>
            <td><?= $this->Number->format($book->count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($book->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified At') ?></th>
            <td><?= h($book->modified_at) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($book->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Borrowed Books') ?></h4>
        <?php if (!empty($book->borrowed_books)): ?>
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
            <?php foreach ($book->borrowed_books as $borrowedBooks): ?>
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
