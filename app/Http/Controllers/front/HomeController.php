<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostsRepository;

class HomeController extends Controller
{
    /** @var  PostsRepository */
    private $postsRepository;
    private $data;

    public function __construct(PostsRepository $postsRepo)
    {
        $this->postsRepository = $postsRepo;
        $this->data['module']='post';
        $this->data['status']=[0=>'Disable',1=>'Active'];
    }
    /**
     * Display a listing of the Comments.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $this->data['posts']=$this->postsRepository->all();
       
        return view('front.posts',$this->data);
    }
}
