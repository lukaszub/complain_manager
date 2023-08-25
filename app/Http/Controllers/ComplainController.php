<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Complain;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;
use Spatie\GoogleCalendar\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\MailController;


class ComplainController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.complaints.index',[
            'complains' => DB::table('complains')->paginate(15)
        ]);        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('pages.complaints.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $form = $request->validate([
            'adress' => 'required',
            'date_of_absence_collection' => 'required',
            'contact_number' => 'required',
            'fraction' => 'required',
            'note' => 'nullable',
            'status'=> 'nullable',
            'date_of_collection' => 'nullable',
            'truck_number' => 'nullable',
            'driver_name' => 'nullable'
            
        ]);

        $form['office_worker'] = $request->user()->name;
        

        //call funtion from MailController to send e-mail notification
        (new MailController)->sendMail($form);
        Complain::create($form);
        return redirect('/')->with('message', 'Reklamacja została zapisana.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Complain $complain)
    {
        return view('pages.complaints.show',[
            'complain' => $complain
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complain $complain)
    {
        return view('pages.complaints.edit',[
            'complain' => $complain
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Complain $complain)
    {
        $form = $request->validate([
            'adress' => 'required',
            'date_of_absence_collection' => 'required',
            'contact_number' => 'required',
            'fraction' => 'required',
            'note' => 'nullable',
            'date_of_collection' => 'nullable',
            'truck_number' => 'nullable',
            'status'=> 'nullable',
            'file' => 'nullable'
        ]);

       

        if($request->hasFile('file')){
            $form['file'] = $request->file('file')->store('files', 'public');
        }

        //sending new events to google calendar
        if($form['status'] == "zaplanowany odbiór"){
            $event = new Event();
            $event->name = "Complain: " . $form["adress"] . " - " . " frakcja: ". $form["fraction"] . ", telefon: " .  $form["contact_number"];
            $event->startDateTime = Carbon::parse($form['date_of_collection'])->addHour(5);
            $event->endDateTime = Carbon::parse($form['date_of_collection'])->addHour(6);
            $event->save();
        }

        $complain->update($form);

        return redirect("/");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complain $complain)
    {
        $complain->delete();
        return redirect("/");
        
    }

    public function search(Request $request)
    {
        
        $search = trim($request->input('search'));
        //dd(count(str_split($search)));
        if(!empty($search) && count(str_split($search)) > 2){

            $complainsSearched = DB::table('complains')
            ->where('adress', 'LIKE', '%'.$search.'%')->get();

            if(count($complainsSearched) == 0){
                session()->flash('message', 'Brak wyników.');
                return view('pages.complaints.index',[
                    'complains' => DB::table('complains')->paginate(15)
                ]);
            }

            return view('pages.complaints.index', compact('complainsSearched'));
        }
        session()->flash('message', 'Brak wyników.');
        return view('pages.complaints.index',[
            'complains' => DB::table('complains')->paginate(15)
        ]);  

    }
}
