<?php
declare(strict_types=1);



use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model;


class EpisodesController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        //
    }

    /**
     * Searches for episodes
     */
    public function searchAction()
    {
        $numberPage = $this->request->getQuery('page', 'int', 1);
        $parameters = Criteria::fromInput($this->di, 'Episodes', $_GET)->getParams();
        $parameters['order'] = "idepisodes";

        $paginator   = new Model(
            [
                'model'      => 'Episodes',
                'parameters' => $parameters,
                'limit'      => 10,
                'page'       => $numberPage,
            ]
        );

        $paginate = $paginator->paginate();

        if (0 === $paginate->getTotalItems()) {
            $this->flash->notice("The search did not find any episodes");

            $this->dispatcher->forward([
                "controller" => "episodes",
                "action" => "index"
            ]);

            return;
        }

        $this->view->page = $paginate;
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {
        //
    }

    /**
     * Edits a episode
     *
     * @param string $idepisodes
     */
    public function editAction($idepisodes)
    {
        if (!$this->request->isPost()) {
            $episode = Episodes::findFirstByidepisodes($idepisodes);
            if (!$episode) {
                $this->flash->error("episode was not found");

                $this->dispatcher->forward([
                    'controller' => "episodes",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->idepisodes = $episode->getIdepisodes();

            $this->tag->setDefault("idepisodes", $episode->getIdepisodes());
            $this->tag->setDefault("name", $episode->getName());
            $this->tag->setDefault("episode", $episode->getEpisode());
            $this->tag->setDefault("air_date", $episode->getAirDate());
            $this->tag->setDefault("sinopsis", $episode->getSinopsis());

        }
    }

    /**
     * Creates a new episode
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "episodes",
                'action' => 'index'
            ]);

            return;
        }

        $episode = new Episodes();
        $episode->setname($this->request->getPost("name"));
        $episode->setepisode($this->request->getPost("episode"));
        $episode->setairDate($this->request->getPost("air_date"));
        $episode->setsinopsis($this->request->getPost("sinopsis"));


        if (!$episode->save()) {
            foreach ($episode->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "episodes",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("episode was created successfully");

        $this->dispatcher->forward([
            'controller' => "episodes",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a episode edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "episodes",
                'action' => 'index'
            ]);

            return;
        }

        $idepisodes = $this->request->getPost("idepisodes");
        $episode = Episodes::findFirstByidepisodes($idepisodes);

        if (!$episode) {
            $this->flash->error("episode does not exist " . $idepisodes);

            $this->dispatcher->forward([
                'controller' => "episodes",
                'action' => 'index'
            ]);

            return;
        }

        $episode->setname($this->request->getPost("name"));
        $episode->setepisode($this->request->getPost("episode"));
        $episode->setairDate($this->request->getPost("air_date"));
        $episode->setsinopsis($this->request->getPost("sinopsis"));


        if (!$episode->save()) {

            foreach ($episode->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "episodes",
                'action' => 'edit',
                'params' => [$episode->getIdepisodes()]
            ]);

            return;
        }

        $this->flash->success("episode was updated successfully");

        $this->dispatcher->forward([
            'controller' => "episodes",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a episode
     *
     * @param string $idepisodes
     */
    public function deleteAction($idepisodes)
    {
        $episode = Episodes::findFirstByidepisodes($idepisodes);
        if (!$episode) {
            $this->flash->error("episode was not found");

            $this->dispatcher->forward([
                'controller' => "episodes",
                'action' => 'index'
            ]);

            return;
        }

        if (!$episode->delete()) {

            foreach ($episode->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "episodes",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("episode was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "episodes",
            'action' => "index"
        ]);
    }
}
