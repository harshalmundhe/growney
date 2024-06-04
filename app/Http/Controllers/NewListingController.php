<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewListing;

class NewListingController extends Controller
{
    const UPLOAD_DIR = 'newlisting';

    public function index(Request $request) {
        $validated = $this->validateRequest($request->all(), 'newlisting_index');

        if(!empty($validated)) {
            return $validated;
        }
        if($request->has('nolimit')) {
            $listing = NewListing::get()->toArray();

            if(!empty($listing)) {
                foreach($listing as $v) {
                    $investorPath = [];
                    $v['logo'] = asset("/images/".self::UPLOAD_DIR."/". $v['logo']);
                    $investors = json_decode($v['investors'], true);
                    if(!empty($investors)) {
                        foreach($investors as $investor) {
                            $investorPath[] = asset("/images/".self::UPLOAD_DIR."/". $investor);
                        }
                    }
                    
                    $v['investors'] = $investorPath;
                    $data['collection'][] = $v;
                }
                return $this->sendSuccessResponse('Activty listed successfully', $data);
            }
        } else {
            $listing = NewListing::paginate(10);
            if(!empty($listing)) {
                foreach($listing->items() as $v) {
                    $investorPath = [];
                    $v['logo'] = asset("/images/".self::UPLOAD_DIR."/". $v['logo']);
                    $investors = json_decode($v['investors'], true);
                    if(!empty($investors)) {
                        foreach($investors as $investor) {
                            $investorPath[] = asset("/images/".self::UPLOAD_DIR."/". $investor);
                        }
                    }
                    $v['investors'] = $investorPath;
                    $data['collection'][] = $v;
                }
                $data['pagination'] = $this->getPagination($listing);
                return $this->sendSuccessResponse('Activty listed successfully', $data);
            }
        }
        return $this->sendFailedResponse('Activty listing failed');
    } 

    public function post(Request $request) {
        
        $validated = $this->validateRequest($request->all(), 'newlisting_post');

        if(!empty($validated)) {
            return $validated;
        }

        $investors = [];
        $filename = $this->moveFileToStorage($request->file('logo'), self::UPLOAD_DIR);
        if($request->has('investors')) {
            foreach ($request->file('investors') as $file) {
                $investors[] = $this->moveFileToStorage($file, self::UPLOAD_DIR);
            }
        }

        $listing = NewListing::create([
            'logo' => $filename,
            'name' => $request->name,
            'created_on' => $request->created_on,
            'investors' => json_encode($investors),
            'category' => $request->category,
            'network' => $request->network,
            'max_supply' => $request->max_supply
        ]);

        if(!empty($listing)) {
            $investorPath = [];
            $listing['logo'] = asset("/images/".self::UPLOAD_DIR."/". $listing['logo']);
            $investors = json_decode($listing['investors'], true);
            if(!empty($investors)) {
                foreach($investors as $investor) {
                    $investorPath[] = asset("/images/".self::UPLOAD_DIR."/". $investor);
                }
            }
            
            $listing['investors'] = $investorPath;
            return $this->sendSuccessResponse('Activty created successfully', ['listing' => $listing]);
        }
        return $this->sendFailedResponse('Activty creation failed');
    }

    public function put(Request $request, $id) {

        $validated = $this->validateRequest($request->all(), 'newlisting_put');

        if(!empty($validated)) {
            return $validated;
        }

        $updates = [
            'name' => $request->name,
            'category' => $request->category,
            'network' => $request->network,
            'max_supply' => $request->max_supply
        ];
        if($request->has('logo')) {
            $filename = $this->moveFileToStorage($request->file('logo'), self::UPLOAD_DIR);
            $updates['logo'] = $filename;
        }
        if($request->has('investors')) {
            foreach ($request->file('investors') as $file) {
                $investors[] = $this->moveFileToStorage($file, self::UPLOAD_DIR);
            }
            $updates['investors'] = json_encode($investors);
        }
        

        $listing = NewListing::findOrFail($id)
            ->update($updates);
        
        if(!empty($listing)) {
            $listing = NewListing::find($id)->toArray();
            $investorPath = [];
            $listing['logo'] = asset("/images/".self::UPLOAD_DIR."/". $listing['logo']);
            $investors = json_decode($listing['investors'], true);
            if(!empty($investors)) {
                foreach($investors as $investor) {
                    $investorPath[] = asset("/images/".self::UPLOAD_DIR."/". $investor);
                }
            }
            
            $listing['investors'] = $investorPath;
            
            return $this->sendSuccessResponse('Activty updated successfully', ['listing' => $listing]);
        }
        return $this->sendFailedResponse('Activty updation failed');
    }

    public function delete(Request $request, $id) {
        $listing = NewListing::findOrFail($id)
            ->delete();
        if(!empty($listing)) {
            return $this->sendSuccessResponse('Activty deleted successfully', [1]);
        }
        return $this->sendFailedResponse('Activty deletion failed');
    }
}