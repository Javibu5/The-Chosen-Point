<?php

namespace spec\App\Messenger\Admin;

use App\Messenger\Admin\CreateNewAdminCommandHandler;
use App\Repository\AdminRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateNewAdminCommandHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(CreateNewAdminCommandHandler::class);
    }

    function let(AdminRepository $repository)
    {
        $this->beConstructedWith($repository);

    }

   // public function it_saves_a_new_admin(AdminRepository $repository, Crea)
}
