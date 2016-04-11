<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class UsersController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for users
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Users', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "userID";

        $users = Users::find($parameters);
        if (count($users) == 0) {
            $this->flash->notice("The search did not find any users");

            $this->dispatcher->forward(array(
                "controller" => "users",
                "action" => "index"
            ));

            return;
        }

        $paginator = new Paginator(array(
            'data' => $users,
            'limit'=> 10,
            'page' => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a user
     *
     * @param string $userID
     */
    public function editAction($userID)
    {
        if (!$this->request->isPost()) {

            $user = Users::findFirstByuserID($userID);
            if (!$user) {
                $this->flash->error("user was not found");

                $this->dispatcher->forward(array(
                    'controller' => "users",
                    'action' => 'index'
                ));

                return;
            }

            $this->view->userID = $user->userID;

            $this->tag->setDefault("userID", $user->userID);
            $this->tag->setDefault("email", $user->email);
            $this->tag->setDefault("password", $user->password);
            $this->tag->setDefault("roleID", $user->roleID);
            
        }
    }

    /**
     * Creates a new user
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "users",
                'action' => 'index'
            ));

            return;
        }

        $user = new Users();
        $user->email = $this->request->getPost("email", "email");
        $user->password = $this->request->getPost("password");
        $user->roleID = $this->request->getPost("roleID");
        

        if (!$user->save()) {
            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "users",
                'action' => 'new'
            ));

            return;
        }

        $this->flash->success("user was created successfully");

        $this->dispatcher->forward(array(
            'controller' => "users",
            'action' => 'index'
        ));
    }

    /**
     * Saves a user edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "users",
                'action' => 'index'
            ));

            return;
        }

        $userID = $this->request->getPost("userID");
        $user = Users::findFirstByuserID($userID);

        if (!$user) {
            $this->flash->error("user does not exist " . $userID);

            $this->dispatcher->forward(array(
                'controller' => "users",
                'action' => 'index'
            ));

            return;
        }

        $user->email = $this->request->getPost("email", "email");
        $user->password = $this->request->getPost("password");
        $user->roleID = $this->request->getPost("roleID");
        

        if (!$user->save()) {

            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "users",
                'action' => 'edit',
                'params' => array($user->userID)
            ));

            return;
        }

        $this->flash->success("user was updated successfully");

        $this->dispatcher->forward(array(
            'controller' => "users",
            'action' => 'index'
        ));
    }

    /**
     * Deletes a user
     *
     * @param string $userID
     */
    public function deleteAction($userID)
    {
        $user = Users::findFirstByuserID($userID);
        if (!$user) {
            $this->flash->error("user was not found");

            $this->dispatcher->forward(array(
                'controller' => "users",
                'action' => 'index'
            ));

            return;
        }

        if (!$user->delete()) {

            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "users",
                'action' => 'search'
            ));

            return;
        }

        $this->flash->success("user was deleted successfully");

        $this->dispatcher->forward(array(
            'controller' => "users",
            'action' => "index"
        ));
    }

}
