<?php

namespace App\Http\Controllers\Backend\Modules\Widgets;

use App\Http\Controllers\Backend\BackendController;
use App\Module;
use App\Modules\Widgets\Slider\Slider;
use App\Modules\Widgets\Slider\SliderDetail;
use App\Modules\Widgets\Slider\SliderItem;
use App\Role;
use App\User;
use File;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class SliderController extends BackendController
{

    /**
     * Display a listing of the modules.
     *
     * @return \Illuminate\Http\Response
     */
	 //public function __construct(Slider $sliderDetails, SliderDetail $slider)
    //{
      //$this->sliderDetails = $sliderDetails;
      //$this->homeSlideshow = $slider;
    //}
	
    public function index($moduleId)
    {
       // $this->registerPermissionAs('edit-module');
//
//        return view(backendModuleViewUrl('slider.index'))->with([
//            'modules' => Module::all(),
//            'data' => Slider::all()
//        ]);
    }
	

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //set permission for this function
        $this->registerPermissionAs('edit-module');

        return view('backend.modules.slider.create')->with([
            'roles' => Role::get()
        ]);
    }

	public function createItem($moduleId)
	{
		//set permission for this function
		$this->registerPermissionAs('edit-module');

		return view('backend.modules.widgets.slider.create-item')->with([
            'module' => Module::find($moduleId),
            'slider' => Slider::where('module_id', $moduleId)->first()
        ]);
	}

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $moduleId
     * @return \Illuminate\Http\Response
     */
    public function storeItem(Request $request, $moduleId)
    {
        $this->registerPermissionAs('edit-module');
		
		//Validation text
		$this->validate($request, [
			'image' => 'required',
			'title' => 'required|max:255',
		]);
		
		//$file = Input::file('image');
		$destinationPath = 'uploads/slider';
		$extension = Input::file('image')->getClientOriginalExtension();
		//dd($extension);
		
		$fileName = rand(11111,99999).'.'.$extension;
		Input::file('image')->move($destinationPath, $fileName);
		
		$sliderItem = new SliderItem;//Slider is name of model
		$sliderItem->image = $fileName;
        $sliderItem->slider_id = $request->slider_id;
		$sliderItem->title = $request->title;//$sliderItem->column_name = $request->input_name
		$sliderItem->save();
		
		$insertId = $sliderItem->id;
		
		if(isset($request->lineText1)){
			if($request->lineText1 != ''){
				$sliderDetail = new SliderDetail;//Slider is name of model
				$sliderDetail->text = $request->lineText1;
				$sliderDetail->color = $request->colorText1;
				//$sliderDetail->bg_color = $request->backgroundText1;
				$sliderDetail->font_size = $request->fontSizeText1 < 11 ? 11 : $request->fontSizeText1;
				//$sliderDetail->url = $request->urlText1;
				$sliderDetail->slider_item_id = $insertId;
				$sliderDetail->animation_id = 1;
				$sliderDetail->save();
			}
		}
		if(isset($request->lineText2)){
			if($request->lineText2 != ''){
				
				$sliderDetail = new SliderDetail;//Slider is name of model

				$sliderDetail->text = $request->lineText2;
				$sliderDetail->color = $request->colorText2;
				//$sliderDetail->bg_color = $request->backgroundText1;
				$sliderDetail->font_size = $request->fontSizeText2 < 11 ? 11 : $request->fontSizeText2;
				//$sliderDetail->url = $request->urlText1;
				$sliderDetail->slider_item_id = $insertId;
				$sliderDetail->animation_id = 2;
				$sliderDetail->save();
			}
		}
		if(isset($request->lineText3)){
			if($request->lineText3 != ''){
				
				$sliderDetail = new SliderDetail;//Slider is name of model

				$sliderDetail->text = $request->lineText3;
				$sliderDetail->color = $request->colorText3;
				//$sliderDetail->bg_color = $request->backgroundText1;
				$sliderDetail->font_size = $request->fontSizeText3 < 11 ? 11 : $request->fontSizeText3;
				//$sliderDetail->url = $request->urlText1;
				$sliderDetail->slider_item_id = $insertId;
				$sliderDetail->animation_id = 3;
				$sliderDetail->save();
			}
		}
		
        Session::flash('flash_message', 'Slider has been saved!');
		//return Slider::json(array('success' => true, 'last_insert_id' => $slider->id), 200);
        return redirect(backendUrl('slider/module/'.$moduleId));
    }

    /**
     * Display the specified user.
     *
     * @param $moduleId
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($moduleId)
    {
        $this->registerPermissionAs('edit-module');

        $slider = Slider::where('module_id', $moduleId)->first();

        //auto create slider if it does not exist
        if($slider == null) {
            $slider = Slider::create([
               'module_id' => $moduleId
            ]);
        }

        $sliderItems = SliderItem::where('slider_id', $slider->id)->get();

        return view(backendModuleViewUrl('widgets.slider.index'))->with([
            'slider' => $slider,
            'items' => $sliderItems,
            'module' => Module::find($moduleId)
        ]);
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$this->registerPermissionAs('edit-module');
		//dd(SliderDetail::where('slider_id', $id)->get())
        //return view('backend.modules.widgets.slider.edit')->with([
		//	'slider' => Slider::find($id),
		//	'slideDetail' => SliderDetail::where('slider_id', $id)->get(),
        //]);
		
    }

    public function editItem($moduleId, $id)
    {
        $this->registerPermissionAs('edit-module');
        //dd(SliderDetail::where('slider_id', $id)->get())
        return view('backend.modules.widgets.slider.edit-item')->with([
            'module' => Module::find($moduleId),
            'sliderItem' => SliderItem::find($id),
            'slideDetail' => SliderDetail::where('slider_item_id', $id)->get(),
        ]);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateItem(Request $request, $moduleId, $id)
    {
        $this->registerPermissionAs('edit-module');
		
		//Validation text
		$this->validate($request, [
			'title' => 'required|max:255',
		]);
		
		if($request->image != null){
			$sliderItem = SliderItem::find($id);

			//Delete Image from Slideshow
			File::delete("uploads/slider/" . $sliderItem->image);
			
			//$file = Input::file('image');
			$destinationPath = 'uploads/slider';
			$extension = Input::file('image')->getClientOriginalExtension();

			$fileName = rand(11111,99999).'.'.$extension;
			Input::file('image')->move($destinationPath, $fileName);
            $sliderItem->image = $fileName;
			$sliderItem->title = $request->title;

			$sliderItem->save();
		}else{
			$sliderItem = SliderItem::find($id);
			$sliderItem->title = $request->title;
			$sliderItem->save();
		}

		if($request->lineText1 || $request->lineText2 || $request->lineText3){
			$sliderItem = SliderItem::find($id);//Slider is name of model
			$sliderItem->SliderDetails()->delete($id);
		}

		if(isset($request->lineText1)){
			if($request->lineText1 != ''){
				$sliderDetail = new SliderDetail;//Slider is name of model
				$sliderDetail->text = $request->lineText1;
				$sliderDetail->color = $request->colorText1;
				//$sliderDetail->bg_color = $request->backgroundText1;
				$sliderDetail->font_size = $request->fontSizeText1 < 11 ? 11 : $request->fontSizeText1;
				//$sliderDetail->url = $request->urlText1;
				$sliderDetail->slider_item_id = $id;
				$sliderDetail->animation_id = 1;
				$sliderDetail->save();
			}
		}
		if(isset($request->lineText2)){
			if($request->lineText2 != ''){
				$sliderDetail = new SliderDetail;//Slider is name of model
				$sliderDetail->text = $request->lineText2;
				$sliderDetail->color = $request->colorText2;
				//$sliderDetail->bg_color = $request->backgroundText1;
				$sliderDetail->font_size = $request->fontSizeText2 < 11 ? 11 : $request->fontSizeText2;
				//$sliderDetail->url = $request->urlText1;
				$sliderDetail->slider_item_id = $id;
				$sliderDetail->animation_id = 2;
				$sliderDetail->save();
			}
		}
		if(isset($request->lineText3)){
			if($request->lineText3 != ''){
				$sliderDetail = new SliderDetail;//Slider is name of model
				$sliderDetail->text = $request->lineText3;
				$sliderDetail->color = $request->colorText3;
				//$sliderDetail->bg_color = $request->backgroundText1;
				$sliderDetail->font_size = $request->fontSizeText3 < 11 ? 11 : $request->fontSizeText3;
				//$sliderDetail->url = $request->urlText1;
				$sliderDetail->slider_item_id = $id;
				$sliderDetail->animation_id = 3;
				$sliderDetail->save();
			}
		}
		//Update End

        Session::flash('flash_message', 'Module has been saved!');

        return redirect()->back();
    }

    /**
     * Remove the specified slider from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyItem($moduleId, $id)
    {
        $this->registerPermissionAs('edit-module');

        $sliderItem = SliderItem::find($id);
		//dd($sliderItem->image);
		//Delete Detail Slideshow
        
		$sliderItem->SliderDetails()->delete($id);
		
		//Delete Image from Slideshow
		File::delete("uploads/slider/" . $sliderItem->image);
		
        $sliderItem->delete();

        Session::flash('flash_message_type', 'warning');
        Session::flash('flash_message', 'Slideshow has been deleted!');

        return redirect()->back();
    }
	
	
}
