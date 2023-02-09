<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Color;
use App\Models\MeasurementUnit;
use App\Models\SiteInformation;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AttributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $siteInformation = SiteInformation::first();
        return View::share(compact('siteInformation'));
    }

    /************************************* Color starts ****************************************/
    public function color()
    {
        $title = "Color List";
        $colorList = Color::get();
        return view('Admin.product.color.list', compact('colorList', 'title'));
    }

    public function color_create()
    {
        $key = "Create";
        $title = "Create Color";
        return view('Admin.product.color.form', compact('key', 'title'));
    }

    public function color_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:colors,title,NULL,id,deleted_at,NULL',
            'code' => 'required|unique:colors,code,NULL,id,deleted_at,NULL',
        ]);
        $color = new Color;
        $color->title = $validatedData['title'];
        $color->code = $validatedData['code'];
        if ($color->save()) {
            session()->flash('message', "Color '" . $color->title . "' has been added successfully");
            return redirect(Helper::sitePrefix() . 'product/color');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the color");
        }
    }

    public function color_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Color";
        $color = Color::find($id);
        if ($color) {
            return view('Admin.product.color.form', compact('key', 'color', 'title'));
        } else {
            return view('Admin.error.404');
        }
    }

    public function color_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:colors,title,' . $id,
            'code' => 'required|unique:colors,code,' . $id,
        ]);
        $color = Color::find($id);
        $color->title = $validatedData['title'];
        $color->code = $validatedData['code'];
        $color->updated_at = now();
        if ($color->save()) {
            session()->flash('message', "Color '" . $color->title . "' has been updated successfully");
            return redirect(Helper::sitePrefix() . 'product/color');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the color");
        }
    }

    public function delete_color(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $color = Color::find($request->id);
            if ($color) {
                $deleted = $color->delete();
                if ($deleted == true) {
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


    /************************************* Tag starts ****************************************/
    public function tag()
    {
        $title = "Tag List";
        $tagList = Tag::get();
        return view('Admin.product.tag.list', compact('tagList', 'title'));
    }

    public function tag_create()
    {
        $key = "Create";
        $title = "Create Tag";
        return view('Admin.product.tag.form', compact('key', 'title'));
    }

    public function tag_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:tags,title',
        ]);
        $tag = new Tag;
        $tag->title = $validatedData['title'];
        if ($tag->save()) {
            session()->flash('success', "Tag '" . $tag->title . "' has been added successfully");
            return redirect(Helper::sitePrefix() . 'product/tag');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the tag");
        }
    }

    public function tag_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Tag";
        $tag = Tag::find($id);
        if ($tag) {
            return view('Admin.product.tag.form', compact('key', 'tag', 'title'));
        } else {
            return view('Admin.error.404');
        }
    }

    public function tag_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:tags,title,' . $id,
        ]);
        $tag = Tag::find($id);
        $tag->title = $validatedData['title'];
        $tag->updated_at = now();
        if ($tag->save()) {
            session()->flash('success', "Tag '" . $tag->title . "' has been updated successfully");
            return redirect(Helper::sitePrefix() . 'product/tag');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the tag");
        }
    }

    public function delete_tag(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $tag = Tag::find($request->id);
            if ($tag) {
                if ($tag->delete()) {
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

    /************************************* Measurement Unit starts ****************************************/
    public function measurement_unit()
    {
        $title = "Measurement Unit List";
        $measurementUnitList = MeasurementUnit::get();
        return view('Admin.product.measurement_unit.list', compact('measurementUnitList', 'title'));
    }

    public function measurement_unit_create()
    {
        $key = "Create";
        $title = "Create Measurement Unit";
        return view('Admin.product.measurement_unit.form', compact('key', 'title'));
    }

    public function measurement_unit_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:measurement_units,title',
            'symbol' => 'required|unique:measurement_units,symbol',
        ]);
        $measurement_unit = new MeasurementUnit;
        $measurement_unit->title = $validatedData['title'];
        $measurement_unit->symbol = $validatedData['symbol'];
        if ($measurement_unit->save()) {
            session()->flash('success', "Measurement Unit '" . $measurement_unit->title . "' has been added successfully");
            return redirect(Helper::sitePrefix() . 'product/measurement-unit');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the measurement unit");
        }
    }

    public function measurement_unit_edit($id)
    {
        $key = "Update";
        $title = "Update Measurement Unit";
        $measurement_unit = MeasurementUnit::find($id);
        if ($measurement_unit) {
            return view('Admin.product.measurement_unit.form', compact('key', 'measurement_unit', 'title'));
        } else {
            return view('Admin.error.404');
        }
    }

    public function measurement_unit_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:measurement_units,title,' . $id,
            'symbol' => 'required|unique:measurement_units,symbol,' . $id,
        ]);
        $measurement_unit = MeasurementUnit::find($id);
        $measurement_unit->title = $validatedData['title'];
        $measurement_unit->symbol = $validatedData['symbol'];
        $measurement_unit->updated_at = now();
        if ($measurement_unit->save()) {
            session()->flash('success', "Measurement Unit '" . $measurement_unit->title . "' has been updated successfully");
            return redirect(Helper::sitePrefix() . 'product/measurement-unit');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the measurement unit");
        }
    }

    public function delete_measurement_unit(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $measurement_unit = MeasurementUnit::find($request->id);
            if ($measurement_unit) {
                if ($measurement_unit->delete()) {
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
