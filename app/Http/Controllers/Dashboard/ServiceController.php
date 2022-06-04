<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    //Essay or Services
    public function services(){
        $services = Services::where('service_category', '=', 'Essay Services')->get();
        return view('dashboard.services.service.index', compact('services'));
    }

    public function create(){
        return view('dashboard.services.service.create');
    }
    public function store(Request $request){
        $data = request()->validate([
            'service_category' => '',
            'service_title' => ['required', 'min:5', 'max:100']
        ]);

        DB::table('services')->insert($data);

        return redirect('/dashboard/services');
    }
    public function show($id){
        $services = Services::where('id',$id)->first();
        return view('dashboard.services.service.show', compact('services'));
    }

    public function update($id, Request $request){
        $service = Services::where('id', $id)->first();

        $data = request()->validate([
            'service_title' => ['required', 'min:5', 'max:100']
        ]);

        DB::table('services')->where('id',$id)->update($data);

        return redirect("/dashboard/services/$id");
    }

    public function destroy($id){
        $services = Services::where('id', $id)->first();
        $services->update(['service_category' => null]);

        return redirect('/dashboard/services');
    }


    //Dissertation
    public function Dissertation(){
        $services = Services::where('service_category', '=', 'Dissertation Services')->get();
        return view('dashboard.services.dissertation.index', compact('services'));
    }

    public function DissertationCreate(){
        return view('dashboard.services.dissertation.create');
    }
    public function DissertationStore(Request $request){
        $data = request()->validate([
            'service_category' => '',
            'service_title' => ['required', 'min:5', 'max:100']
        ]);

        DB::table('services')->insert($data);

        return redirect('/dashboard/dissertation');
    }
    public function DissertationShow($id){
        $services = Services::where('id',$id)->first();
        return view('dashboard.services.dissertation.show', compact('services'));
    }

    public function DissertationUpdate($id, Request $request){
        $service = Services::where('id', $id)->first();

        $data = request()->validate([
            'service_title' => ['required', 'min:5', 'max:100']
        ]);

        DB::table('services')->where('id',$id)->update($data);

        return redirect("/dashboard/dissertation/$id");
    }

    public function DissertationDestroy($id){
        $services = Services::where('id', $id)->first();
        $services->update(['service_category' => null]);

        return redirect('/dashboard/dissertation');
    }



    //Other
    public function Other(){
        $services = Services::where('service_category', '=', 'Other Services')->get();
        return view('dashboard.services.other.index', compact('services'));
    }

    public function OtherCreate(){
        return view('dashboard.services.other.create');
    }
    public function OtherStore(Request $request){
        $data = request()->validate([
            'service_category' => '',
            'service_title' => ['required', 'min:5', 'max:100']
        ]);

        DB::table('services')->insert($data);

        return redirect('/dashboard/other');
    }
    
    public function OtherShow($id){
        $services = Services::where('id',$id)->first();
        return view('dashboard.services.other.show', compact('services'));
    }

    public function OtherUpdate($id, Request $request){
        $service = Services::where('id', $id)->first();

        $data = request()->validate([
            'service_title' => ['required', 'min:5', 'max:100']
        ]);

        DB::table('services')->where('id',$id)->update($data);

        return redirect("/dashboard/other/$id");
    }

    public function OtherDestroy($id){
        $services = Services::where('id', $id)->first();
        $services->update(['service_category' => null]);

        return redirect('/dashboard/other');
    }
}
