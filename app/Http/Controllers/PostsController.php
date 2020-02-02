<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Repositories\PostsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\PostCategory;
use Flash;
use Response;

class PostsController extends AppBaseController
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
     * Display a listing of the Posts.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $posts = $this->postsRepository->all();

        return view('posts.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new Posts.
     *
     * @return Response
     */
    public function create()
    {
        $category=PostCategory::pluck('category','id');
 
        $this->data['category']=$category;
        return view('posts.create',$this->data);
    }

    /**
     * Store a newly created Posts in storage.
     *
     * @param CreatePostsRequest $request
     *
     * @return Response
     */
    public function store(CreatePostsRequest $request)
    {
        $input = $request->all();
        $input['user_id']=auth()->user()->id;
    
        // echo "<pre>";
        // print_r($input);
        // die();
        $posts = $this->postsRepository->create($input);

        Flash::success('Posts saved successfully.');

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified Posts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $posts = $this->postsRepository->find($id);

        if (empty($posts)) {
            Flash::error('Posts not found');

            return redirect(route('posts.index'));
        }

        return view('posts.show')->with('posts', $posts);
    }

    /**
     * Show the form for editing the specified Posts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $posts = $this->postsRepository->find($id);

        if (empty($posts)) {
            Flash::error('Posts not found');

            return redirect(route('posts.index'));
        }
        $category=PostCategory::pluck('category','id');
 
        $this->data['category']=$category;

        return view('posts.edit',$this->data)->with('posts', $posts);
    }

    /**
     * Update the specified Posts in storage.
     *
     * @param int $id
     * @param UpdatePostsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePostsRequest $request)
    {
        $posts = $this->postsRepository->find($id);

        if (empty($posts)) {
            Flash::error('Posts not found');

            return redirect(route('posts.index'));
        }
        $inputs=$request->all();
        $inputs['user_id']=auth()->user()->id;
        $posts = $this->postsRepository->update($inputs, $id);

        Flash::success('Posts updated successfully.');

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified Posts from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $posts = $this->postsRepository->find($id);

        if (empty($posts)) {
            Flash::error('Posts not found');

            return redirect(route('posts.index'));
        }

        $this->postsRepository->delete($id);

        Flash::success('Posts deleted successfully.');

        return redirect(route('posts.index'));
    }
}
