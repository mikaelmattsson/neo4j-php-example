<?php

namespace App\Http\Controllers;

use App\Models\User;
use GraphAware\Neo4j\OGM\Manager;

class ExampleController extends Controller
{
    /**
     * @var Manager
     */
    protected $em;

    /**
     * Create a new controller instance.
     * @param Manager $em
     */
    public function __construct(Manager $em)
    {
        $this->em = $em;
    }

    public function index()
    {
        $users = $this->em->getRepository(User::class)->findAll();

        return view('user.list', [
            'users' => $users
        ]);
    }
}
