<?php

namespace App\Entity\User;

use Doctrine\ORM\Mapping as ORM;
use MsgPhp\User\Entity\User as BaseUser;
use MsgPhp\User\UserIdInterface;
use MsgPhp\Domain\Event\DomainEventHandlerInterface;
use MsgPhp\Domain\Event\DomainEventHandlerTrait;
use MsgPhp\User\Entity\Credential\EmailSaltedPassword;
use MsgPhp\User\Entity\Features\EmailSaltedPasswordCredential;
use MsgPhp\User\Entity\Features\ResettablePassword;
use MsgPhp\User\Entity\Fields\RolesField;

/**
 * @ORM\Entity()
 */
class User extends BaseUser implements DomainEventHandlerInterface
{
    use DomainEventHandlerTrait;
    use EmailSaltedPasswordCredential;
    use ResettablePassword;
    use RolesField;

    /** @ORM\Id() @ORM\Column(type="msgphp_user_id") */
    private $id;

    public function __construct(UserIdInterface $id, string $email, string $password, string $passwordSalt)
    {
        $this->id = $id;
        $this->credential = new EmailSaltedPassword($email, $password, $passwordSalt);
    }

    public function getId(): UserIdInterface
    {
        return $this->id;
    }
}
