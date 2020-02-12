<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostsRepository;
use App\Models\PostCategory;

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
            /**
     * Show the form for editing the specified Posts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function article($id)
    {
        $post = $this->postsRepository->find($id);

        if (empty($post)) {
            Flash::error('Post not found');
            return redirect()->back();
        }
        
        $post->load('user');
        $post->load('comments.user');

        // echo "<pre>";
        // print_r($post->toarray());
        // die();
    
        return view('front.single-article')->with('post', $post);
    }
}
