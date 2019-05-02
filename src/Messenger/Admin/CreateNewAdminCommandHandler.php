<?php

namespace App\Messenger\Admin;

use App\Entity\Admin;
use App\Repository\AdminRepository;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CreateNewAdminCommandHandler implements MessageHandlerInterface
{

    /**
     * @var AdminRepository
     */
    private $adminRepository;
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;
    public function __construct(AdminRepository $adminRepository, UserPasswordEncoderInterface $encoder)
    {
        $this->adminRepository = $adminRepository;
        $this->encoder = $encoder;
    }
    public function __invoke(CreateNewAdminCommand $message): void
    {
        $user = $this->adminRepository->findOneBy(['username' => $message->getUsername()]);
        if ($user) {
            throw new \InvalidArgumentException('User found');
        }
       $admin = new Admin();
        $admin->setUsername($message->getUsername());
        $encoded = $this->encoder->encodePassword($admin , $message->getPassword());
        $admin->setPassword($encoded);

        $this->adminRepository->save($admin);

    }
}
