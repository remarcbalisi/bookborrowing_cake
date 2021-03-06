<?php
namespace App\Controller\Student;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout']);
        $this->loadModel('Roles');
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $role = $this->Roles->find('all')->where([
                    'id' => $this->Auth->user('role_id')
                ])->first();
                return $this->redirect('/'. $role->slug .'/users/home');
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }


    public function isAuthorized($user)
    {
        $role = $this->Roles->find('all')->where([
            'id' => $this->Auth->user('role_id')
        ])->first();

        if( $role->slug == 'student' ) {
            return true;
        }else{
            return false;
        }

        // return parent::isAuthorized($user);
    }

    public function home()
    {
        $this->paginate = [
            'contain' => ['Roles']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

}
