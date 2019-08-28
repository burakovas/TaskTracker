<?php

namespace App\DataFixtures;

use App\Entity\Project;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\DataFixtures\UserFixtures;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $this->loadProjects($manager);
    }

    private function loadProjects($manager)
    {
        foreach ($this->getProjectsData() as [$name, $user_id, $description]){
            $project = new Project();
            $user = $manager->getRepository(User::class)->find($user_id);
            $project->setName($name);
            $project->setDate(\DateTime::createFromFormat('Y-m-d', "2018-09-09"));
            $project->setDescription($description);

            $manager->persist($project);
        }
        $manager->flush();

        $this->loadUsers($manager);
        //$this->loadCreators($manager);
    }

    public function loadUsers($manager)
    {
        foreach ($this->usersData() as [$project_id, $user_id])
        {
            $project = $manager->getRepository(Project::class)->find($project_id);
            $user = $manager->getRepository(User::class)->find($user_id);
            $project->addInvitedUser($user);
            $manager->persist($project);
        }
        $manager->flush();
    }

    private function usersData()
    {
        return [
            [1, 1],
            [1, 2],

            [2, 1],
            [2, 3],
        ];
    }

    public function loadCreators($manager)
    {
        foreach ($this->creatorsData() as [$project_id, $user_id])
        {
            $project = $manager->getRepository(Project::class)->find($project_id);
            $user = $manager->getRepository(User::class)->find($user_id);
            $project->setCreatedBy($user);
            $manager->persist($project);
        }
        $manager->flush();
    }

    private function creatorsData()
    {
        return [
            [1, 1],
            [2, 1],
            [3, 2],
            [4, 1],
            [5, 2],
            [6, 3],
            [7, 2],
            [8, 1],
            [9, 3],
            [10, 2],
            [11, 1],
            [12, 2],
            ];
    }


    private function getProjectsData()
    {
        return [
            ['First Project1',1 ,"some Description", 1],
            ['Task Tracker1',1,"some Description", 1],
            ['Some project1',1,"some Description",2],

            ['First Project2',2,"some Description",1],
            ['Task Tracker2',2,"some Description",2],
            ['Some project2',2,"some Description",3],

            ['First Project3',3,"some Description",2],
            ['Task Tracker3',3,"some Description",1],
            ['Some project3',3,"some Description",3],

            ['First Project4', 4,"some Description",2],
            ['Task Tracker4', 4,"some Description",1],
            ['Some project4', 4,"some Description",2],
        ];
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class
        );
    }
}
