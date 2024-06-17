<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewProject;

class NewProjectController extends Controller
{
    const UPLOAD_DIR = 'newproject';

    public function index(Request $request) {
        $validated = $this->validateRequest($request->all(), 'newproject_index');

        if(!empty($validated)) {
            return $validated;
        }
        if($request->has('nolimit')) {
            $activity = NewProject::get()->toArray();
            if(!empty($activity)) {
                foreach($activity as $v) {
                    if(!empty($v['logo'])) {
                        $v['logo'] = asset("/images/".self::UPLOAD_DIR."/". $v['logo']);
                    }
                    $data['collection'][] = $v;
                }
                return $this->sendSuccessResponse('Project listed successfully', $data);
            }
        } else {
            $activity = NewProject::paginate(10);
            if(!empty($activity)) {
                foreach($activity->items() as $v) {
                    if(!empty($v['logo'])) {
                        $v['logo'] = asset("/images/".self::UPLOAD_DIR."/". $v['logo']);
                    }
                    $data['collection'][] = $v;
                }
                $data['pagination'] = $this->getPagination($activity);
                return $this->sendSuccessResponse('Project listed successfully', $data);
            }
        }
        
        return $this->sendFailedResponse('Project listing failed');
    } 

    public function view(Request $request, $id) {
        try {
            $activity = NewProject::findOrFail($id)->toArray();
            if(!empty($activity['logo'])) {
                $activity['logo'] = asset("/images/".self::UPLOAD_DIR."/". $activity['logo']);
            }
            return $this->sendSuccessResponse('Project view successfully', $activity);
        } catch (\Exception $e) {
            return $this->sendFailedResponse('Project view failed');
        }
    }

    public function post(Request $request) {
        $validated = $this->validateRequest($request->all(), 'newproject_post');

        if(!empty($validated)) {
            return $validated;
        }
        if($request->has('logo')) {
            $filename = $this->moveFileToStorage($request->file('logo'), self::UPLOAD_DIR);
        }

        $activity = NewProject::create([
            'logo' => $filename ?? '',
            'project' => $request->project  ?? '',
            'category' => $request->category  ?? '',
            'total_raise' => $request->total_raise  ?? '',
            'round' => $request->round  ?? '',
            'investors' => $request->investors  ?? '',
        ]);

        if(!empty($activity)) {
            if(!empty($activity['logo'])) {
                $activity['logo'] = asset("/images/".self::UPLOAD_DIR."/". $activity['logo']);
            }
            return $this->sendSuccessResponse('Project created successfully', ['activity' => $activity]);
        }
        return $this->sendFailedResponse('Project creation failed');
    }

    public function put(Request $request, $id) {

        $validated = $this->validateRequest($request->all(), 'newproject_put');

        if(!empty($validated)) {
            return $validated;
        }

        $updates = [
            'project' => $request->project ?? '',
            'category' => $request->category ?? '',
            'total_raise' => $request->total_raise ?? '',
            'round' => $request->round ?? '',
            'investors' => $request->investors ?? '',
        ];
        if($request->has('logo')) {
            $filename = $this->moveFileToStorage($request->file('logo'), self::UPLOAD_DIR);
            $updates['logo'] = $filename;
        }
        

        $activity = NewProject::findOrFail($id)
            ->update($updates);

        if(!empty($activity)) {
            $activity = NewProject::find($id)->toArray();
            if(!empty($activity['logo'])) {
                $activity['logo'] = asset("/images/".self::UPLOAD_DIR."/". $activity['logo']);
            }
            return $this->sendSuccessResponse('Project updated successfully', ['activity' => $activity]);
        }
        return $this->sendFailedResponse('Project updation failed');
    }

    public function delete(Request $request, $id) {
        $activity = NewProject::findOrFail($id)
            ->delete();
        if(!empty($activity)) {
            return $this->sendSuccessResponse('Project deleted successfully', [1]);
        }
        return $this->sendFailedResponse('Project deletion failed');
    }
}