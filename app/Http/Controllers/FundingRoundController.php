<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FundingRound;

class FundingRoundController extends Controller
{
    const UPLOAD_DIR = 'fundinground';

    public function index(Request $request) {
        $validated = $this->validateRequest($request->all(), 'fundinground_index');

        if(!empty($validated)) {
            return $validated;
        }
        if($request->has('nolimit')) {
            $fundinground = FundingRound::get()->toArray();

            if(!empty($fundinground)) {
                foreach($fundinground as $v) {
                    if(!empty($v['logo'])) {
                        $v['logo'] = asset("/images/".self::UPLOAD_DIR."/". $v['logo']);
                    }
                    $data['collection'][] = $v;
                }
                return $this->sendSuccessResponse('FundingRound listed successfully', $data);
            }
        } else {
            $fundinground = FundingRound::paginate(10);
            if(!empty($fundinground)) {
                foreach($fundinground->items() as $v) {
                    if(!empty($v['logo'])) {
                        $v['logo'] = asset("/images/".self::UPLOAD_DIR."/". $v['logo']);
                    }
                    $data['collection'][] = $v;
                }
                $data['pagination'] = $this->getPagination($fundinground);
                return $this->sendSuccessResponse('FundingRound listed successfully', $data);
            }
        }
        return $this->sendFailedResponse('FundingRound fundinground failed');
    } 

    public function view(Request $request, $id) {
        try {
            $fundinground = FundingRound::findOrFail($id)->toArray();
            if(!empty($fundinground['logo'])) {
                $fundinground['logo'] = asset("/images/".self::UPLOAD_DIR."/". $fundinground['logo']);
            }
            return $this->sendSuccessResponse('FundingRound view successfully', $fundinground);
        } catch (\Exception $e) {
            return $this->sendFailedResponse('FundingRound view failed');
        }
    }

    public function post(Request $request) {
        
        $validated = $this->validateRequest($request->all(), 'fundinground_post');

        if(!empty($validated)) {
            return $validated;
        }

        if($request->has('logo')) {
            $filename = $this->moveFileToStorage($request->file('logo'), self::UPLOAD_DIR);
        }

        $fundinground = FundingRound::create([
            'logo' => $filename ?? '',
            'project' => $request->project ?? '',
            'created_on' => $request->created_on ?? '',
            'rounds' => $request->rounds ?? '',
            'partners' => $request->partners ?? '',
            'investors' => $request->investors ?? '',
            'raised' => $request->raised ?? '',
            'category' => $request->category ?? '',
        ]);

        if(!empty($fundinground)) {
            if(!empty($fundinground['logo'])) {
                $fundinground['logo'] = asset("/images/".self::UPLOAD_DIR."/". $fundinground['logo']);
            }
            return $this->sendSuccessResponse('FundingRound created successfully', ['fundinground' => $fundinground]);
        }
        return $this->sendFailedResponse('FundingRound creation failed');
    }

    public function put(Request $request, $id) {

        $validated = $this->validateRequest($request->all(), 'fundinground_put');

        if(!empty($validated)) {
            return $validated;
        }

        $updates = [
            'project' => $request->project ?? '',
            'created_on' => $request->created_on ?? '',
            'rounds' => $request->rounds ?? '',
            'partners' => $request->partners ?? '',
            'investors' => $request->investors ?? '',
            'raised' => $request->raised ?? '',
            'category' => $request->category ?? '',
        ];
        if($request->has('logo')) {
            $filename = $this->moveFileToStorage($request->file('logo'), self::UPLOAD_DIR);
            $updates['logo'] = $filename;
        }
        

        $fundinground = FundingRound::findOrFail($id)
            ->update($updates);
        
        if(!empty($fundinground)) {
            $fundinground = FundingRound::find($id)->toArray();
            if(!empty($fundinground['logo'])) {
                $fundinground['logo'] = asset("/images/".self::UPLOAD_DIR."/". $fundinground['logo']);
            }
            
            return $this->sendSuccessResponse('FundingRound updated successfully', ['fundinground' => $fundinground]);
        }
        return $this->sendFailedResponse('FundingRound updation failed');
    }

    public function delete(Request $request, $id) {
        $fundinground = FundingRound::findOrFail($id)
            ->delete();
        if(!empty($fundinground)) {
            return $this->sendSuccessResponse('FundingRound deleted successfully', [1]);
        }
        return $this->sendFailedResponse('FundingRound deletion failed');
    }
}