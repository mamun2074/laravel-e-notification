<?php

namespace Mamun2074\ENotification\Http\Controllers;

use Illuminate\Http\Request;
use Mamun2074\ENotification\Helpers\Helper;
use Mamun2074\ENotification\Models\NotificationCredential;

class NotificationCredentialController extends Controller
{

    public $route_name;
    public function __construct()
    {
        $this->route_name = config('enotification-config.route-name-prefix') . '_credentials.index';
    }

    /**
     *  Common breadcumb
     */
    protected $breadcrumb = [
        'breadcrumb_icon' => 'fas fa-brands',
        'home_icon' => 'dashboard',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $brand = new NotificationCredential();
            $limit = 10;
            $offset = 0;
            $search = [];
            $where = [];
            $with = [];
            $join = [];
            $orderBy = [];

            if ($request->input('length')) {
                $limit = $request->input('length');
            }

            if ($request->input('order')[0]['column'] != 0) {
                $column_name = $request->input('columns')[$request->input('order')[0]['column']]['name'];
                $sort = $request->input('order')[0]['dir'];
                $orderBy[$column_name] = $sort;
            } else {
                $orderBy['order'] = 'DESC';
            }
            if ($request->input('start')) {
                $offset = $request->input('start');
            }
            if ($request->input('search') && $request->input('search')['value'] != "") {
                $search['name'] = $request->input('search')['value'];
                $search['order'] = $request->input('search')['value'];
            }
            if ($request->input('where')) {
                $where = $request->input('where');
            }
            $brand = $brand->getDataForDataTable($limit, $offset, $search, $where, $with, $join, $orderBy,  $request->all());
            return response()->json($brand);
        }
        $data = [
            'common' => [
                'module_manage' => __('root.general_settings_brand.module_manage'),
                'breadcrumb_active_name' => __('root.common.list'),
                'current_module' => __('root.general_settings_brand.module_name'),
                'breadcrumb_icon' => $this->breadcrumb['breadcrumb_icon'],
                'route_name' =>  $this->route_name,
                'home' =>  __('root.common.dashboard'),
                'home_icon' =>  $this->breadcrumb['home_icon'],
                'action_name' => 'index',
            ]
        ];
        return view('enotification::admin.credentials.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'common' => [
                'module_manage' => __('root.general_settings_brand.module_manage'),
                'breadcrumb_active_name' => __('root.common.create'),
                'current_module' => __('root.general_settings_brand.module_name'),
                'breadcrumb_icon' => $this->breadcrumb['breadcrumb_icon'],
                'route_name' =>  $this->route_name,
                'home' => __('root.common.dashboard'),
                'home_icon' =>  $this->breadcrumb['home_icon'],
                'action_name' => 'create_or_update',
            ]
        ];
        return view('brand::brand.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image_path' => 'required|mimes:jpg,png,jp|dimensions:width=150,height=75',
        ]);
        $postData = [
            'name' => $request->name
        ];

        if ($request->hasFile('image_path')) {
            $filename =  Helper::getFileName($request->image_path->getClientOriginalName(), 1, 'image_path');
            $postData['image_path'] = $request->image_path->storeAs('uploads/brands/image_path', $filename);
        }
        NotificationCredential::create($postData);
    }

    /**
     * Display the specified resource.
     */
    public function show(NotificationCredential $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NotificationCredential $brand)
    {
        $data = [
            'common' => [
                'module_manage' => __('root.general_settings_brand.module_manage'),
                'breadcrumb_active_name' => __('root.common.update'),
                'current_module' => __('root.general_settings_brand.module_name'),
                'breadcrumb_icon' => $this->breadcrumb['breadcrumb_icon'],
                'route_name' =>  $this->route_name,
                'home' => __('root.common.dashboard'),
                'home_icon' =>  $this->breadcrumb['home_icon'],
                'action_name' => 'create_or_update',
            ],
            'brand' => $brand
        ];
        return view('brand::brand.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NotificationCredential $brand)
    {

        $request->validate([
            'image_path' => 'nullable|mimes:jpg,png,jp|dimensions:width=562,height=643',
        ]);
        $postData = [
            'name' => $request->name
        ];

        if ($request->hasFile('image_path')) {
            $filename = Helper::getFileName($request->image_path->getClientOriginalName(), 1, 'image_path');
            $postData['image_path'] = $request->image_path->storeAs('uploads/brands/image_path', $filename);
        } else {
            $postData['image_path'] = $brand->image_path;
        }
        return $brand->update($postData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NotificationCredential $brand)
    {
        Helper::deleteFile($brand->image_path);
        $brand->delete();
    }

    /**
     * This function change status
     *
     * @author      Md. Al-Mahmud <mamun120520@gmail.com>
     * @version     1.0
     * @see         
     * @since       07/13/2023
     * Time         22:34:28
     * @param       
     * @return      
     */
    public function updateStatus(NotificationCredential $brand)
    {
        $status = ($brand->status == 1) ? 0 : 1;
        $brand->update(['status' => $status]);
    }
    #end
}
