<?php

namespace AppBundle\Manager;

use AppBundle\Entity\User;
use AppBundle\Repository\UserRepository;
use FOS\UserBundle\Util\TokenGeneratorInterface;
use AppBundle\Model\UserInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserManager extends BaseManager implements UserProviderInterface
{
    /**
     * @var TokenGeneratorInterface
     */
    private $tokenGenerator;

    public function __construct(UserRepository $repository, TokenGeneratorInterface $tokenGenerator)
    {
        $this->repository       = $repository;
        $this->tokenGenerator   = $tokenGenerator;
    }

    /**
     * @return User
     */
    public function createUser()
    {
        return new User();
    }

    /**
     * @param $user
     */
    public function updateUser(\FOS\UserBundle\Model\UserInterface $user)
    {
        $this->save($user);
    }

    /**
     * @param $email
     * @return null|object
     */
    public function getFindByEmail($email)
    {
        return $this->repository->findByEmail($email);
    }

    /**
     * @param $username
     * @return array
     */
    public function getFindByUsername($username)
    {
        return $this->repository->findByUsername($username);
    }

    /**
     * @param $username
     * @return bool
     */
    public function isUsernameAvailable($username)
    {
        return $this->repository->findOneByUsername($username) instanceof UserInterface ? false: true;
    }

    /**
     * @param $confirmNameToken
     * @return mixed
     */
    public function getFindOneByConfirmNameToken($confirmNameToken)
    {
        return $this->repository->findOneByConfirmNameToken($confirmNameToken);
    }

    /**
     * @param $email
     * @return bool
     */
    public function isEmailAvailable($email)
    {
        return $this->repository->findByEmail($email) instanceof UserInterface ? false: true;
    }

    /**
     * @param $confirmationToken
     * @return null|object
     */
    public function getFindByConfirmationToken($confirmationToken)
    {
        return $this->repository->findOneByConfirmationToken($confirmationToken);
    }

    public function findUserByConfirmationToken($token)
    {
        return $this->repository->findOneByConfirmationToken($token);
    }

    /**
     * Loads the user for the given username or password.
     *
     * This method must throw UsernameNotFoundException if the user is not
     * found.
     *
     * @param string $username The username
     *
     * @return \Symfony\Component\Security\Core\User\UserInterface
     *
     * @throws UsernameNotFoundException if the user is not found
     */
    public function loadUserByUsername($username)
    {
        $user = $this->repository->findOneByUsername($username);

        if (!$user) {
            throw new UsernameNotFoundException(sprintf('No user with name "%s" was found.', $username));
        }

        return $user;
    }

    /**
     * Refreshes the user for the account interface.
     *
     * It is up to the implementation to decide if the user data should be
     * totally reloaded (e.g. from the database), or if the UserInterface
     * object can just be merged into some internal array of users / identity
     * map.
     *
     * @param \Symfony\Component\Security\Core\User\UserInterface $user
     *
     * @return \Symfony\Component\Security\Core\User\UserInterface
     *
     * @throws UnsupportedUserException if the account is not supported
     */
    public function refreshUser(\Symfony\Component\Security\Core\User\UserInterface $user)
    {
        @trigger_error('Using the UserManager as user provider is deprecated. Use FOS\UserBundle\Security\UserProvider instead.', E_USER_DEPRECATED);

        $class = $this->getClass();
        if (!$user instanceof $class) {
            throw new UnsupportedUserException('Account is not supported.');
        }
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Expected an instance of FOS\UserBundle\Model\User, but got "%s".', get_class($user)));
        }

        $refreshedUser = $this->findUserBy(array('id' => $user->getId()));
        if (null === $refreshedUser) {
            throw new UsernameNotFoundException(sprintf('User with ID "%d" could not be reloaded.', $user->getId()));
        }

        return $refreshedUser;
    }

    /**
     * Whether this provider supports the given user class.
     *
     * @param string $class
     *
     * @return bool
     */
    public function supportsClass($class)
    {
        @trigger_error('Using the UserManager as user provider is deprecated. Use FOS\UserBundle\Security\UserProvider instead.', E_USER_DEPRECATED);

        return $class === $this->getClass();
    }

    /**
     * @param $username
     * @return mixed
     */
    public function getFindOneByUsername($username)
    {
        return $this->repository->findOneByUsername($username);
    }
}