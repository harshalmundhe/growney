<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EcoSystem;

class EcoSystemController extends Controller
{
    const UPLOAD_DIR = 'ecosystem';

    public function index(Request $request) {
        $validated = $this->validateRequest($request->all(), 'ecosystem_index');

        if(!empty($validated)) {
            return $validated;
        }
        if($request->has('nolimit')) {
            $ecosystem = EcoSystem::get()->toArray();
            if(!empty($ecosystem)) {
                foreach($ecosystem as $v) {
                    if(!empty($v['logo'])) {
                        $v['logo'] = asset("/images/".self::UPLOAD_DIR."/". $v['logo']);
                    }
                    $data['collection'][] = $v;
                }
                return $this->sendSuccessResponse('EcoSystem listed successfully', $data);
            }
        } else {
            $ecosystem = EcoSystem::paginate(10);
            if(!empty($ecosystem)) {
                foreach($ecosystem->items() as $v) {
                    if(!empty($v['logo'])) {
                        $v['logo'] = asset("/images/".self::UPLOAD_DIR."/". $v['logo']);
                    }
                    $data['collection'][] = $v;
                }
                $data['pagination'] = $this->getPagination($ecosystem);
                return $this->sendSuccessResponse('EcoSystem listed successfully', $data);
            }
        }
        
        if(!empty($ecosystem)) {
            echo $ecosystem->items();exit;
            
        }
        return $this->sendFailedResponse('EcoSystem listing failed');
    } 

    public function view(Request $request, $id) {
        try {
            $ecosystem = EcoSystem::findOrFail($id)->toArray();
            if(!empty($ecosystem['logo'])) {
                $ecosystem['logo'] = asset("/images/".self::UPLOAD_DIR."/". $ecosystem['logo']);
            }
            return $this->sendSuccessResponse('EcoSystem view successfully', $ecosystem);
        } catch (\Exception $e) {
            return $this->sendFailedResponse('EcoSystem view failed');
        }
    }

    public function post(Request $request) {
        $validated = $this->validateRequest($request->all(), 'ecosystem_post');

        if(!empty($validated)) {
            return $validated;
        }

        if($request->has('logo')) {
            $filename = $this->moveFileToStorage($request->file('logo'), self::UPLOAD_DIR);
        }

        $ecosystem = EcoSystem::create([
            'logo' => $filename ?? '',
            'project' => $request->project ?? '',
            'name' => $request->name ?? ''
        ]);

        if(!empty($ecosystem)) {
            if(!empty($ecosystem['logo'])) {
                $ecosystem['logo'] = asset("/images/".self::UPLOAD_DIR."/". $ecosystem['logo']);
            }
            return $this->sendSuccessResponse('EcoSystem created successfully', ['ecosystem' => $ecosystem]);
        }
        return $this->sendFailedResponse('EcoSystem creation failed');
    }

    public function put(Request $request, $id) {

        $validated = $this->validateRequest($request->all(), 'ecosystem_put');

        if(!empty($validated)) {
            return $validated;
        }

        $updates = [
            'project' => $request->project ?? '',
            'name' => $request->name ?? ''
        ];
        if($request->has('logo')) {
            $filename = $this->moveFileToStorage($request->file('logo'), self::UPLOAD_DIR);
            $updates['logo'] = $filename;
        }
        

        $ecosystem = EcoSystem::findOrFail($id)
            ->update($updates);

        if(!empty($ecosystem)) {
            $ecosystem = EcoSystem::find($id)->toArray();
            if(!empty($ecosystem['logo'])) {
                $ecosystem['logo'] = asset("/images/".self::UPLOAD_DIR."/". $ecosystem['logo']);
            }
            return $this->sendSuccessResponse('EcoSystem updated successfully', ['ecosystem' => $ecosystem]);
        }
        return $this->sendFailedResponse('EcoSystem updation failed');
    }

    public function delete(Request $request, $id) {
        $ecosystem = EcoSystem::findOrFail($id)
            ->delete();
        if(!empty($ecosystem)) {
            return $this->sendSuccessResponse('EcoSystem deleted successfully', [1]);
        }
        return $this->sendFailedResponse('EcoSystem deletion failed');
    }
}