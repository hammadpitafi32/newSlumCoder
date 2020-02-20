<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostTagsRequest;
use App\Http\Requests\UpdatePostTagsRequest;
use App\Repositories\PostTagsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Tags;
use Flash;
use Response;
use Auth;

class PostTagsController extends AppBaseController
{
    /** @var  PostTagsRepository */
    private $postTagsRepository;
    private $data;
    private $role;

    public function __construct(PostTagsRepository $postTagsRepo)
    {
        $this->postTagsRepository = $postTagsRepo;
        $this->data = [];
        $this->role = ['super-admin'];
    }

    /**
     * Display a listing of the PostTags.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

        if(Auth::user()->hasAnyRole($this->role)){

            $postTags = $this->postTagsRepository->all();
        }else{
            $postTags = $this->postTagsRepository->getDataByUserId(Auth::user()->id);
        }
        
        return view('post_tags.index')
            ->with('postTags', $postTags);
    }

    /**
     * Show the form for creating a new PostTags.
     *
     * @return Response
     */
    public function create()
    {
        $this->data['posts']=Posts::pluck('title','id');
        $this->data['tags']=Tags::pluck('tag','id');
        return view('post_tags.create',$this->data);
    }

    /**
     * Store a newly created PostTags in storage.
     *
     * @param CreatePostTagsRequest $request
     *
     * @return Response
     */
    public function store(CreatePostTagsRequest $request)
    {
        $input = $request->all();
        $input['user_id']=auth()->user()->id;
        $postTags = $this->postTagsRepository->create($input);

        Flash::success('Post Tags saved successfully.');

        return redirect(route('postTags.index'));
    }

    /**
     * Display the specified PostTags.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $postTags = $this->postTagsRepository->find($id);

        if (empty($postTags)) {
            Flash::error('Post Tags not found');

            return redirect(route('postTags.index'));
        }

        return view('post_tags.show')->with('postTags', $postTags);
    }

    /**
     * Show the form for editing the specified PostTags.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $postTags = $this->postTagsRepository->find($id);

        if (empty($postTags)) {
            Flash::error('Post Tags not found');

            return redirect(route('postTags.index'));
        }
        $this->data['posts']=Posts::pluck('title','id');
        $this->data['tags']=Tags::pluck('tag','id');

        return view('post_tags.edit',$this->data)->with('postTags', $postTags);
    }

    /**
     * Update the specified PostTags in storage.
     *
     * @param int $id
     * @param UpdatePostTagsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePostTagsRequest $request)
    {
        $postTags = $this->postTagsRepository->find($id);
        $input=$request->all();
        if (empty($postTags)) {
            Flash::error('Post Tags not found');

            return redirect(route('postTags.index'));
        }
        $input['user_id']=auth()->user()->id;
        $postTags = $this->postTagsRepository->update($input, $id);

        Flash::success('Post Tags updated successfully.');

        return redirect(route('postTags.index'));
    }

    /**
     * Remove the specified PostTags from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $postTags = $this->postTagsRepository->find($id);

        if (empty($postTags)) {
            Flash::error('Post Tags not found');

            return redirect(route('postTags.index'));
        }

        $this->postTagsRepository->delete($id);

        Flash::success('Post Tags deleted successfully.');

        return redirect(route('postTags.index'));
    }
}
