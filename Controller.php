<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Cookie;
use DB;

use App\User;
use App\Phone;
use App\Comment;
use App\Role;

class Controller extends BaseController
{
    /**
     * One to One relationship and its inverse
     */
    public function oneToOne()
    {
    	$user 	= User::find(1);
    	$phone 	= $user->phone;		// It contains one entry

    	// Inverse
    	$phone 	= Phone::find(1);
    	$user 	= $phone->user;			// It contains one entry

    	echo '<pre>';	print_r( $phone->toArray() );
    }

    /**
     * One to Many relationship and its inverse
     */
    public function oneToMany()
    {
    	$user 	= User::find(1);
    	$comments = $user->comments;		// It contains more than one entry

    	// Inverse
    	$comment= Comment::find(1);
    	$user 	= $comment->user;			// It contains one entry

    	echo '<pre>';	print_r( $comment->toArray() );
    }

    /**
     * Many to Many relationship and its inverse
     */
    public function manyToMany()
    {
    	$user 	= User::find(1);
    	$roles 	= $user->roles;				// It contains more than one entry

    	// Inverse
    	$role 	= Role::find(1);
    	$users 	= $role->users;

    	echo '<pre>';	print_r( $role->toArray() );
    }
}
