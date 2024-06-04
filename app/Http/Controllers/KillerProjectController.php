<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KillerProject;

class KillerProjectController extends Controller
{
    const UPLOAD_DIR = 'killerproject';

    public function index(Request $request) {
        $validated = $this->validateRequest($request->all(), 'killerproject_index');

        if(!empty($validated)) {
            return $validated;
        }
        if($request->has('nolimit')) {
            $killerproject = KillerProject::get()->toArray();
            if(!empty($killerproject)) {
                foreach($killerproject as $v) {
                    $v['logo'] = asset("/images/".self::UPLOAD_DIR."/". $v['logo']);
                    $data['collection'][] = $v;
                }
                return $this->sendSuccessResponse('KillerProject listed successfully', $data);
            }
        } else {
            $killerproject = KillerProject::paginate(10);
            if(!empty($killerproject)) {
                foreach($killerproject->items() as $v) {
                    $v['logo'] = asset("/images/".self::UPLOAD_DIR."/". $v['logo']);
                    $data['collection'][] = $v;
                }
                $data['pagination'] = $this->getPagination($killerproject);
                return $this->sendSuccessResponse('KillerProject listed successfully', $data);
            }
        }
        
        if(!empty($killerproject)) {
            echo $killerproject->items();exit;
            
        }
        return $this->sendFailedResponse('KillerProject listing failed');
    } 

    public function post(Request $request) {
        $validated = $this->validateRequest($request->all(), 'killerproject_post');

        if(!empty($validated)) {
            return $validated;
        }

        $filename = $this->moveFileToStorage($request->file('logo'), self::UPLOAD_DIR);

        $killerproject = KillerProject::create([
            'logo' => $filename,
            'project' => $request->project,
            'activities' => $request->killerproject
        ]);

        if(!empty($killerproject)) {
            $killerproject['logo'] = asset("/images/".self::UPLOAD_DIR."/". $killerproject['logo']);
            return $this->sendSuccessResponse('KillerProject created successfully', ['killerproject' => $killerproject]);
        }
        return $this->sendFailedResponse('KillerProject creation failed');
    }

    public function put(Request $request, $id) {

        $validated = $this->validateRequest($request->all(), 'killerproject_put');

        if(!empty($validated)) {
            return $validated;
        }

        $updates = [
            'project' => $request->project,
            'activities' => $request->killerproject
        ];
        if($request->has('logo')) {
            $filename = $this->moveFileToStorage($request->file('logo'), self::UPLOAD_DIR);
            $updates['logo'] = $filename;
        }
        

        $killerproject = KillerProject::findOrFail($id)
            ->update($updates);

        if(!empty($killerproject)) {
            $killerproject = KillerProject::find($id)->toArray();
            $killerproject['logo'] = asset("/images/".self::UPLOAD_DIR."/". $killerproject
            ['logo']);
            return $this->sendSuccessResponse('KillerProject updated successfully', ['killerproject' => $killerproject]);
        }
        return $this->sendFailedResponse('KillerProject updation failed');
    }

    public function delete(Request $request, $id) {
        $killerproject = KillerProject::findOrFail($id)
            ->delete();
        if(!empty($killerproject)) {
            return $this->sendSuccessResponse('KillerProject deleted successfully', [1]);
        }
        return $this->sendFailedResponse('KillerProject deletion failed');
    }
}