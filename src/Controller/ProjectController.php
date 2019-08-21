<?php

namespace App\Controller;

use App\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    /**
     * @Route("/project", name="project-index")
     */
    public function indexAction()
    {
        //проверка залогинен ли пользователь

        $projects = $this->getDoctrine()->getRepository(Project::class)->findAll();

        return $this->render('project/projectboard.html.twig', [
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
