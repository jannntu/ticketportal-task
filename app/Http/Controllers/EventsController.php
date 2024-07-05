<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;

class EventsController extends Controller
{
    public function index(){
        $data = Event::orderBy('id')->paginate(20);
        $count = Event::count();

        if (request()->ajax()) {
            $view = view('events.load-events', compact('data'))->render();
            return Response::json(['view' => $view, 'nextPageUrl' => $data->nextPageUrl()]);
        }

        return view('events.index', [
            'data' =>  $data,
            'count' => $count
        ]);       
    }

    public function fill(){
        $arrayData = $this->readXml();
        foreach($arrayData['event'] as $d){
            Event::create([
                'nazov' => $d['nazov'],
                'hladisko' => $d['hladisko'],
                'adresa' => $d['adresa'] ? $d['adresa'] : null,
                'zaciatok' => $d['zaciatok'],
                'cena' => strval(rand(5, 100))
            ]);
        }

        return redirect('/');
    }

    public function search(): JsonResponse{
        $term = htmlspecialchars(strip_tags(request()->get('term')));

        $data = Event::where('nazov', 'LIKE', '%'.$term.'%')
                    ->get();

        $view = view('events.search-events', compact('data'))->render();
        return Response::json(['view' => $view]);
    }

    public function edit(Event $event){
        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request, Event $event){
        request()->validate([
            'nazov' => ['required'],
            'hladisko' => ['required'],
            'zaciatok' => ['required'],
            'pocet_radov' => ['required','numeric'],
            'pocet_sedadiel' => ['required','numeric'],
            'cena' => ['required']
        ]);
    
        $event->update([
            'nazov' => request('nazov'),
            'hladisko' => request('hladisko'),
            'adresa' => request('adresa'),
            'zaciatok' => request('zaciatok'),
            'pocet_radov' => request('pocet_radov'),
            'pocet_sedadiel' => request('pocet_sedadiel'),
            'cena' => request('cena')
        ]);

        return redirect('/event/show/'.$event->id);
    }

    public function show(Request $request, Event $event){
        return view('events.show', ['event' => $event]);
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){
        request()->validate([
            'nazov' => ['required'],
            'hladisko' => ['required'],
            'zaciatok' => ['required'],
            'pocet_radov' => ['required','numeric'],
            'pocet_sedadiel' => ['required','numeric'],
            'cena' => ['required']
        ]);
    
        $event = Event::create([
            'nazov' => request('nazov'),
            'hladisko' => request('hladisko'),
            'adresa' => request('adresa'),
            'zaciatok' => request('zaciatok'),
            'pocet_radov' => request('pocet_radov'),
            'pocet_sedadiel' => request('pocet_sedadiel'),
            'cena' => request('cena')
        ]);

        return redirect('/event/show/'.$event->id);
    }

    private function readXml(){
        $response = file_get_contents('https://www.ticketportal.sk/xml/out/partnerall.xml');      
        $xml = simplexml_load_string($response, 'SimpleXMLElement', LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);

        return $array;
    }
}
