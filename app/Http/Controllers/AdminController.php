<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Plan;
use App\Models\Service;
use App\Models\Review;
use App\Models\Header;
use App\Models\HeadingsService;
use App\Models\Footer;
use App\Models\SocialIcon;
use App\Models\TermCondition;
use App\Models\PrivacyPolicy;
use App\Models\History;
use App\Models\OtherService;
use App\Models\Employee;
use App\Models\Studio;
use App\Models\Breadcrump;
use App\Models\StudioTour;
use App\Models\StudioSlider;
use App\Models\Client;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{

    public function __construct()
    {
        // auth()->logout();
        // return redirect()->route('login');
    }
    public function dashboard()
    {

        return view('admin.pages.dashboard');
    }
    public function logout()
    {
        auth()->logout();
        session()->flash('success', 'You have been logged out!');
        return redirect()->route('login');
    }
    public function login()
    {
        if (auth()->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }
    public function login_post(Request $req)
    {

        $credentials = $req->only('email', 'password');
        if (Auth::attempt($credentials)) {
            session()->flash('success', 'You are logged in!');
            return redirect()->route('admin.dashboard');
        } else {
            session()->flash('error', 'Invalid username or password');
            return redirect()->route('login');
        }
    }


    // Breadcrumb Route
    public function breadcrumb()
    {
        $breadcrumbs = Breadcrump::all();
        return view('admin.pages.breadcrumb.list', compact('breadcrumbs'));
    }
    public function breadcrumb_edit($id)
    {
        $dec_id = Crypt::decrypt($id);
        $breadcrumb = Breadcrump::find($dec_id);
        return view('admin.pages.breadcrumb.edit', compact('breadcrumb'));
    }
    public function breadcrumb_edit_post(Request $req)
    {

        $req->validate([
            'slide' => 'nullable|image',

        ]);
        $dec_id = Crypt::decrypt($req->id);
        $edit =  Breadcrump::find($dec_id);
        if ($req->hasfile('slide')) {
            $file = $req->file('slide');
                $name = time() . '.' . $file->extension();
                $file->move(public_path('uploads/breadcrump'), $name);
                $img = "uploads/breadcrump/".$name;
                 $edit->img = $img;
        }

        $edit->heading = $req->heading;
        $edit->link = $req->link;
        $edit->description = $req->description;

        $edit->update();
        session()->flash('success', 'Breadcrumb Updated Successfully');
        return redirect('admin/breadcrumb');
    }
    public function breadcrumb_add()
    {
        return view('admin.pages.breadcrumb.add');
    }
    public function breadcrumb_add_post(Request $req)
    {

        $req->validate([
            'slide' => 'required|image',

        ]);
        $img = "";
        if ($req->hasfile('slide')) {
            $file = $req->file('slide');
                $name = time() . '.' . $file->extension();
                $file->move(public_path('uploads/breadcrump'), $name);
                $img = "uploads/breadcrump/".$name;
        }
        $addon = new Breadcrump();
        $addon->heading = $req->heading;
        $addon->link = $req->link;
        $addon->description = $req->description;
        $addon->img = $img;
        $addon->save();
        session()->flash('success', 'Breadcrumb Added Successfully');
        return redirect('admin/breadcrumb');
    }

    public function breadcrumb_delete($id)
    {
        $dec_id = Crypt::decrypt($id);
        $get_car = Breadcrump::find($dec_id)->delete();
        session()->flash('success', 'Deleted Successfully');
        return redirect('admin/breadcrumb');
    }
 // Category Route
 public function category()
 {
     $categories = Category::all();
     return view('admin.pages.category.list', compact('categories'));
 }
 public function category_edit($id)
 {
     $dec_id = Crypt::decrypt($id);
     $category = Category::find($dec_id);
     return view('admin.pages.category.edit', compact('category'));
 }
 public function category_edit_post(Request $req)
 {

     $req->validate([
        'slide' => 'nullable|image',
        'name' => 'required',
        'address' => 'required',
        'latitute' => 'required',
        'longitute' => 'required',
        'floor_plan' => 'nullable|image',

     ]);
     $dec_id = Crypt::decrypt($req->id);
     $edit =  Category::find($dec_id);
     if ($req->hasfile('slide')) {
         $file = $req->file('slide');
             $name = time() . '.' . $file->extension();
             $file->move(public_path('uploads/category'), $name);
             $img = "uploads/category/".$name;
              $edit->img = $img;
     }
     if ($req->hasfile('floor_plan')) {
         $file2 = $req->file('floor_plan');
             $name2 = time() . '.' . $file2->extension();
             $file2->move(public_path('uploads/floor_plan'), $name2);
             $img2 = "uploads/floor_plan/".$name2;
              $edit->floor_plan = $img2;
     }

     $edit->name = $req->name;
     $edit->address = $req->address;
     $edit->location = $req->location;
     $edit->latitute = $req->latitute;
     $edit->logitute = $req->longitute;
     $edit->description = $req->description;

     $edit->update();
     session()->flash('success', 'Category Updated Successfully');
     return redirect('admin/category');
 }

 public function floor_plan()
 {
     $categories = Category::all();
     return view('admin.pages.floor_plan.list', compact('categories'));
 }

 public function floor_plan_edit($id)
 {
     $dec_id = Crypt::decrypt($id);
     $category = Category::find($dec_id);
     return view('admin.pages.floor_plan.edit', compact('category'));
 }
 public function floor_plan_edit_post(Request $req)
 {

     $req->validate([
        'floor_plan' => 'required|image',

     ]);
     $dec_id = Crypt::decrypt($req->id);
     $edit =  Category::find($dec_id);
     if ($req->hasfile('floor_plan')) {
         $file2 = $req->file('floor_plan');
             $name2 = time() . '.' . $file2->extension();
             $file2->move(public_path('uploads/floor_plan'), $name2);
             $img2 = "uploads/floor_plan/".$name2;
              $edit->floor_plan = $img2;
     }

     $edit->update();
     session()->flash('success', 'Category Updated Successfully');
     return redirect('admin/floor_plan');
 }
 // MAP Route
 public function map()
 {
     $categories = Category::all();
     return view('admin.pages.map.list', compact('categories'));
 }
 public function map_edit($id)
 {
     $dec_id = Crypt::decrypt($id);
     $category = Category::find($dec_id);
     return view('admin.pages.map.edit', compact('category'));
 }
 public function map_edit_post(Request $req)
 {


     $dec_id = Crypt::decrypt($req->id);
     $edit =  Category::find($dec_id);
     $edit->address = $req->address;
     $edit->location = $req->location;
     $edit->latitute = $req->latitute;
     $edit->logitute = $req->longitute;

     $edit->update();
     session()->flash('success', 'Category Updated Successfully');
     return redirect('admin/map');
 }

 public function category_add()
 {
     return view('admin.pages.category.add');
 }
 public function category_add_post(Request $req)
 {

     $req->validate([
         'slide' => 'required|image',
         'name' => 'required',
         'address' => 'required',
         'latitute' => 'required',
         'longitute' => 'required',
         'floor_plan' => 'required|image',

     ]);
     $img = "";
     $img2 = "";
     if ($req->hasfile('slide')) {
         $file = $req->file('slide');
             $name = time() . '.' . $file->extension();
             $file->move(public_path('uploads/category'), $name);
             $img = "uploads/category/".$name;
     }
     if ($req->hasfile('floor_plan')) {
         $file2 = $req->file('floor_plan');
             $name2 = time() . '.' . $file2->extension();
             $file2->move(public_path('uploads/floor_plan'), $name2);
             $img2 = "uploads/floor_plan/".$name2;
     }
     $addon = new Category();
     $addon->name = $req->name;
     $addon->address = $req->address;
     $addon->location = $req->location;
     $addon->latitute = $req->latitute;
     $addon->logitute = $req->longitute;
     $addon->description = $req->description;
     $addon->img = $img;
     $addon->floor_plan = $img2;
     $addon->save();
     session()->flash('success', 'Category Added Successfully');
     return redirect('admin/category');
 }

 public function category_delete($id)
 {
     $dec_id = Crypt::decrypt($id);
     $get_car = Category::find($dec_id)->delete();
     session()->flash('success', 'Deleted Successfully');
     return redirect('admin/category');
 }
 // Employee Route
 public function employee()
 {
     $employees = Employee::all();
     return view('admin.pages.employee.list', compact('employees'));
 }
 public function employee_edit($id)
 {
     $dec_id = Crypt::decrypt($id);
     $employee = Employee::find($dec_id);
     $categories = Category::all();
     return view('admin.pages.employee.edit', compact('employee','categories'));
 }
 public function employee_edit_post(Request $req)
 {

     $req->validate([
         'image' => 'nullable|image',
         'name' => 'required',
         'category_id' => 'required',
         'designation' => 'required',

     ]);
     $dec_id = Crypt::decrypt($req->id);
     $edit =  Employee::find($dec_id);
     if ($req->hasfile('image')) {
         $file = $req->file('image');
             $name = time() . '.' . $file->extension();
             $file->move(public_path('uploads/employee'), $name);
             $img = "uploads/employee/".$name;
              $edit->img = $img;
     }
     $edit->fullname = $req->name;
     $edit->links = $req->link;
     $edit->designation = $req->designation;
     $edit->category_id = $req->category_id;
     $edit->clients = $req->clients;
     $edit->description = $req->description;
     $edit->update();
     session()->flash('success', 'Employee Updated Successfully');
     return redirect('admin/employee');
 }
 public function employee_add()
 {
    $categories = Category::all();
     return view('admin.pages.employee.add', compact('categories'));
 }
 public function employee_add_post(Request $req)
 {

     $req->validate([
        'image' => 'required|image',
        'name' => 'required',
        'category_id' => 'required',
        'designation' => 'required',

     ]);
     $img = "";
     if ($req->hasfile('image')) {
         $file = $req->file('image');
             $name = time() . '.' . $file->extension();
             $file->move(public_path('uploads/employee'), $name);
             $img = "uploads/employee/".$name;
     }
     $addon = new Employee();
     $addon->fullname = $req->name;
     $addon->links = $req->link;
     $addon->designation = $req->designation;
     $addon->category_id = $req->category_id;
     $addon->clients = $req->clients;
     $addon->description = $req->description;
     $addon->img = $img;
     $addon->save();
     session()->flash('success', 'Employee Added Successfully');
     return redirect('admin/employee');
 }

 public function employee_delete($id)
 {
     $dec_id = Crypt::decrypt($id);
     $get_car = Employee::find($dec_id)->delete();
     session()->flash('success', 'Deleted Successfully');
     return redirect('admin/employee');
 }
// Client Route
public function client()
{
    $clients = Client::all();
    return view('admin.pages.client.list', compact('clients'));
}
public function client_edit($id)
{
    $dec_id = Crypt::decrypt($id);
    $client = Client::find($dec_id);
    return view('admin.pages.client.edit', compact('client'));
}
public function client_edit_post(Request $req)
{

    $req->validate([
        'name' => 'required',

    ]);
    $dec_id = Crypt::decrypt($req->id);
    $edit =  Client::find($dec_id);
    $edit->name = $req->name;
    $edit->contact = $req->contact;
    $edit->description = $req->description;

    $edit->update();
    session()->flash('success', 'Client Updated Successfully');
    return redirect('admin/client');
}
public function client_add()
{
    return view('admin.pages.client.add');
}
public function client_add_post(Request $req)
{

    $req->validate([
        'name' => 'required',

    ]);
    $addon = new Client();
    $addon->name = $req->name;
    $addon->contact = $req->contact;
    $addon->description = $req->description;
    $addon->save();
    session()->flash('success', 'Client Added Successfully');
    return redirect('admin/client');
}

public function client_delete($id)
{
    $dec_id = Crypt::decrypt($id);
    $get_car = Client::find($dec_id)->delete();
    session()->flash('success', 'Deleted Successfully');
    return redirect('admin/client');
}
// StudioTour Route
public function studio_tour()
{
    $studio_tours = StudioTour::all();
    return view('admin.pages.studio_tour.list', compact('studio_tours'));
}
public function studio_tour_edit($id)
{
    $dec_id = Crypt::decrypt($id);
    $studio_tour = StudioTour::find($dec_id);
    return view('admin.pages.studio_tour.edit', compact('studio_tour'));
}
public function studio_tour_edit_post(Request $req)
{

    $req->validate([
        'heading' => 'required',
        'description' => 'required',
        'status' => 'required',

    ]);
    $dec_id = Crypt::decrypt($req->id);
    $edit =  StudioTour::find($dec_id);
    $edit->heading = $req->heading;
    $edit->status = $req->status;
    $edit->description = $req->description;

    $edit->update();
    session()->flash('success', 'StudioTour Updated Successfully');
    return redirect('admin/studio_tour');
}
public function studio_tour_add()
{
    return view('admin.pages.studio_tour.add');
}
public function studio_tour_add_post(Request $req)
{

    $req->validate([

        'heading' => 'required',
        'description' => 'required',
        'status' => 'required',

    ]);
    $addon = new StudioTour();
    $addon->heading = $req->heading;
    $addon->status = $req->status;
    $addon->description = $req->description;
    $addon->save();
    session()->flash('success', 'StudioTour Added Successfully');
    return redirect('admin/studio_tour');
}

public function studio_tour_delete($id)
{
    $dec_id = Crypt::decrypt($id);
    $get_car = StudioTour::find($dec_id)->delete();
    session()->flash('success', 'Deleted Successfully');
    return redirect('admin/studio_tour');
}
// OtherService Route
public function other_service()
{
    $other_services = OtherService::all();
    return view('admin.pages.other_service.list', compact('other_services'));
}
public function other_service_edit($id)
{
    $dec_id = Crypt::decrypt($id);
    $other_service = OtherService::find($dec_id);
    return view('admin.pages.other_service.edit', compact('other_service'));
}
public function other_service_edit_post(Request $req)
{

    $req->validate([
        'heading' => 'required',
        'description' => 'required',
        'status' => 'required',
        'link' => 'required',
        'heading_link' => 'required',

    ]);
    $dec_id = Crypt::decrypt($req->id);
    $edit =  OtherService::find($dec_id);
    $edit->heading = $req->heading;
    $edit->link = $req->link;
    $edit->heading_link = $req->heading_link;
    $edit->status = $req->status;
    $edit->description = $req->description;

    $edit->update();
    session()->flash('success', 'OtherService Updated Successfully');
    return redirect('admin/other_service');
}
public function other_service_add()
{
    return view('admin.pages.other_service.add');
}
public function other_service_add_post(Request $req)
{

    $req->validate([
        'heading' => 'required',
        'description' => 'required',
        'status' => 'required',
        'link' => 'required',
        'heading_link' => 'required',

    ]);
    $addon = new OtherService();
    $addon->heading = $req->heading;
    $addon->link = $req->link;
    $addon->heading_link = $req->heading_link;
    $addon->status = $req->status;
    $addon->description = $req->description;
    $addon->save();
    session()->flash('success', 'OtherService Added Successfully');
    return redirect('admin/other_service');
}

public function other_service_delete($id)
{
    $dec_id = Crypt::decrypt($id);
    $get_car = OtherService::find($dec_id)->delete();
    session()->flash('success', 'Deleted Successfully');
    return redirect('admin/other_service');
}

// Plan Route
public function plan()
{
    $plans = Plan::all();
    return view('admin.pages.plan.list', compact('plans'));
}
public function plan_edit($id)
{
    $dec_id = Crypt::decrypt($id);
    $plan = Plan::find($dec_id);
    return view('admin.pages.plan.edit', compact('plan'));
}
public function plan_edit_post(Request $req)
{

    $req->validate([
        'heading' => 'required',
        'status' => 'required',
        'link' => 'required',

    ]);
    $dec_id = Crypt::decrypt($req->id);
    $edit =  Plan::find($dec_id);
    $edit->heading = $req->heading;
    $edit->per_hour = $req->per_hour;
    $edit->half_day = $req->half_day;
    $edit->full_day = $req->full_day;
    $edit->link = $req->link;
    $edit->status = $req->status;
    $edit->description = $req->description;

    $edit->update();
    session()->flash('success', 'Plan Updated Successfully');
    return redirect('admin/plan');
}
public function plan_add()
{
    return view('admin.pages.plan.add');
}
public function plan_add_post(Request $req)
{

    $req->validate([
        'heading' => 'required',
        'status' => 'required',
        'link' => 'required',

    ]);
    $addon = new Plan();
    $addon->heading = $req->heading;
    $addon->link = $req->link;
    $addon->per_hour = $req->per_hour;
    $addon->half_day = $req->half_day;
    $addon->full_day = $req->full_day;
    $addon->status = $req->status;
    $addon->description = $req->description;
    $addon->save();
    session()->flash('success', 'Plan Added Successfully');
    return redirect('admin/plan');
}

public function plan_delete($id)
{
    $dec_id = Crypt::decrypt($id);
    $get_car = Plan::find($dec_id)->delete();
    session()->flash('success', 'Deleted Successfully');
    return redirect('admin/plan');
}

// Service Route
public function service()
{
    $services = Service::all();
    return view('admin.pages.service.list', compact('services'));
}
public function service_edit($id)
{
    $dec_id = Crypt::decrypt($id);
    $service = Service::find($dec_id);
    return view('admin.pages.service.edit', compact('service'));
}
public function service_edit_post(Request $req)
{

    $req->validate([
        'heading' => 'required',
        'slide' => 'nullable|image',

    ]);
    $dec_id = Crypt::decrypt($req->id);
    $edit =  Service::find($dec_id);
    if ($req->hasfile('slide')) {
        $file = $req->file('slide');
            $name = time() . '.' . $file->extension();
            $file->move(public_path('uploads/service'), $name);
            $img = "uploads/service/".$name;
             $edit->img = $img;
    }

    $edit->heading = $req->heading;
    $edit->description = $req->description;
    $edit->link = $req->link;

    $edit->update();
    session()->flash('success', 'Service Updated Successfully');
    return redirect('admin/service');
}
public function service_add()
{
    return view('admin.pages.service.add');
}
public function service_add_post(Request $req)
{

    $req->validate([
        'heading' => 'required',
        'slide' => 'required|image',

    ]);
    $img = "";
    if ($req->hasfile('slide')) {
        $file = $req->file('slide');
            $name = time() . '.' . $file->extension();
            $file->move(public_path('uploads/service'), $name);
            $img = "uploads/service/".$name;
    }
    $addon = new Service();
    $addon->heading = $req->heading;
    $addon->description = $req->description;
    $addon->link = $req->link;
    $addon->img = $img;
    $addon->save();
    session()->flash('success', 'Service Added Successfully');
    return redirect('admin/service');
}

public function service_delete($id)
{
    $dec_id = Crypt::decrypt($id);
    $get_car = Service::find($dec_id)->delete();
    session()->flash('success', 'Deleted Successfully');
    return redirect('admin/service');
}
// Studio Route
public function studio()
{
    $studios = Studio::all();
    return view('admin.pages.studio.list', compact('studios'));
}
public function studio_edit($id)
{
    $dec_id = Crypt::decrypt($id);
    $studio = Studio::find($dec_id);
    $categories = Category::all();
    return view('admin.pages.studio.edit', compact('studio','categories'));
}
public function studio_edit_post(Request $req)
{

    $req->validate([
        'img' => 'nullable|image',
        // 'slide' => 'nullable|image',
        'name' => 'required',
        'category_id' => 'required',

    ]);
    $dec_id = Crypt::decrypt($req->id);
    $edit =  Studio::find($dec_id);
    if ($req->hasfile('img')) {
        $file = $req->file('img');
            $name = time() . '.' . $file->extension();
            $file->move(public_path('uploads/studio'), $name);
            $img = "uploads/studio/".$name;
             $edit->img = $img;
    }

    $edit->name = $req->name;
    $edit->category_id = $req->category_id;
    $edit->description = $req->description;

    $edit->update();
    if ($edit->id) {
        if ($req->hasfile('slide')) {
            $files = $req->file('slide');
            foreach ($files as $key => $file) {
                $name = $key.time() . '.' . $file->extension();
                $file->move(public_path('uploads/studio_slider'), $name);
                $img2 = "uploads/studio_slider/".$name;
                StudioSlider::insert(['studio_id'=>$edit->id,'img' => $img2]);
            }

        }
    }
    session()->flash('success', 'Studio Updated Successfully');
    return redirect('admin/studio');
}
public function studio_add()
{
    $categories = Category::all();
    return view('admin.pages.studio.add', compact('categories'));
}
public function studio_add_post(Request $req)
{

    $req->validate([
        'img' => 'nullable|image',
        // 'slide' => 'image',
        'name' => 'required',
        'category_id' => 'required',

    ]);
    $img = "";
    if ($req->hasfile('img')) {
        $file = $req->file('img');
            $name = time() . '.' . $file->extension();
            $file->move(public_path('uploads/studio'), $name);
            $img = "uploads/studio/".$name;
    }


    $addon = new Studio();
    $addon->name = $req->name;
    $addon->category_id = $req->category_id;
    $addon->description = $req->description;
    $addon->img = $img;
    $addon->save();
    if ($addon->id) {
        if ($req->hasfile('slide')) {
            $files = $req->file('slide');
            foreach ($files as $key => $file) {
                $name = $key.time() . '.' . $file->extension();
                $file->move(public_path('uploads/studio_slider'), $name);
                $img2 = "uploads/studio_slider/".$name;
                StudioSlider::insert(['studio_id'=>$addon->id,'img' => $img2]);
            }

        }
    }

    session()->flash('success', 'Studio Added Successfully');
    return redirect('admin/studio');
}

public function studio_delete($id)
{
    $dec_id = Crypt::decrypt($id);
    $get_car = Studio::find($dec_id)->delete();
    session()->flash('success', 'Deleted Successfully');
    return redirect('admin/studio');
}

public function studio_slide_delete($id)
{
    $dec_id = Crypt::decrypt($id);
    $get_car = StudioSlider::find($dec_id);
    $studio_id =Crypt::encrypt($get_car->studio_id);
    $get_car = $get_car->delete();
    session()->flash('success', 'Deleted Successfully');
    return redirect('admin/studio/edit/'.$studio_id);
}

// Review Route
public function review()
{
    $reviews = Review::all();
    return view('admin.pages.review.list', compact('reviews'));
}
public function review_edit($id)
{
    $dec_id = Crypt::decrypt($id);
    $review = Review::find($dec_id);
    return view('admin.pages.review.edit', compact('review'));
}
public function review_edit_post(Request $req)
{

    $req->validate([
        'description' => 'required',
        'img1' => 'nullable|image',
        'img2' => 'nullable|image',

    ]);
    $dec_id = Crypt::decrypt($req->id);
    $edit =  Review::find($dec_id);
    if ($req->hasfile('img1')) {
        $file = $req->file('img1');
            $name = "1_".time() . '.' . $file->extension();
            $file->move(public_path('uploads/review'), $name);
            $img = "uploads/review/".$name;
             $edit->img1 = $img;
    }
    if ($req->hasfile('img2')) {
        $file2 = $req->file('img2');
            $name2 = "2_".time() . '.' . $file2->extension();
            $file2->move(public_path('uploads/review'), $name2);
            $img2 = "uploads/review/".$name2;
             $edit->img2 = $img2;
    }

    $edit->link = $req->link;
    $edit->description = $req->description;

    $edit->update();
    session()->flash('success', 'Review Updated Successfully');
    return redirect('admin/review');
}
public function review_add()
{
    return view('admin.pages.review.add');
}
public function review_add_post(Request $req)
{

    $req->validate([
        'description' => 'required',
        'img1' => 'nullable|image',
        'img2' => 'nullable|image',

    ]);
    $img = "";
    if ($req->hasfile('img1')) {
        $file = $req->file('img1');
            $name = "1_".time() . '.' . $file->extension();
            $file->move(public_path('uploads/review'), $name);
            $img = "uploads/review/".$name;
    }
    $img2 = "";
    if ($req->hasfile('img2')) {
        $file2 = $req->file('img2');
            $name2 = "2_".time() . '.' . $file2->extension();
            $file2->move(public_path('uploads/review'), $name2);
            $img2 = "uploads/review/".$name2;
    }
    $addon = new Review();
    $addon->description = $req->description;
    $addon->link = $req->link;
    $addon->img1 = $img;
    $addon->img2 = $img2;
    $addon->save();
    session()->flash('success', 'Review Added Successfully');
    return redirect('admin/review');
}

public function review_delete($id)
{
    $dec_id = Crypt::decrypt($id);
    $get_car = Review::find($dec_id)->delete();
    session()->flash('success', 'Deleted Successfully');
    return redirect('admin/review');
}

// History Route
public function history()
{
    $histories = History::all();
    return view('admin.pages.history.list', compact('histories'));
}
public function history_edit($id)
{
    $dec_id = Crypt::decrypt($id);
    $history = History::find($dec_id);
    return view('admin.pages.history.edit', compact('history'));
}
public function history_edit_post(Request $req)
{

    $req->validate([
        'heading' => 'required',

    ]);
    $dec_id = Crypt::decrypt($req->id);
    $edit =  History::find($dec_id);

    $edit->heading = $req->heading;
    $edit->description = $req->description;

    $edit->update();
    session()->flash('success', 'History Updated Successfully');
    return redirect('admin/history');
}
public function history_add()
{
    return view('admin.pages.history.add');
}
public function history_add_post(Request $req)
{

    $req->validate([
        'heading' => 'required',

    ]);
    $addon = new History();
    $addon->heading = $req->heading;
    $addon->description = $req->description;
    $addon->save();
    session()->flash('success', 'History Added Successfully');
    return redirect('admin/history');
}

public function history_delete($id)
{
    $dec_id = Crypt::decrypt($id);
    $get_car = History::find($dec_id)->delete();
    session()->flash('success', 'Deleted Successfully');
    return redirect('admin/history');
}

// SocialIcon Route
public function social_icon()
{
    $social_icons = SocialIcon::all();
    return view('admin.pages.social_icon.list', compact('social_icons'));
}
public function social_icon_edit($id)
{
    $dec_id = Crypt::decrypt($id);
    $social_icon = SocialIcon::find($dec_id);
    return view('admin.pages.social_icon.edit', compact('social_icon'));
}
public function social_icon_edit_post(Request $req)
{

    $req->validate([
        'icon' => 'nullable|image',

    ]);
    $dec_id = Crypt::decrypt($req->id);
    $edit =  SocialIcon::find($dec_id);
    if ($req->hasfile('icon')) {
        $file = $req->file('icon');
            $name = time() . '.' . $file->extension();
            $file->move(public_path('uploads/social_icon'), $name);
            $img = "uploads/social_icon/".$name;
             $edit->img = $img;
    }

    $edit->link = $req->link;

    $edit->update();
    session()->flash('success', 'Social Icon Updated Successfully');
    return redirect('admin/social_icon');
}
public function social_icon_add()
{
    return view('admin.pages.social_icon.add');
}
public function social_icon_add_post(Request $req)
{

    $req->validate([
        'icon' => 'required|image',

    ]);
    $img = "";
    if ($req->hasfile('icon')) {
        $file = $req->file('icon');
            $name = time() . '.' . $file->extension();
            $file->move(public_path('uploads/social_icon'), $name);
            $img = "uploads/social_icon/".$name;
    }
    $addon = new SocialIcon();
    $addon->link = $req->link;
    $addon->img = $img;
    $addon->save();
    session()->flash('success', 'Social Icon Added Successfully');
    return redirect('admin/social_icon');
}

public function social_icon_delete($id)
{
    $dec_id = Crypt::decrypt($id);
    $get_car = SocialIcon::find($dec_id)->delete();
    session()->flash('success', 'Deleted Successfully');
    return redirect('admin/social_icon');
}
// profile_edit
public function profile_edit($id)
{
    $dec_id = Crypt::decrypt($id);
    $profile = User::find($dec_id);
    return view('admin.pages.standalone.profile', compact('profile'));
}
public function profile_edit_post(Request $req)
{
    $req->validate([
        'email' => 'required',
        'name' => 'required',
        'password' => 'nullable|min:6', // Making password field optional and setting a minimum length
        'confirm_password' => 'nullable|same:password', // Validation for confirming password
    ]);

    // Decrypt the ID
    $dec_id = Crypt::decrypt($req->id);

    // Find the user by ID
    $edit = User::find($dec_id);

    // Update the user fields
    $edit->email = $req->email;
    $edit->name = $req->name;

    // Check if password is provided and update it
    if ($req->filled('password')) {
        $edit->password = Hash::make($req->password);
    }

    // Save the changes
    $edit->update();

    // Flash a success message
    session()->flash('success', 'Profile Updated Successfully');

    // Redirect to the profile page
    return redirect('admin/profile/edit/'.$req->id);
}
//header
public function header_edit($id)
{
    $dec_id = Crypt::decrypt($id);
    $header = Header::find($dec_id);
    $categories = Category::all();
    return view('admin.pages.standalone.header', compact('header','categories'));
}
public function header_edit_post(Request $req)
{
    // dd($req->all());
    $req->validate([
        'logo' => 'nullable|image',
        'heading' => 'required',
        'link' => 'required',
    ]);

    $dec_id = Crypt::decrypt($req->id);
    $edit = Header::find($dec_id);
    $arr =  [];
if(isset($req->tabs)){
    foreach ($req->tabs as $key => $value) {
        $obj = (object) [
            'tab' => $req->tabs[$key],
            'link' => $req->tab_links[$key]
        ];
        array_push($arr,$obj);
    }
}
$jsonString = json_encode($arr);
    // Update 'slide' (logo) if provided
    if ($req->hasfile('logo')) {
        $file = $req->file('logo');
        $name = time() . '.' . $file->extension();
        $file->move(public_path('uploads/header'), $name);
        $img = "uploads/header/".$name;
        $edit->logo = $img; // Assuming 'logo' is the column name for the logo in your database
    }

    // Update other fields
    $edit->heading = $req->heading;
    $edit->link = $req->link;
    $edit->meta_title = $req->meta_title;
    $edit->meta_description = $req->meta_description;
    $edit->contact = $req->contact;
    $edit->tabs = $jsonString;
    $edit->location = $req->location;
    $edit->btn_text = $req->btn_text;

    $edit->update();

    // Flash a success message
    session()->flash('success', 'Header Updated Successfully');

    // Redirect back to the edit page
    return redirect('admin/header/edit/'.$req->id);
}


//footer
public function footer_edit($id)
{
    $dec_id = Crypt::decrypt($id);
    $footer = Footer::find($dec_id);
    return view('admin.pages.standalone.footer', compact('footer'));
}
public function footer_edit_post(Request $req)
{
    $req->validate([
        'footer_text' => 'nullable',
        'email' => 'nullable',
        'contact' => 'nullable',
    ]);

    $dec_id = Crypt::decrypt($req->id);
    $edit = Footer::find($dec_id);

    // Update other fields
    $edit->footer_text = $req->footer_text;
    $edit->email = $req->email;
    $edit->contact = $req->contact;

    $edit->update();

    // Flash a success message
    session()->flash('success', 'Footer Updated Successfully');

    // Redirect back to the edit page
    return redirect('admin/footer/edit/'.$req->id);
}

//footer
public function heading_other_service_edit($id)
{
    $dec_id = Crypt::decrypt($id);
    $service = HeadingsService::find($dec_id);
    return view('admin.pages.standalone.other_service_headings', compact('service'));
}
public function heading_other_service_edit_post(Request $req)
{
    $req->validate([
        'rate_1' => 'required',
        'rate_2' => 'required',
        'rate_3' => 'required',
        'link' => 'required',
        'top_heading_other_service_card' => 'required',
        'heading_other_service' => 'required',
    ]);

    $dec_id = Crypt::decrypt($req->id);
    $edit = HeadingsService::find($dec_id);

    // Update other fields
    $edit->rate_1 = $req->rate_1;
    $edit->rate_2 = $req->rate_2;
    $edit->rate_3 = $req->rate_3;
    $edit->link = $req->link;
    $edit->top_heading_other_service_card = $req->top_heading_other_service_card;
    $edit->heading_other_service = $req->heading_other_service;

    $edit->update();

    // Flash a success message
    session()->flash('success', 'Heading Services Updated Successfully');

    // Redirect back to the edit page
    return redirect('admin/heading_other_service/edit/'.$req->id);
}

//privacy_policy
public function privacy_policy($id)
{
    $dec_id = Crypt::decrypt($id);
    $privacy_policy = PrivacyPolicy::find($dec_id);
    return view('admin.pages.standalone.privacy', compact('privacy_policy'));
}
public function privacy_policy_edit_post(Request $req)
{
    $req->validate([
        'description' => 'required',
    ]);
    $dec_id = Crypt::decrypt($req->id);
    $edit = PrivacyPolicy::find($dec_id);
    $edit->description = $req->description;
    $edit->update();
    // Flash a success message
    session()->flash('success', ' Privacy Policy Updated Successfully');

    // Redirect back to the edit page
    return redirect('admin/privacy_policy/edit/'.$req->id);
}


//term_condition
public function term_condition($id)
{
    $dec_id = Crypt::decrypt($id);
    $term_condition = TermCondition::find($dec_id);
    return view('admin.pages.standalone.term', compact('term_condition'));
}
public function term_condition_edit_post(Request $req)
{
    $req->validate([
        'description' => 'required',
    ]);
    $dec_id = Crypt::decrypt($req->id);
    $edit = TermCondition::find($dec_id);
    $edit->description = $req->description;
    $edit->update();
    // Flash a success message
    session()->flash('success', ' Terms & Conditions Updated Successfully');

    // Redirect back to the edit page
    return redirect('admin/term_condition/edit/'.$req->id);
}

// Studio Route
public function gear()
{
    $studios = Studio::all();
    return view('admin.pages.gear.list', compact('studios'));
}
public function updateGearStatus($id,$status)
{
    $dec_id = Crypt::decrypt($id);
    $studio = Studio::find($dec_id);

    // Toggle the gear_status (assuming it's a boolean field)
    $studio->gear_status = $status;

    // Save the updated gear_status
    $studio->save();

    session()->flash('success', 'Gear Status Updated  Successfully');
    // Redirect back to the studio list page
    return redirect('admin/gear');
}
}
