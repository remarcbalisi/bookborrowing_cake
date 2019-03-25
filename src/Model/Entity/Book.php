<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Book Entity
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property int|null $count
 * @property string|null $author
 * @property string|null $publisher
 * @property string|null $category
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property \Cake\I18n\FrozenTime|null $modified_at
 * @property string|null $slug
 *
 * @property \App\Model\Entity\BorrowedBook[] $borrowed_books
 */
class Book extends Entity
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
        'title' => true,
        'description' => true,
        'count' => true,
        'author' => true,
        'publisher' => true,
        'category' => true,
        'created_at' => true,
        'modified_at' => true,
        'slug' => true,
        'borrowed_books' => true
    ];
}
