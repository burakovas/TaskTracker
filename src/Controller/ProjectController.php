<?php

namespace App\Controller;

use App\Entity\Project;
use App\Entity\User;
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

        $projects = $this->dm
            ->getRepository(Project::class)
            ->findAll();
            //->findBy(['invited_user' => 2]);

        dump($this->getUser());
        dump($projects);
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

    /**
     * @Route("/project/forme", name="project_forme")
     */
    public function formeAction()
    {
        return $this->render('project/dashboard-forme.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }




}
