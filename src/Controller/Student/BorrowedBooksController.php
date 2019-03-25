<?php
namespace App\Controller\Student;

use App\Controller\AppController;

/**
 * BorrowedBooks Controller
 *
 * @property \App\Model\Table\BorrowedBooksTable $BorrowedBooks
 *
 * @method \App\Model\Entity\BorrowedBook[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BorrowedBooksController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Roles');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Books']
        ];
        $borrowedBooks = $this->paginate($this->BorrowedBooks);

        $this->set(compact('borrowedBooks'));
    }

    /**
     * View method
     *
     * @param string|null $id Borrowed Book id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $borrowedBook = $this->BorrowedBooks->get($id, [
            'contain' => ['Users', 'Books']
        ]);

        $this->set('borrowedBook', $borrowedBook);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $borrowedBook = $this->BorrowedBooks->newEntity();
        if ($this->request->is('post')) {
            $borrowedBook = $this->BorrowedBooks->patchEntity($borrowedBook, $this->request->getData());
            if ($this->BorrowedBooks->save($borrowedBook)) {
                $this->Flash->success(__('The borrowed book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The borrowed book could not be saved. Please, try again.'));
        }
        
        $student_role = $this->Roles->find('all')->where([
            'slug' => 'student'
        ])->first();

        if( !empty($student_role) )
        {
            $users = $this->BorrowedBooks->Users->find('all', ['limit' => 200])->where([
                'role_id' => $student_role->id,
            ]);
        }

        else
        {
            $users = $this->BorrowedBooks->Users->find('all', ['limit' => 200]);
        }

        $books = $this->BorrowedBooks->Books->find('list', ['limit' => 200]);
        $this->set(compact('borrowedBook', 'users', 'books'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Borrowed Book id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $borrowedBook = $this->BorrowedBooks->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $borrowedBook = $this->BorrowedBooks->patchEntity($borrowedBook, $this->request->getData());
            if ($this->BorrowedBooks->save($borrowedBook)) {
                $this->Flash->success(__('The borrowed book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The borrowed book could not be saved. Please, try again.'));
        }

        $student_role = $this->Roles->find('all')->where([
            'slug' => 'student'
        ])->first();

        if( !empty($student_role) )
        {
            $users = $this->BorrowedBooks->Users->find('all', ['limit' => 200])->where([
                'role_id' => $student_role->id,
            ]);
        }

        else
        {
            $users = $this->BorrowedBooks->Users->find('all', ['limit' => 200]);
        }

        $books = $this->BorrowedBooks->Books->find('list', ['limit' => 200]);
        $this->set(compact('borrowedBook', 'users', 'books'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Borrowed Book id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $borrowedBook = $this->BorrowedBooks->get($id);
        if ($this->BorrowedBooks->delete($borrowedBook)) {
            $this->Flash->success(__('The borrowed book has been deleted.'));
        } else {
            $this->Flash->error(__('The borrowed book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $role = $this->Roles->find('all')->where([
            'id' => $this->Auth->user('role_id')
        ])->first();

        if( $role->slug == 'librarian' ) {
            return true;
        }else{
            return false;
        }

    }

}
