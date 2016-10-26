<?php

namespace App\Http\Controllers;

use App\Model\News;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function getNews()
    {
        return $this->success(News::all());
    }

    public function postNewById(Request $request)
    {
        $id = $request->input('id', null);
        return $this->getNewById($id);
    }

    public function getNewById($id)
    {
        return $this->success(News::where('id', $id)->get());
    }

    public function delete(Request $request)
    {
        try {
            $id = $request->input('id', null);
//             Log::info('deleteNew', ['id' => $id]);
            if ($id) {
//                News::destroy($id);
                $deletedRows = News::where('id', $id)->delete();
                return $this->success($deletedRows);
            } else {
                return $this->failed();
            }

        } catch (\Exception $ex) {
            return $this->failedCode($ex->getCode(), $ex->getMessage());
        }

    }

    public function update(Requests\NewsUpdateRequest $request){
//        $validator = Validator::make($request->all(), [
//            'id'=>'required',
//            'title' => 'required|max:10',
//            'body' => 'required',
//        ]);
//
//        if ($validator->fails())
//            return 'ssssssssss';
//        else {
            $id = $request->input('id');
            $title = $request->input('title');
            $body = $request->input('body');

            $new = News::find($id);
            if ($new) {
                if ($title)
                    $new->title = $title;
                if ($body)
                    $new->body = $body;
                $new->save();
                return $this->success($new);
            } else
                return $this->failed();
//        }



    }

    public function create(Request $request){
        $title = $request->input('title');
        $body = $request->input('body');
        try {
            $new = new News();
            if ($title)
                $new->title = $title;
            if ($body)
                $new->body = $body;
            $new->save();
            return $this->success($new);
        } catch (\Exception $ex) {
            return $ex->failed();
        }

    }

    public function updateList(Request $request)
    {
        $data = json_decode($request->input('data'));
        if ($data) {
            $arrOutput = array();
            foreach ($data as $newItem) {
                $id = $newItem->id;
                $new = News::find($id);
                if ($new) {
                    if ($newItem->title)
                        $new->title = $newItem->title;
                    if ($newItem->body)
                        $new->body = $newItem->body;
                    $new->save();

                    array_push($arrOutput, $new);
                }
            }
            return $this->success($arrOutput);
        } else {
            return $this->failed();
        }
    }

    public function createList(Request $request)
    {
        $data = json_decode($request->input('data'));
        if ($data) {
            $arrOutput = array();
            foreach ($data as $newItem) {
                $new = new News();

                if ($newItem->title)
                    $new->title = $newItem->title;
                if ($newItem->body)
                    $new->body = $newItem->body;
                $new->save();

                array_push($arrOutput, $new);
            }
            return $this->success($arrOutput);
        } else {
            return $this->failed();
        }
    }
}
