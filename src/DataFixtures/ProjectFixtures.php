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
        foreach ($this->getProjectsData() as [$name, $user_id]){
            $project = new Project();
            $user = $manager->getRepository(User::class)->find($user_id);
            $project->setUser($user);
            $project->setName($name);
            $project->setDate(\DateTime::createFromFormat('Y-m-d', "2018-09-09"));
            $project->setCategory(1);
            $project->setDescription("some Description");
            $project->setInvite(1);
            if ($name == "Task Tracker") {
                $project->setInvite(2);
            }
            $manager->persist($project);
        }
        $manager->flush();

        $this->loadUsers($manager);
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

    private function getProjectsData()
    {
        return [
            ['First Project1',1],
            ['Task Tracker1',1],
            ['Some project1',1],

            ['First Project2',2],
            ['Task Tracker2',2],
            ['Some project2',2],

            ['First Project3',3],
            ['Task Tracker3',3],
            ['Some project3',3],
        ];
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class
        );
    }
}
