<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Model\Menu;
use Illuminate\Http\Request;
use App\Model\Feature;
use Illuminate\Support\Facades\Log;
use App\Library\Dingding;
use App\Notifications\LoginNotice;
use Carbon\Carbon;
use App\User;

class MenuController extends Controller
{
	public function index(Request $request)
	{
		$list = Menu::all();

        return success($list);
	}

    public function getAll(Request $request)
    {
        $list = [
            "homeInfo"=> [
                "title"=> "首页",
                "href"=> "page/welcome-1.html?t=1"
            ],
            "logoInfo"=> [
                  "title"=> "EVANE后台",
                  "image"=> "images/icon.jpg",
                  "href"=> ""
            ],
            "menuInfo"=>[
                [
                    "title"=> "常规管理",
                    "icon"=> "fa fa-address-book",
                    "href"=> "",
                    "target"=> "_self",
                    "child"=>[
                        [
                            "title"=> "文章管理",
                            "icon"=> "fa fa-address-book",
                            "href"=> "",
                            "target"=> "",
                            "child"=>[
                                [
                                    "title"=> "文章管理",
                                    "icon"=> "fa fa-bookmark",
                                    "href"=> "page/article/index.html",
                                    "target"=> "_self",
                                ],
//                                [
//                                    "title"=> "分类管理",
//                                    "icon"=> "fa fa-certificate",
//                                    "href"=> "page/category/index.html",
//                                    "target"=> "_self",
//                                ],
//                                [
//                                    "title"=> "版块管理",
//                                    "icon"=> "fa fa-bookmark",
//                                    "href"=> "page/feature/index.html",
//                                    "target"=> "_self",
//                                ]
                            ]
                        ],
//                        [
//                            "title"=> "评论管理",
//                            "icon"=> "fa fa-comment",
//                            "href"=> "",
//                            "target"=> "",
//                            "child"=>[
//                                [
//                                    "title"=> "评论管理",
//                                    "icon"=> "fa fa-comment-o",
//                                    "href"=> "page/comment.html",
//                                    "target"=> "_self",
//                                ]
//                            ]
//                        ]
                    ]
                 ]
            ]
        ];

        return $list;
    }

    //
    public function add(Request $request)
    {
    	if ($request->isMethod('post')) 
    	{
    		$feature = $request->all();
    		$list    = [];

    		$list    = [
    			'name' => $feature['name'],
    			'desc' => $feature['desc']
    		];
		    // $model   = new Feature();
		    $rs      = Feature::create($list);

		    if ($rs === false)
		    {
		    	return error('44001','添加失败');
		    }
            
		    return success(0,'添加成功');
		} else 
		{
			return view('feature.add');
		}
    }

    public function edit($id,Request $request)
    {
    	if ($request->isMethod('post')) 
    	{
    		$feature = $request->all();
    		$list    = [];

    		$list    = [
    			'name' => $feature['name'],
    			'desc' => $feature['desc'],
    			'status' => $feature['status'],
    			'sort'   => $feature['sort']
    		];
    		
    		$model = Feature::find($id);
             $rs   =  $model->update($list);

    		if ($rs == false)
    		{
    			return error('55001','更新失败');
    		}
    		return success($id,'更新成功');
    	} else 
    	{
    		$data = Feature::where('id',$id)->first();

    		return view('feature.edit',['data'=>$data]);
    	}
    
    }

    public function delete($id,Request $request)
    {
    	$rs = Feature::where('id',$id)->delete();

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
