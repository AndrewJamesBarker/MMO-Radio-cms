<?php

namespace App\Http\Controllers;
use App\Models\Host;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class HostsController extends Controller
{
    public function list()
    {
        return view('hosts.list', [
            'hosts' => Host::all()
        ]);
    }
    

    public function addForm()
    {
        return view('hosts.add');
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'name' => 'required',
            'gtts_name' => 'required',
            'personality' => 'required',
            'bio' => 'required',
        ]);

    
        $host = new Host();
        $host->name = $attributes['name'];
        $host->gtts_name = $attributes['gtts_name'];
        $host->personality = $attributes['personality'];
        $host->bio = $attributes['bio'];
       
        $host->save();

        return redirect('/console/hosts/list')
            ->with('message', 'Host has been added!');
    }


        public function editForm(Host $host)
    {
        return view('hosts.edit', [
            'host' => $host,
           
        ]);
    }


    public function edit(Host $host)
    {

        $attributes = request()->validate([
            'name' => 'required',
            'gtts_name' => 'required',
            'personality' => 'required',
            'bio' => 'required',
        ]);

    
        $host->name = $attributes['name'];
        $host->gtts_name = $attributes['gtts_name'];
        $host->personality = $attributes['personality'];
        $host->bio = $attributes['bio'];

        $host->save();

        return redirect('/console/hosts/list')
            ->with('message', 'Host has been edited!');
    }

    public function delete(Host $host)
    {

        if($host->image)
        {
            Storage::delete($host->image);
        }
        
        $host->delete();
        
        return redirect('/console/hosts/list')
            ->with('message', 'Host has been deleted!');        
    }

    public function imageForm(Host $host)
    {
        return view('hosts.image', [
            'host' => $host,
        ]);
    }

    public function image(Host $host)
    {
        $attributes = request()->validate([
            'profile_pic' => 'required|image',
        ]);
    
        if ($host->image) {
            Storage::delete($host->image);
        }
    
        $path = request()->file('profile_pic')->store('hosts');
    
        $host->profile_pic = $path;
    
        // dd($host); // Check the host instance before saving
    
        $host->save();
    
        return redirect('/console/hosts/list')
            ->with('message', 'Host image has been edited!');
    }  
}
