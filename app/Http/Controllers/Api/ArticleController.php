<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Model\Article;
use Illuminate\Http\Request;
use App\Model\Feature;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Library\Dingding;
use App\Notifications\LoginNotice;
use Carbon\Carbon;
use App\User;

class ArticleController extends Controller
{
	public function index(Request $request)
	{
	    $searchParams = $request->get('searchParams',"");
	    $params = json_decode($searchParams);
	    if (!is_array($params)) {
	        $params = [];
        }
		$model = DB::table('article');
		if (array_key_exists('author',$params) && $params->author != "") {
            $model = $model->where('author','like','%'.$params->author.'%');
        }
		if (array_key_exists('title',$params) && $params->title != "") {
            $model = $model->where('title','like','%'.$params->title.'%');
        }
        $list = $model->get();

        return apiSuccess($list,'ok',count($list));
	}

    //
    public function add(Request $request)
    {

        $article = $request->all();

        $list    = [
            'title' => $article['title'],
            'content' => $article['content'],
            'excerpt'=>$article['excerpt'],
        ];
        $rs      = Article::create($list);

        if ($rs === false)
        {
            return error('44001','添加失败');
        }

        return success(0,'添加成功');

    }

    public function edit(Request $request)
    {
        $article = $request->all();

        $list    = [
            'title' => $article['title'],
            'excerpt' => $article['excerpt'],
            'content' => $article['content'],
        ];

        $id = $article['id'];

        $model = Article::find($id);
         $rs   =  $model->update($list);

        if ($rs == false)
        {
            return error('55001','更新失败');
        }
        return success($id,'更新成功');

    
    }

    public function delete(Request $request)
    {
        $article = $request->all();
        $id = $article['id'];
        $rs = Article::where('id',$id)->delete();

    	if ($rs === false)
    	{
    		return error('44002','删除失败');
    	}

    	return success('','删除成功');
    }
    public function changeStatus(Request $request)
    {
    	$status = $request->get('status');
    	$id     = $request->get('id');

    	if (empty($id))
    	{
    		return error('44001','无ID参数');
    	}

    	$rs = Feature::where('id',$id)->update(['status'=>$status]);

    	if ($rs === false)
    	{
    		return error('55001','修改失败');
    	}
    	return success($rs,'修改成功');
    }

    public function get(Request $request)
    {
        $data['status'] = $request->get('status',0);
        $list = Feature::when($data['status'],function($query) use($data){
            return $query->where('status',$data['status']);
        })
        ->get();

        return success($list);
    }
}
