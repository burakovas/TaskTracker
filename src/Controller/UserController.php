<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserController
 * @package App\Controller
 * @Route("/user")
 */
class UserController extends AbstractController
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
     * @Route("/register", name="register")
     * @Template()
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {

        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
//        dd($form->isValid());
//        if ($form->isSubmitted() && $form->isValid()) {
        if ($form->isSubmitted()) {

            $user->setLastName($request->request->get('user')['lastName']);
            $user->setEmail($request->request->get('user')['email']);
            $password = $request->request->get('user')['password']['first'];
            $user->setPassword($passwordEncoder->encodePassword($user, $password));
            $user->setName($request->request->get('user')['name']);
            $user->setRoles(['ROLE_USER']);

            $this->dm->persist($user);
            $this->dm->flush();

            $this->loginUserAutomatically($user, $password);
            return $this->redirectToRoute('main_page');
        }
        return [
            'form' => $form->createView()
        ];
    }

    /**
     * @param User $user
     * @param string $password
     */
    public function loginUserAutomatically($user, string $password)
    {
        $token = new UsernamePasswordToken(
            $user, $password, 'main', $user->getRoles()
        );

        $this->get('security.token_storage')->setToken($token);
        $this->get('session')->set('_security_main', serialize($token));
    }

}
