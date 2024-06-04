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
            $ideieo = FundingRound::get()->toArray();

            if(!empty($ideieo)) {
                foreach($ideieo as $v) {
                    $v['logo'] = asset("/images/".self::UPLOAD_DIR."/". $v['logo']);
                    $data['collection'][] = $v;
                }
                return $this->sendSuccessResponse('FundingRound listed successfully', $data);
            }
        } else {
            $ideieo = FundingRound::paginate(10);
            if(!empty($ideieo)) {
                foreach($ideieo->items() as $v) {
                    $v['logo'] = asset("/images/".self::UPLOAD_DIR."/". $v['logo']);
                    $data['collection'][] = $v;
                }
                $data['pagination'] = $this->getPagination($ideieo);
                return $this->sendSuccessResponse('FundingRound listed successfully', $data);
            }
        }
        return $this->sendFailedResponse('FundingRound ideieo failed');
    } 

    public function post(Request $request) {
        
        $validated = $this->validateRequest($request->all(), 'fundinground_post');

        if(!empty($validated)) {
            return $validated;
        }

        $investors = [];
        $filename = $this->moveFileToStorage($request->file('logo'), self::UPLOAD_DIR);

        $ideieo = FundingRound::create([
            'logo' => $filename,
            'project' => $request->project,
            'created_on' => $request->created_on,
            'rounds' => $request->rounds,
            'partners' => $request->partners,
            'investors' => $request->investors,
            'raised' => $request->raised,
            'category' => $request->category,
        ]);

        if(!empty($ideieo)) {
            $investorPath = [];
            $ideieo['logo'] = asset("/images/".self::UPLOAD_DIR."/". $ideieo['logo']);
            return $this->sendSuccessResponse('FundingRound created successfully', ['ideieo' => $ideieo]);
        }
        return $this->sendFailedResponse('FundingRound creation failed');
    }

    public function put(Request $request, $id) {

        $validated = $this->validateRequest($request->all(), 'fundinground_put');

        if(!empty($validated)) {
            return $validated;
        }

        $updates = [
            'project' => $request->project,
            'created_on' => $request->created_on,
            'rounds' => $request->rounds,
            'partners' => $request->partners,
            'investors' => $request->investors,
            'raised' => $request->raised,
            'category' => $request->category,
        ];
        if($request->has('logo')) {
            $filename = $this->moveFileToStorage($request->file('logo'), self::UPLOAD_DIR);
            $updates['logo'] = $filename;
        }
        

        $ideieo = FundingRound::findOrFail($id)
            ->update($updates);
        
        if(!empty($ideieo)) {
            $ideieo = FundingRound::find($id)->toArray();
            $investorPath = [];
            $ideieo['logo'] = asset("/images/".self::UPLOAD_DIR."/". $ideieo['logo']);
            
            return $this->sendSuccessResponse('FundingRound updated successfully', ['ideieo' => $ideieo]);
        }
        return $this->sendFailedResponse('FundingRound updation failed');
    }

    public function delete(Request $request, $id) {
        $ideieo = FundingRound::findOrFail($id)
            ->delete();
        if(!empty($ideieo)) {
            return $this->sendSuccessResponse('FundingRound deleted successfully', [1]);
        }
        return $this->sendFailedResponse('FundingRound deletion failed');
    }
}