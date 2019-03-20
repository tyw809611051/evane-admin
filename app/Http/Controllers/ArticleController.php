<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Feature;
use App\Model\Article;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
	public function index(Request $request)
	{
	    $pdf = App::make('dompdf.wrapper');
//        $json = '{ "report":{ "id":"", "sn":"", "tid":"", "sid":"", "wid":"", "uid":"", "link":"", "status":{ "value":0, "text":"准备中" }, "created_at":"", "updated_at":"", }, "template":{}, "contents":{ "covers":{ "customer":"中国科学院空间应用工程与技术中心", "part_name":"RMK1608KB590FM", "part_number":"RMK1608KB590FM", "quality_level":"", "manufacturer":"北京七一八友晟电子有限公司", "lot_date_code":"1001", "quantity":"20", "lot_disposition":{ "value":1, "text":"合格", } }, "summary":{ "general":{ "part_name":"", "part_number":"", "manufacturer":"", "lot_date_code":"", "quantity":20, "quality_level":"", "customer":"", "specifications":[ {"name":"微电子器件试验方法和程序"}, {"name":"xxx"} ] }, "disposition":{ "quantity":20, "qualified_number":5, "unqualified_number":1, "failed_item_number":1, "failed_item_list":[ {"name":"xxx"}, {"name":"sss"}, ], "defect_type":"可筛选性缺陷", "to_further_analysis":{ "value":1, "text":"需要" }, "result":{ "value":1, "text":"合格" }, "comments":"" } }, "routing":{ "type":"table", "rows":[ { "index":"1", "name":"外部目检", "result":{ "value":1, "text":"合格" } }, { "index":"2", "name":"粗检漏", "result":{ "value":2, "text":"不合格" } } ], "footer":[{}], }, "steps":[ { "name":"外部目检", "name_e":"", "info":{ "part_name":"", "part_number":"", "manufacturer":"", "lot_date_code":"", "quantity":20, "quality_level":"", "customer":"", "specifications":[ {"name":"微电子器件试验方法和程序"} ], "discrepant_condition":{ "value":1, "text":"合格" } }, "result":{ "type":"TAB", // RTF "feilds":[ { "name":"sn", "title":"编号", "unit":"", "type":"number", }, { "name":"attr_1", "title":"引线直径", "unit":"mm", "type":"number", }, { "name":"result", "title":"结果", "unit":"", "type":"string", } ], "rows":[ "sn":"1001", "attr_1":"200", "result":{ "value":1, "text":"合格", } ], "footer":[{}], }, "images": [ { "url": "http://cadms2.cisslab.com//res/att/eyJpdiI6Ik1uT2ozWDZZMnQ1dnZ1OGd3OEZBY0E9PSIsInZhbHVlIjoiRWczSTFzRG44eUF3NzVHb2RUYUN1bHcyVksxKytKUjRTRzJBMEJPcGZsOD0iLCJtYWMiOiI3MTdlMDQ3OThkMmQ3YjQ4ZDI5MzFmMWQ2ZmUxYzJhNzJkN2FmNWJiOTZiYzM1YzI2ODRhZDZiMTVkMjZkYzAwIn0=", "src": "http://test-img.cissdata.com/cadms2.0/ab/d5/abd5a9d393d7328ccee52a77672dbe86.jpg", "figure_no": "5c25b6935f212", "comments": "" } ] }, ] } }';
//
//        var_dump(json_decode($json,true));die;
        $data = [
            'data' => [
                'customer' => 'me',
                'part_type' => 'goods',
                'part_number' => 123,
                'manufacturer' => '中国制造',
                'quality_level' => 'high',
                'lot_date_code' => 10884,
                'quantity' => 'good',
            ],
            'name' => '我'
        ];
        $pdf = $pdf->loadView('report', $data);
        return $pdf->stream();
		$list = Article::with('users')->paginate(10);
		return view('article.index',['lists'=> $list]);
	}

    //
    public function add(Request $request)
    {
        if ($request->isMethod('post'))
		{
			$data = $request->all();
			$list = [];

			$list = [
				'title' => $data['title'],
				'content' => $data['content'],
				'excerpt' => empty($data['excerpt']) ? '' : $data['excerpt'],
				'users_id' => Auth::id(),
				'status'   => -1,
				'author'   => $data['author'],
				'category_id' => $data['category']
			];

			$file = $request->file('picture');
			if ($file->isValid())
			{
				//获取文件扩展名
				$ext = $file->getClientOriginalExtension();
				//获取文件绝对路径
				$originPath = md5_file($file->getRealPath());

				//定义文件名
				$fileName   = $originPath. '.' . $ext;
				$fileRes = $file->storeAs('banner',$fileName,'public');
				$list['picture'] = $fileRes;

			}
			$res = Article::create($list);
			if ($res == false)
			{
				return redirect()->action('ArticleController@add');
			}
			
			return redirect()->action('ArticleController@index');
		} else 
		{
			$feature = Feature::with('category')->get();
			return view('article.add',['features'=>$feature]);
		}
    }

}
