<?php

namespace App\User\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use App\User\Models\User;
use GraphAware\Neo4j\OGM\EntityManager;

class ListController extends Controller
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * Create a new controller instance.
     *
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function index()
    {
        $users = $this->em->getRepository(User::class)->findAll();

        return view('user.list', [
            'users' => $users,
        ]);
    }
}
