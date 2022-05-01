<?php

namespace App;

abstract class File
{
    private $userRole;
    private $userLevel;
    private $userDepartment;

    /**
     * @param string $userRole
     * @param string $userLevel
     * @param string $userDepartment
     */
    public function __construct(string $userRole, string $userLevel, string $userDepartment)
    {
        $this->userRole = $userRole;
        $this->userLevel = $userLevel;
        $this->userDepartment = $userDepartment;
    }

    /**
     * @param string $filePath
     */
    abstract function getFileContents(string $filePath);

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'user_role' => $this->getUserRole(),
            'user_level' => $this->getUserLevel(),
            'user_department' => $this->getUserDepartment(),
        ];
    }

    // Getters

    /**
     * @return string
     */
    public function getUserRole(): string
    {
        return $this->userRole;
    }

    /**
     * @return string
     */
    public function getUserLevel(): string
    {
        return $this->userLevel;
    }

    /**
     * @return string
     */
    public function getUserDepartment(): string
    {
        return $this->userDepartment;
    }

    // Setters

    /**
     * @param string $userRole
     */
    public function setUserRole(string $userRole)
    {
        $this->userRole = $userRole;
    }

    /**
     * @param string $userLevel
     */
    public function setUserLevel(string $userLevel)
    {
        $this->userLevel = $userLevel;
    }

    /**
     * @param string $userLevel
     */
    public function setUserDepartment(string $userDepartment)
    {
        $this->userDepartment = $userDepartment;
    }
}
