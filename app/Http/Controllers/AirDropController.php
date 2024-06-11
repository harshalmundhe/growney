<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AirDrop;

class AirDropController extends Controller
{
    const UPLOAD_DIR = 'airdrop';

    public function index(Request $request) {
        $validated = $this->validateRequest($request->all(), 'airdrop_index');

        if(!empty($validated)) {
            return $validated;
        }
        if($request->has('nolimit')) {
            $airdrop = AirDrop::get()->toArray();
            if(!empty($airdrop)) {
                foreach($airdrop as $v) {
                    $v['logo'] = asset("/images/".self::UPLOAD_DIR."/". $v['logo']);
                    $data['collection'][] = $v;
                }
                return $this->sendSuccessResponse('AirDrop listed successfully', $data);
            }
        } else {
            $airdrop = AirDrop::paginate(10);
            if(!empty($airdrop)) {
                foreach($airdrop->items() as $v) {
                    $v['logo'] = asset("/images/".self::UPLOAD_DIR."/". $v['logo']);
                    $data['collection'][] = $v;
                }
                $data['pagination'] = $this->getPagination($airdrop);
                return $this->sendSuccessResponse('AirDrop listed successfully', $data);
            }
        }
        
        if(!empty($airdrop)) {
            echo $airdrop->items();exit;
            
        }
        return $this->sendFailedResponse('AirDrop listing failed');
    } 

    public function view(Request $request, $id) {
        try {
            $airdrop = AirDrop::findOrFail($id)->toArray();
            $airdrop['logo'] = asset("/images/".self::UPLOAD_DIR."/". $airdrop['logo']);
            return $this->sendSuccessResponse('AirDrop view successfully', $airdrop);
        } catch (\Exception $e) {
            return $this->sendFailedResponse('AirDrop view failed');
        }
    }

    public function post(Request $request) {
        $validated = $this->validateRequest($request->all(), 'airdrop_post');

        if(!empty($validated)) {
            return $validated;
        }

        $filename = $this->moveFileToStorage($request->file('logo'), self::UPLOAD_DIR);

        $airdrop = AirDrop::create([
            'logo' => $filename,
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading
        ]);

        if(!empty($airdrop)) {
            $airdrop['logo'] = asset("/images/".self::UPLOAD_DIR."/". $airdrop['logo']);
            return $this->sendSuccessResponse('AirDrop created successfully', ['airdrop' => $airdrop]);
        }
        return $this->sendFailedResponse('AirDrop creation failed');
    }

    public function put(Request $request, $id) {

        $validated = $this->validateRequest($request->all(), 'airdrop_put');

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
        

        $airdrop = AirDrop::findOrFail($id)
            ->update($updates);

        if(!empty($airdrop)) {
            $airdrop = AirDrop::find($id)->toArray();
            $airdrop['logo'] = asset("/images/".self::UPLOAD_DIR."/". $airdrop
            ['logo']);
            return $this->sendSuccessResponse('AirDrop updated successfully', ['airdrop' => $airdrop]);
        }
        return $this->sendFailedResponse('AirDrop updation failed');
    }

    public function delete(Request $request, $id) {
        $airdrop = AirDrop::findOrFail($id)
            ->delete();
        if(!empty($airdrop)) {
            return $this->sendSuccessResponse('AirDrop deleted successfully', [1]);
        }
        return $this->sendFailedResponse('AirDrop deletion failed');
    }
}