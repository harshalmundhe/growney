<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotNews;

class HotNewsController extends Controller
{
    const UPLOAD_DIR = 'hotnews';

    public function index(Request $request) {
        $validated = $this->validateRequest($request->all(), 'hotnews_index');

        if(!empty($validated)) {
            return $validated;
        }
        if($request->has('nolimit')) {
            $hotnews = HotNews::get()->toArray();
            if(!empty($hotnews)) {
                foreach($hotnews as $v) {
                    $v['logo'] = asset("/images/".self::UPLOAD_DIR."/". $v['logo']);
                    $data['collection'][] = $v;
                }
                return $this->sendSuccessResponse('HotNews listed successfully', $data);
            }
        } else {
            $hotnews = HotNews::paginate(10);
            if(!empty($hotnews)) {
                foreach($hotnews->items() as $v) {
                    $v['logo'] = asset("/images/".self::UPLOAD_DIR."/". $v['logo']);
                    $data['collection'][] = $v;
                }
                $data['pagination'] = $this->getPagination($hotnews);
                return $this->sendSuccessResponse('HotNews listed successfully', $data);
            }
        }
        
        if(!empty($hotnews)) {
            echo $hotnews->items();exit;
            
        }
        return $this->sendFailedResponse('HotNews listing failed');
    } 

    public function view(Request $request, $id) {
        try {
            $hotnews = HotNews::findOrFail($id)->toArray();
            $hotnews['logo'] = asset("/images/".self::UPLOAD_DIR."/". $hotnews['logo']);
            return $this->sendSuccessResponse('HotNews view successfully', $hotnews);
        } catch (\Exception $e) {
            return $this->sendFailedResponse('HotNews view failed');
        }
    }

    public function post(Request $request) {
        $validated = $this->validateRequest($request->all(), 'hotnews_post');

        if(!empty($validated)) {
            return $validated;
        }

        $filename = $this->moveFileToStorage($request->file('logo'), self::UPLOAD_DIR);

        $hotnews = HotNews::create([
            'logo' => $filename,
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading
        ]);

        if(!empty($hotnews)) {
            $hotnews['logo'] = asset("/images/".self::UPLOAD_DIR."/". $hotnews['logo']);
            return $this->sendSuccessResponse('HotNews created successfully', ['hotnews' => $hotnews]);
        }
        return $this->sendFailedResponse('HotNews creation failed');
    }

    public function put(Request $request, $id) {

        $validated = $this->validateRequest($request->all(), 'hotnews_put');

        if(!empty($validated)) {
            return $validated;
        }

        $updates = [
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading
        ];
        if($request->has('logo')) {
            $filename = $this->moveFileToStorage($request->file('logo'), self::UPLOAD_DIR);
            $updates['logo'] = $filename;
        }
        

        $hotnews = HotNews::findOrFail($id)
            ->update($updates);

        if(!empty($hotnews)) {
            $hotnews = HotNews::find($id)->toArray();
            $hotnews['logo'] = asset("/images/".self::UPLOAD_DIR."/". $hotnews
            ['logo']);
            return $this->sendSuccessResponse('HotNews updated successfully', ['hotnews' => $hotnews]);
        }
        return $this->sendFailedResponse('HotNews updation failed');
    }

    public function delete(Request $request, $id) {
        $hotnews = HotNews::findOrFail($id)
            ->delete();
        if(!empty($hotnews)) {
            return $this->sendSuccessResponse('HotNews deleted successfully', [1]);
        }
        return $this->sendFailedResponse('HotNews deletion failed');
    }
}