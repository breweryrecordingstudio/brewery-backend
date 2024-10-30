<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plan;
use App\Models\Service;
use App\Models\OtherService;
use App\Models\Employee;
use App\Models\Studio;
use App\Models\Breadcrump;
use App\Models\HeadingsService;
use App\Models\StudioTour;
use App\Models\Client;
use App\Models\Review;
use App\Models\TermCondition;
use App\Models\PrivacyPolicy;
use App\Models\Header;
use App\Models\Footer;
use App\Models\SocialIcon;
use App\Models\History;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class HomeController extends Controller
{
    public function breadcrump_list(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($username != null && $password != null) {
            if ($username == "ossols" && $password == "ossolstest") {
                $breadcrump = Breadcrump::get();
                return response()->json($breadcrump);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function categories_list(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($username != null && $password != null) {
            if ($username == "ossols" && $password == "ossolstest") {
                $categories = Category::with('studio')->get();
                return response()->json($categories);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function privacy_policy(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($username != null && $password != null) {
            if ($username == "ossols" && $password == "ossolstest") {
                $privacy_policy = PrivacyPolicy::first();
                return response()->json($privacy_policy);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function term_condition(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($username != null && $password != null) {
            if ($username == "ossols" && $password == "ossolstest") {
                $term_condition = TermCondition::first();
                return response()->json($term_condition);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function other_services_list(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($username != null && $password != null) {
            if ($username == "ossols" && $password == "ossolstest") {
                $other_services = OtherService::get();
                return response()->json($other_services);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function services_list(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($username != null && $password != null) {
            if ($username == "ossols" && $password == "ossolstest") {
                $services = Service::get();
                return response()->json($services);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }

    public function plans_list(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($username != null && $password != null) {
            if ($username == "ossols" && $password == "ossolstest") {
                $plans = Plan::get();
                return response()->json($plans);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function studios_list(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($username != null && $password != null) {
            if ($username == "ossols" && $password == "ossolstest") {
                $studios = Studio::with('category','slider')->get();
                return response()->json($studios);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function studio_tours_list(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($username != null && $password != null) {
            if ($username == "ossols" && $password == "ossolstest") {
                $studio_tours = StudioTour::get();
                return response()->json($studio_tours);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function clients_list(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($username != null && $password != null) {
            if ($username == "ossols" && $password == "ossolstest") {
                $clients = Client::get();
                return response()->json($clients);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function history_list(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($username != null && $password != null) {
            if ($username == "ossols" && $password == "ossolstest") {
                $history = History::get();
                return response()->json($history);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }

    public function review_list(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($username != null && $password != null) {
            if ($username == "ossols" && $password == "ossolstest") {
                $review = Review::get();
                return response()->json($review);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }

    public function social_icon_list(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($username != null && $password != null) {
            if ($username == "ossols" && $password == "ossolstest") {
                $social_icon = SocialIcon::get();
                return response()->json($social_icon);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function employees_list(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($username != null && $password != null) {
            if ($username == "ossols" && $password == "ossolstest") {
                $employees = Employee::with('category')->get();
                return response()->json($employees);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function staff_list(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($username != null && $password != null) {
            if ($username == "ossols" && $password == "ossolstest") {
                $employees = Employee::with('category')->paginate(15);
                return response()->json($employees);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function header_list(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($username != null && $password != null) {
            if ($username == "ossols" && $password == "ossolstest") {
                $header = Header::get();
                return response()->json($header);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function footer_list(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($username != null && $password != null) {
            if ($username == "ossols" && $password == "ossolstest") {
                $footer = Footer::get();
                return response()->json($footer);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }
    public function headings_services(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($username != null && $password != null) {
            if ($username == "ossols" && $password == "ossolstest") {
                $heading_service = HeadingsService::get();
                return response()->json($heading_service);
            } else {
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        } else {
            return response()->json(['message' => 'Enter Credentials'], 404);
        }
    }

}
