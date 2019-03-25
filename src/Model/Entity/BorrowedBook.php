<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BorrowedBook Entity
 *
 * @property int $id
 * @property float|null $fine
 * @property bool|null $is_returned
 * @property int $user_id
 * @property int $book_id
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property \Cake\I18n\FrozenTime|null $modified_at
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Book $book
 */
class BorrowedBook extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'fine' => true,
        'is_returned' => true,
        'user_id' => true,
        'book_id' => true,
        'created_at' => true,
        'modified_at' => true,
        'user' => true,
        'book' => true
    ];
}
