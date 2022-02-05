<?php
namespace App\Services\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class PostService{
	public function store($data){
		//dd(11111);
		try {
			Db::beginTransaction();
			if (isset($data['tag_ids'])) {
				$tagIds = $data['tag_ids'];
		        unset($data['tag_ids']);
		    }
		    if (isset($data['preview_image'])) {
		        $data['preview_image'] = Storage::disk('public')->put('/image',$data['preview_image']);
		    }
		    if (isset($data['main_image'])) {
		        $data['main_image'] = Storage::disk('public')->put('/image',$data['main_image']);   
		    }

		    $post = Post::FirstOrCreate($data);
		    $post -> tags() -> attach($tagIds);
		    Db::commit();
			
		} catch (Exception $exception) {
			Db::rollBack();
			abort(500);
		}
		
	}
	public function update($data, $post){
		//dd(11111);
		try {
			Db::beginTransaction();
			
			if (isset($data['tag_ids'])) {
				$tagIds = $data['tag_ids'];
		        unset($data['tag_ids']);
			}
	        
	        if (isset($data['preview_image'])) {
	            $data['preview_image'] = Storage::disk('public')->put('/image',$data['preview_image']);
	        }
	        if (isset($data['main_image'])) {
	           $data['main_image'] = Storage::disk('public')->put('/image',$data['main_image']);
	        }

	        $post -> update($data);
	        $post -> tags() -> sync($tagIds);
	        Db::commit();
		} catch (Exception $exception) {
			Db::rollBack();
			abort(500);
		}
		return $post;
	}
}