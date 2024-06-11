<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnusualActivity;

class UnusualActivityController extends Controller
{
    const UPLOAD_DIR = 'unusualactivity';

    public function index(Request $request) {
        $validated = $this->validateRequest($request->all(), 'unusualactivity_index');

        if(!empty($validated)) {
            return $validated;
        }
        if($request->has('nolimit')) {
            $activity = UnusualActivity::get()->toArray();
            if(!empty($activity)) {
                foreach($activity as $v) {
                    $v['logo'] = asset("/images/".self::UPLOAD_DIR."/". $v['logo']);
                    $data['collection'][] = $v;
                }
                return $this->sendSuccessResponse('Activty listed successfully', $data);
            }
        } else {
            $activity = UnusualActivity::paginate(10);
            if(!empty($activity)) {
                foreach($activity->items() as $v) {
                    $v['logo'] = asset("/images/".self::UPLOAD_DIR."/". $v['logo']);
                    $data['collection'][] = $v;
                }
                $data['pagination'] = $this->getPagination($activity);
                return $this->sendSuccessResponse('Activty listed successfully', $data);
            }
        }
        
        if(!empty($activity)) {
            echo $activity->items();exit;
            
        }
        return $this->sendFailedResponse('Activty listing failed');
    } 

    public function view(Request $request, $id) {
        try {
            $activity = UnusualActivity::findOrFail($id)->toArray();
            $activity['logo'] = asset("/images/".self::UPLOAD_DIR."/". $activity['logo']);
            return $this->sendSuccessResponse('Activty view successfully', $activity);
        } catch (\Exception $e) {
            return $this->sendFailedResponse('Activty view failed');
        }
    }

    public function post(Request $request) {
        $validated = $this->validateRequest($request->all(), 'unusualactivity_post');

        if(!empty($validated)) {
            return $validated;
        }

        $filename = $this->moveFileToStorage($request->file('logo'), self::UPLOAD_DIR);

        $activity = UnusualActivity::create([
            'logo' => $filename,
            'project' => $request->project,
            'activities' => $request->activity
        ]);

        if(!empty($activity)) {
            $activity['logo'] = asset("/images/".self::UPLOAD_DIR."/". $activity['logo']);
            return $this->sendSuccessResponse('Activty created successfully', ['activity' => $activity]);
        }
        return $this->sendFailedResponse('Activty creation failed');
    }

    public function put(Request $request, $id) {

        $validated = $this->validateRequest($request->all(), 'unusualactivity_put');

        if(!empty($validated)) {
            return $validated;
        }

        $updates = [
            'project' => $request->project,
            'activities' => $request->activity
        ];
        if($request->has('logo')) {
            $filename = $this->moveFileToStorage($request->file('logo'), self::UPLOAD_DIR);
            $updates['logo'] = $filename;
        }
        

        $activity = UnusualActivity::findOrFail($id)
            ->update($updates);

        if(!empty($activity)) {
            $activity = UnusualActivity::find($id)->toArray();
            $activity['logo'] = asset("/images/".self::UPLOAD_DIR."/". $activity
            ['logo']);
            return $this->sendSuccessResponse('Activty updated successfully', ['activity' => $activity]);
        }
        return $this->sendFailedResponse('Activty updation failed');
    }

    public function delete(Request $request, $id) {
        $activity = UnusualActivity::findOrFail($id)
            ->delete();
        if(!empty($activity)) {
            return $this->sendSuccessResponse('Activty deleted successfully', [1]);
        }
        return $this->sendFailedResponse('Activty deletion failed');
    }
}