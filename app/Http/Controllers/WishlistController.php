<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use DB;

class WishlistController extends Controller
{
    public function index(Request $request) {
        $user_id = auth()->user()->id;

        $wishlist = Wishlist::where('user_id', $user_id)->get()->toArray();
        if(empty($wishlist)) {
            return $this->sendFailedResponse('Wishlist is empty');
        }

        $return = [];
        
        foreach ($wishlist as $key => $value) {
            $res = [];
            $upload_dir = config('app.upload_dir.' . $value['table_name']);
            $res = (array) DB::table($value['table_name'])
                    ->where('id', $value['item_id'])
                    ->first();
            if(!empty($res)) {
                $res['wishlist_id'] = $value['id'];
                $res['logo'] = asset("/images/".$upload_dir."/". $res['logo']);
                $res['share'] = @json_decode($res['share'], true);
                if(!empty($res['investors'])) {
                    $investors = @json_decode($v['investors'], true);
                    if(!empty($investors)) {
                        $investorPath = [];
                        foreach($investors as $investor) {
                            $investorPath[] = asset("/images/".self::UPLOAD_DIR."/". $investor);
                        }
                        $res['investors'] = $investorPath;
                    }
                }
                $return[$value['table_name']][] = $res;
            }
        }
        return $this->sendSuccessResponse('Wishlist created successfully', ['wishlist' => $return]);
    }

    public function post(Request $request) {
        $validated = $this->validateRequest($request->all(), 'wishlist_post');

        if(!empty($validated)) {
            return $validated;
        }

        try {
            $table = $request->table_name;
            $res = DB::table($table)
                    ->where('id', $request->item_id)
                    ->get();
            if(empty($res)) {
                return $this->sendFailedResponse('Item Id not found');
            }
            $wishlist = Wishlist::create([
                'item_id' => $request->item_id,
                'user_id' => auth()->user()->id,
                'table_name' => $table
            ]);

            if(!empty($wishlist)) {
                return $this->sendSuccessResponse('Wishlist created successfully', ['wishlist' => $wishlist]);
            }

            return $this->sendFailedResponse('Item Id not found');
        } catch (\Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }
    }

    public function delete(Request $request, $id) {
        try {
            $wishlist = Wishlist::findOrFail($id)
                    ->delete();
            if(!empty($wishlist)) {
                return $this->sendSuccessResponse('Wishlist deleted successfully', [1]);
            }
        } catch (\Exception $e) {
            return $this->sendFailedResponse('Wishlist deletion failed');
        }
    }
}