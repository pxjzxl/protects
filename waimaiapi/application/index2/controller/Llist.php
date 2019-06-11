<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2019/5/10
 * Time: 11:13
 */

namespace app\index2\controller;
use think\Controller;
use app\index2\model\Llist as LlistModel;
use think\Request;

class Llist extends Controller
{
    public function shops(Request $request)
    {
        $latitude = $request->param('latitude');
        $longitude = $request->param('longitude');
        if($latitude && $longitude) {
            $activites = LlistModel::with('activites')
                ->with('licence')
                ->with('supports')
                ->with('unknow')
                ->with('DeliveryMode')
                ->where('longitude', $longitude)
                ->where('latitude', $latitude)
                ->select();
            $data = [
                "code" => 0,
                "data" => $activites
            ];
            return json($data);
       } else {
           $data = [
               'code' => 1,
               'msg' => '请输入经纬度'
           ];
           return json($data);
       }
    }
    

    public function search_shops(Request $request) {
       $geobash = $request->param('geobash');
       $keyword = $request->param('keyword');
        if($keyword && $geobash) {
            $user = LlistModel::where('name','like','%'.$keyword.'%' )
                ->where('geobash',$geobash)
                ->find();
            if($user) {
                $data = [
                    'code' => 0,
                    'data' => [
                        'name' => $user['name'],
                        'address' => $user['address'],
                        'id' =>$user['id'],
                        'latitude' => $user['latitude'],
                        'longitude' => $user['longitude'],
                        'location' => [
                            $user['latitude'],
                            $user['longitude']
                        ],
                        'phone' => $user['phone'],
                        'category' => $user['category'],
                        'supports' => [
                            'description' => $user->unknow->description,
                            'icon_color' => $user->unknow->icon_color,
                            'icon_name' => $user->unknow->icon_name,
                            'id' => $user->unknow->id,
                            'name' => $user->unknow->name,
                            '_id' => $user->unknow->_id,
                            'status' =>$user->unknow->status,
                            'recent_order_num' =>$user->unknow->recent_order_num,
                            'rating_count' =>$user->unknow->rating_count,
                            'rating' =>$user->unknow->rating,
                            'promotion_info' => $user->unknow->promotion_info,
                            'piecewise_agent_fee' => [
                                'tips' => $user->unknow->tips
                            ],
                            'opening_hours' => [
                                $user->unknow->opening_hours
                            ],
                        ],
                        'license'=> [
                            'catering_service_license_image'=>"",
                            'business_license_image' => ""
                        ],
                        'is_new'=> $user->licence->is_new,
                        'is_premium' => $user->licence->is_premium,
                        'image_path'=>$user->licence->image_path,
                        'identification' => [
                            'registered_number' => "",
                            'registered_address' =>"",
                            'operation_period' =>"",
                            'licenses_scope' =>"",
                            'licenses_number' =>"",
                            'licenses_date' =>"",
                            'legal_person' =>"",
                            'identificate_date' => null,
                            'identificate_agency' => "",
                            'company_name' =>""
                        ],
                        'float_minimum_order_amount' =>$user->licence->float_minimum_order_amount,
                        'float_delivery_fee' =>$user->licence->float_delivery_fee,
                        'distance' =>$user->licence->distance,
                        'order_lead_time' => $user->licence->order_lead_time,
                        'description' =>$user->licence->description,
                        'delivery_mode' => [
                            'color' => $user->licence->color,
                            'id' =>$user->licence->id,
                            'is_solid' => $user->licence->is_solid,
                            'text' => $user->licence->text
                        ],
                    ],
                    'activities' => [
                        [
                            'icon_name' => $user->activites->icon_name,
                            'name' =>$user->activites->name,
                            'description' =>$user->activites->description,
                            'icon_color' => $user->activites->icon_color,
                            'id' => $user->activites->id,
                            '_id' => $user->activites->_id
                        ]
                    ],
                ];
                return json($data);
            } else {
                $data = [
                    'code' => 1,
                    'msg' => '没找到商家'
                ];
                return json($data);
            }
        } else {
            $data = [
                'code' => 1,
                'msg' => '请输入经纬度和关键字'
            ];
            return json_encode($data);
        }
    }
}