<?php

namespace App\Controller;

use App\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    /**
     * @var \Doctrine\Common\Persistence\ObjectManager
     */
    private $dm;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->dm = $manager;
    }
    /**
     * @Route("/project", name="project_index")
     * @Template()
     */
    public function indexAction()
    {
        //проверка залогинен ли пользователь

        $projects = $this->dm->getRepository(Project::class)->findAll();

        dump($this->getUser());
        return $this->render('project/index.html.twig', [
            'projects' => $projects,
        ]);

    }

    /**
     * @Route("/project/create", name="project_create")
     */
    public function createAction()
    {
        return $this->render('project/task-project.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }

}
