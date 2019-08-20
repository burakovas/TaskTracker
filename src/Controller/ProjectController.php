<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    /**
     * @Route("/project", name="project-index")
     */
    public function index()
    {
        //проверка залогинен ли пользователь
        return $this->render('project/projectboard.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }

    /**
     * @Route("/project/create", name="project_create")
     */
    public function create()
    {
        return $this->render('project/task-project.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }

}
