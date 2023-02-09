<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Category;
use App\Models\Menu;
use App\Models\MenuDetail;
use App\Models\SiteInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $siteInformation = SiteInformation::first();
        return View::share(compact('siteInformation'));
    }

    public function menu()
    {
        $title = "Menu List";
        $menuList = Menu::get();
        return view('Admin.menu.list', compact('menuList', 'title'));
    }

    public function menu_create()
    {
        $key = "Create";
        $title = "Create Menu";
        $categories = Category::active()->whereNull('parent_id')->get();
        return view('Admin.menu.form', compact('key', 'title', 'categories'));
    }

    public function menu_store(Request $request)
    {
        // dd ($request->all());
        $validatedData = $request->validate([
            'title' => 'required',
            'menu_type' => 'required',
            'url' => 'required'
        ]);
        $menu = new Menu;
        $menu->title = $validatedData['title'];
        $menu->menu_type = $validatedData['menu_type'];
        $exist = 0;
        if ($request->menu_type == "static") {
            $menu->url = $request->url ?? '';
            // if ($request->static_link == "custom") {
            // } else {
            //     $menu->url = $request->static_link;
            // }
            // $menu->static_link = $request->static_link;
            /*if($menu->url!=NULL){
            	$exist = Menu::where('url','=',$menu->url)->count();
            	$category_name = "Menu '".$menu->url;
            }else{
                $exist = 0;
                $category_name = "Menu";
            }*/
        }
        if ($request->menu_type == "category") {
            $menu->url = ($request->url) ? $request->url : '';
            $menu->category_id = $request->menu_category_id;
            /*if($menu->url!=NULL){
            	$exist = Menu::where('category_id','=',$request->menu_category_id)->count();
            	$category_name = "Menu '".$menu->url;
            }else{
                $exist = 0;
                $category_name = "Menu";
            }*/
        }
        if ($exist == 0) {
            $sort_order = Menu::orderBy('id', 'DESC')->first();
            if ($sort_order) {
                $sort_number = ($sort_order->sort_order + 1);
            } else {
                $sort_number = 1;
            }

            $menu->sort_order = $sort_number;
            if ($menu->save()) {
                session()->flash('success', 'Menu has been added successfully');
                return redirect(Helper::sitePrefix() . 'menu');
            } else {
                return back()->withInput($request->input())->withErrors("Error while updating the menu");
            }
        } else {
            return back()->withInput($request->input())->withErrors($category_name . "' already tagged with another page");
        }
    }

    public function menu_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update menu";
        $menu = Menu::find($id);
        if ($menu) {
            $categories = Category::active()->whereNull('parent_id')->get();
            return view('Admin.menu.form', compact('key', 'menu', 'title', 'categories'));
        } else {
            return view('Admin.error.404');
        }
    }

    public function menu_update(Request $request, $id)
    {
        $menu = Menu::find($id);
        $validatedData = $request->validate([
            'title' => 'required',
            'menu_type' => 'required',
        ]);
        $menu->title = $validatedData['title'];
        $menu->menu_type = $validatedData['menu_type'];
        $exist = 0;
        if ($request->menu_type == "static") {
            if ($request->static_link == "custom") {
                $menu->url = $request->url ?? '';
            } else {
                $menu->url = $request->static_link;
            }
            $menu->static_link = $request->static_link;
            $menu->category_id = NULL;
            /*if($request->url!=NULL){
            	$exist = Menu::where([['url','=',$menu->url],['id','!=',$id]])->count();
            	$category_name = "Menu '".$menu->url;
            }else{
                $exist = 0;
                $category_name = "Menu";
            }*/
        }
        if ($request->menu_type == "category") {
            $menu->category_id = $request->menu_category_id;
            $menu->url = ($request->url) ? $request->url : '';
            /*if($request->url!=NULL){
                $exist = Menu::where([['category_id','=',$request->menu_category_id],['id','!=',$id]])->count();
                $category_name = "Category '".$menu->category->title;
            }else{
                $exist=0;
                $category_name = "Category";
            }*/
        }
        $menu->updated_at = date('Y-m-d h:i:s');
        if ($exist == 0) {

            if ($menu->save()) {
                session()->flash('success', 'Menu has been updated successfully');
                return redirect(Helper::sitePrefix() . 'menu');
            } else {
                return back()->withInput($request->input())->withErrors("Error while updating the menu");
            }
        } else {
            return back()->withInput($request->input())->withErrors($category_name . "' already tagged with another page");
        }
    }

    public function delete_menu(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $menu = Menu::find($request->id);
            if ($menu) {
              $delete_menu_details = MenuDetail::where('menu_id',$request->id)->delete();
                $deleted = $menu->delete();
                if ($deleted == true) {
                    echo(json_encode(array('status' => true)));
                } else {
                    echo(json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo(json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo(json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function sub_category_by_menu(Request $request)
    {
        $menu = Menu::find($request->id);
        if ($menu) {
            $subCategories = Category::active()->where('parent_id', $menu->category_id)->get();
            return response()->json(['status' => true, 'message' => $subCategories]);
        } else {
            return view('Admin.error.404');
        }
    }

    public function menu_detail()
    {
        $title = "Menu Detail List";
        $menuList = MenuDetail::get();
   
        return view('Admin.menu.detail.list', compact('menuList', 'title'));
    }

    public function menu_detail_create()
    {
        $key = "Create";
        $title = "Create Menu Detail";
        $menus = Menu::active()->where('menu_type', 'category')->get();
        return view('Admin.menu.detail.form', compact('key', 'title', 'menus'));
    }

    public function menu_detail_store(Request $request)
    {
        $validatedData = $request->validate([
            'menu_id' => 'required',
        ]);
        $menuDetail = new MenuDetail;
        $menuDetail->menu_id = $validatedData['menu_id'];
        $menuDetail->category_id = implode(',', $request->category_id) ?? '';
        if ($menuDetail->save()) {
            session()->flash('success', 'Menu Detail has been added successfully');
            return redirect(Helper::sitePrefix() . 'menu/detail');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the menu detail");
        }
    }

    public function menu_detail_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Menu Details";
        $menuDetail = MenuDetail::find($id);
        if ($menuDetail) {
            $menus = Menu::where('menu_type', 'category')->get();
            $categories = Category::active()->where('parent_id', $menuDetail->menu->category_id)->get();
            return view('Admin.menu.detail.form', compact('key', 'menuDetail', 'title', 'menus', 'categories'));
        } else {
            return view('Admin.error.404');
        }
    }

    public function menu_detail_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'menu_id' => 'required',
        ]);
        $menu = MenuDetail::find($id);
        if ($menu) {
            $menu->menu_id = $validatedData['menu_id'];
            $menu->category_id = ($request->category_id) ? implode(',', $request->category_id) : '';
            if ($menu->save()) {
                session()->flash('success', 'Menu details has been added successfully');
                return redirect(Helper::sitePrefix() . 'menu/detail');
            } else {
                return back()->withInput($request->input())->withErrors("Error while updating the menu details");
            }
        } else {
            return view('errors.404');
        }
    }

    public function delete_detail_menu(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $detail = MenuDetail::find($request->id);
            if ($detail) {
                if ($detail->delete()) {
                    return response()->json(['status' => true]);
                } else {
                    return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }

    }
}
