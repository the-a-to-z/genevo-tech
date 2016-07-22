<?php

namespace App\Http\Controllers\Backend\Modules\Widgets;

use App\Http\Controllers\Backend\BackendController;
use App\Modules\Widgets\HomeSlideshow;
use App\Modules\Widgets\SliderDetail;
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
	 //public function __construct(HomeSlideshow $sliderDetails, SliderDetail $homeSlideshow)
    //{
      //$this->sliderDetails = $sliderDetails;
      //$this->homeSlideshow = $homeSlideshow;
    //}
	
    public function index($moduleId)
    {
       // $this->registerPermissionAs('edit-module');
//
//        return view(backendModuleViewUrl('home-slideshow.index'))->with([
//            'modules' => Module::all(),
//            'data' => HomeSlideshow::all()
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

        return view('backend.modules.home-slideshow.create')->with([
            'roles' => Role::get()
        ]);
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->registerPermissionAs('edit-module');
		//dd($request->all());
		
		//Validation text
		$this->validate($request, [
			'image' => 'required',
			'title' => 'required|max:255',
		]);
		
		//$file = Input::file('image');
		$destinationPath = 'uploads/slideshow';
		$extension = Input::file('image')->getClientOriginalExtension();
		//dd($extension);
		
		$fileName = rand(11111,99999).'.'.$extension;
		Input::file('image')->move($destinationPath, $fileName);
		
		$slider = new HomeSlideshow;//HomeSlideshow is name of model
		$slider->image = $fileName;
		$slider->title = $request->title;//$slider->column_name = $request->input_name
		$slider->save();
		
		$insertId = $slider->id;
		
		if(isset($request->lineText1)){
			if($request->lineText1 != ''){
				$sliderDetail = new SliderDetail;//HomeSlideshow is name of model
				$sliderDetail->text = $request->lineText1;
				$sliderDetail->color = $request->colorText1;
				//$sliderDetail->bg_color = $request->backgroundText1;
				$sliderDetail->font_size = $request->fontSizeText1 < 11 ? 11 : $request->fontSizeText1;
				//$sliderDetail->url = $request->urlText1;
				$sliderDetail->slider_id = $insertId;
				$sliderDetail->animation_id = 1;
				$sliderDetail->save();
			}
		}
		if(isset($request->lineText2)){
			if($request->lineText2 != ''){
				
				$sliderDetail = new SliderDetail;//HomeSlideshow is name of model

				$sliderDetail->text = $request->lineText2;
				$sliderDetail->color = $request->colorText2;
				//$sliderDetail->bg_color = $request->backgroundText1;
				$sliderDetail->font_size = $request->fontSizeText2 < 11 ? 11 : $request->fontSizeText2;
				//$sliderDetail->url = $request->urlText1;
				$sliderDetail->slider_id = $insertId;
				$sliderDetail->animation_id = 2;
				$sliderDetail->save();
			}
		}
		if(isset($request->lineText3)){
			if($request->lineText3 != ''){
				
				$sliderDetail = new SliderDetail;//HomeSlideshow is name of model

				$sliderDetail->text = $request->lineText3;
				$sliderDetail->color = $request->colorText3;
				//$sliderDetail->bg_color = $request->backgroundText1;
				$sliderDetail->font_size = $request->fontSizeText3 < 11 ? 11 : $request->fontSizeText3;
				//$sliderDetail->url = $request->urlText1;
				$sliderDetail->slider_id = $insertId;
				$sliderDetail->animation_id = 3;
				$sliderDetail->save();
			}
		}
		
        Session::flash('flash_message', 'Slideshow has been saved!');
		//return HomeSlideshow::json(array('success' => true, 'last_insert_id' => $slider->id), 200);
        return redirect(config('constants.backend-url') . 'modules\home-slideshow');
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

        return view(backendModuleViewUrl('home-slideshow.index'))->with([
            'data' => HomeSlideshow::all()
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
        $this->registerPermissionAs('edit-module');
		//dd(SliderDetail::where('slider_id', $id)->get())
        return view('backend.modules.home-slideshow.edit')->with([
            'roles' => Role::get(),
			'slider' => HomeSlideshow::find($id),
			'slideDetail' => SliderDetail::where('slider_id', $id)->get(),
        ]);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->registerPermissionAs('edit-module');

        //$module = AboutDescription::findOrFail($id);
        
        //$input = $request->all();

        //$module->fill($input)->save();
		
		//Update
		
		//Validation text
		$this->validate($request, [
			'title' => 'required|max:255',
		]);
		
		if($request->image != null){
			$homeSlideshow = HomeSlideshow::find($id);
			//Delete Image from Slideshow
			File::delete("uploads/slideshow/" . $homeSlideshow->image);
			
			
			//$file = Input::file('image');
			$destinationPath = 'uploads/slideshow';
			$extension = Input::file('image')->getClientOriginalExtension();
			//dd($extension);
			$fileName = rand(11111,99999).'.'.$extension;
			Input::file('image')->move($destinationPath, $fileName);
			$homeSlideshow->image = $fileName;
			$homeSlideshow->title = $request->title;
			$homeSlideshow->save();
		}else{
			$homeSlideshow = HomeSlideshow::find($id);
			$homeSlideshow->title = $request->title;
			$homeSlideshow->save();
		}
		if($request->lineText1 || $request->lineText2 || $request->lineText3){
			$slider = HomeSlideshow::find($id);//HomeSlideshow is name of model
			$homeSlideshow->SliderDetails()->delete($id);
		}
		
		
		if(isset($request->lineText1)){
			if($request->lineText1 != ''){
				$sliderDetail = new SliderDetail;//HomeSlideshow is name of model
				$sliderDetail->text = $request->lineText1;
				$sliderDetail->color = $request->colorText1;
				//$sliderDetail->bg_color = $request->backgroundText1;
				$sliderDetail->font_size = $request->fontSizeText1 < 11 ? 11 : $request->fontSizeText1;
				//$sliderDetail->url = $request->urlText1;
				$sliderDetail->slider_id = $id;
				$sliderDetail->animation_id = 1;
				$sliderDetail->save();
			}
		}
		if(isset($request->lineText2)){
			if($request->lineText2 != ''){
				$sliderDetail = new SliderDetail;//HomeSlideshow is name of model
				$sliderDetail->text = $request->lineText2;
				$sliderDetail->color = $request->colorText2;
				//$sliderDetail->bg_color = $request->backgroundText1;
				$sliderDetail->font_size = $request->fontSizeText2 < 11 ? 11 : $request->fontSizeText2;
				//$sliderDetail->url = $request->urlText1;
				$sliderDetail->slider_id = $id;
				$sliderDetail->animation_id = 2;
				$sliderDetail->save();
			}
		}
		if(isset($request->lineText3)){
			if($request->lineText3 != ''){
				$sliderDetail = new SliderDetail;//HomeSlideshow is name of model
				$sliderDetail->text = $request->lineText3;
				$sliderDetail->color = $request->colorText3;
				//$sliderDetail->bg_color = $request->backgroundText1;
				$sliderDetail->font_size = $request->fontSizeText3 < 11 ? 11 : $request->fontSizeText3;
				//$sliderDetail->url = $request->urlText1;
				$sliderDetail->slider_id = $id;
				$sliderDetail->animation_id = 3;
				$sliderDetail->save();
			}
		}
		//Update End

        Session::flash('flash_message', 'Module has been saved!');

        return redirect()->back();
    }

    /**
     * Remove the specified home-slideshow from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->registerPermissionAs('edit-module');

        $homeSlideshow = HomeSlideshow::find($id);
		//dd($homeSlideshow->image);
		//Delete Detail Slideshow
		$homeSlideshow->SliderDetails()->delete($id);
		
		//Delete Image from Slideshow
		File::delete("uploads/slideshow/" . $homeSlideshow->image);
		
        $homeSlideshow->delete();

        Session::flash('flash_message_type', 'warning');
        Session::flash('flash_message', 'Slideshow has been deleted!');

        return redirect()->back();
    }
	
	
}
