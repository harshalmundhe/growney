<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IdoIeo;

class IdoIeoController extends Controller
{
    const UPLOAD_DIR = 'idoieo';

    public function index(Request $request) {
        $validated = $this->validateRequest($request->all(), 'idoieo_index');

        if(!empty($validated)) {
            return $validated;
        }
        if($request->has('nolimit')) {
            $ideieo = IdoIeo::get()->toArray();

            if(!empty($ideieo)) {
                foreach($ideieo as $v) {
                    if(!empty($v['logo'])) {
                        $v['logo'] = asset("/images/".self::UPLOAD_DIR."/". $v['logo']);
                    }
                    $v['share'] = @json_decode($v['share'], true);
                    $data['collection'][] = $v;
                }
                return $this->sendSuccessResponse('IdoIeo listed successfully', $data);
            }
        } else {
            $ideieo = IdoIeo::paginate(10);
            if(!empty($ideieo)) {
                foreach($ideieo->items() as $v) {
                    if(!empty($v['logo'])) {
                        $v['logo'] = asset("/images/".self::UPLOAD_DIR."/". $v['logo']);
                    }
                    $v['share'] = @json_decode($v['share'], true);
                    $data['collection'][] = $v;
                }
                $data['pagination'] = $this->getPagination($ideieo);
                return $this->sendSuccessResponse('IdoIeo listed successfully', $data);
            }
        }
        return $this->sendFailedResponse('IdoIeo ideieo failed');
    } 

    public function view(Request $request, $id) {
        try {
            $ideieo = IdoIeo::findOrFail($id)->toArray();
            if(!empty($ideieo['logo'])) {
                $ideieo['logo'] = asset("/images/".self::UPLOAD_DIR."/". $ideieo['logo']);
            }
            $ideieo['share'] = @json_decode($ideieo['share'], true);
            return $this->sendSuccessResponse('IdoIeo view successfully', $ideieo);
        } catch (\Exception $e) {
            return $this->sendFailedResponse('IdoIeo view failed');
        }
    }

    public function post(Request $request) {
        
        $validated = $this->validateRequest($request->all(), 'idoieo_post');

        if(!empty($validated)) {
            return $validated;
        }

        if($request->has('logo')) {
            $filename = $this->moveFileToStorage($request->file('logo'), self::UPLOAD_DIR);
        }

        $ideieo = IdoIeo::create([
            'logo' => $filename ?? '',
            'project' => $request->project  ?? '',
            'backed_by' => $request->backed_by  ?? '',
            'partners' => $request->partners  ?? '',
            'coin_token_sale_partner' => $request->coin_token_sale_partner  ?? '',
            'audits' => $request->audits  ?? '',
            'share' => json_encode($request->share ?? [])
        ]);

        if(!empty($ideieo)) {
            if(!empty($ideieo['logo'])) {
                $ideieo['logo'] = asset("/images/".self::UPLOAD_DIR."/". $ideieo['logo']);
            }
            $ideieo['share'] = @json_decode($ideieo['share'], true);
            return $this->sendSuccessResponse('IdoIeo created successfully', ['ideieo' => $ideieo]);
        }
        return $this->sendFailedResponse('IdoIeo creation failed');
    }

    public function put(Request $request, $id) {

        $validated = $this->validateRequest($request->all(), 'idoieo_put');

        if(!empty($validated)) {
            return $validated;
        }

        $updates = [
            'project' => $request->project ?? '',
            'backed_by' => $request->backed_by ?? '',
            'partners' => $request->partners ?? '',
            'coin_token_sale_partner' => $request->coin_token_sale_partner ?? '',
            'audits' => $request->audits ?? '',
            'share' => json_encode($request->share ?? [])
        ];
        if($request->has('logo')) {
            $filename = $this->moveFileToStorage($request->file('logo'), self::UPLOAD_DIR);
            $updates['logo'] = $filename;
        }
        

        $ideieo = IdoIeo::findOrFail($id)
            ->update($updates);
        
        if(!empty($ideieo)) {
            $ideieo = IdoIeo::find($id)->toArray();
            if(!empty($ideieo['logo'])) {
                $ideieo['logo'] = asset("/images/".self::UPLOAD_DIR."/". $ideieo['logo']);
            }
            $ideieo['share'] = @json_decode($ideieo['share'], true);
            
            return $this->sendSuccessResponse('IdoIeo updated successfully', ['ideieo' => $ideieo]);
        }
        return $this->sendFailedResponse('IdoIeo updation failed');
    }

    public function delete(Request $request, $id) {
        $ideieo = IdoIeo::findOrFail($id)
            ->delete();
        if(!empty($ideieo)) {
            return $this->sendSuccessResponse('IdoIeo deleted successfully', [1]);
        }
        return $this->sendFailedResponse('IdoIeo deletion failed');
    }
}