<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Search;
class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function search(Request $request){
        if($request->type=='job'){
            $res = Event::where('event_name','like','%'.$request->keyword.'%');
            if($request->category!=''){
                $res = $res->where('event_category','=',$request->category);
            }
            if($request->location!=''){
                $res = $res->where('event_location_text','like','%'.$request->location.'%');
            }
            $result=array();
            if($request->skill_id!=''){
                
                $skills = Search::where('skill_id','=',$request->skill_id)->where('type','=','job')->where('state','=','1')->get();
                
                $res = $res->get();
                foreach($res as $r){
                    foreach($skills as $skill){
                        if($r->id==$skill->bind_id){
                            array_push($result,$r);
                            break;
                        }
                    }
                }
            }else{
                $result=$res->get()->toArray();
            }
            $r='';
            foreach($result as $rr){
                $skills = Search::where('bind_id','=',$rr['id'])->where('type','=','job')->where('state','=','1')->get();
                $s='';
                $skill_names=["1"=>"C","2"=>"C++","3"=>"PHP","4"=>"Python","5"=>"JavaScript","6"=>"Go","7"=>"Ruby","8"=>"Rust"];
                foreach($skills as $skill){
                    $s.=<<<str
                    <span class="badge text-bg-primary">{$skill_names[$skill->skill_id]}</span> 
                    str;
                }
                $r.=<<<str
                <div class="col-md-6 col-lg-12 col-xl-6">
                <div class="card2">
                <div class="row">
                    <div class="col-md-8 col-lg-12 col-xl-8">
                    <h5 class="location">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                        {$rr['event_location_text']}
                    </h5>
                    <a href="/events/{$rr['id']}"><h2 class="title">{$rr['event_name']}</h2></a>
                    <h3 class="description">{$rr['event_description']}</h3>
                    {$s}
                    </div>
                    <div class="col-md-4 col-lg-12 col-xl-4">
                        <h5>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder2" viewBox="0 0 16 16">
                            <path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v7a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 12.5v-9zM2.5 3a.5.5 0 0 0-.5.5V6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5zM14 7H2v5.5a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5V7z"/>
                            </svg>
                            {$rr['event_category']}
                        </h5>
                        <h5>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                            </svg>
                            {$rr['event_budget']}
                        </h5>
                        <h5>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                            {$rr['event_max_participants']}
                        </h5>
                        <a href="/appointment/set/{$rr['id']}"><button class="btn btn-primary fullwidth">Appointment</button></a>
                    </div>
                </div>
                </div>
            </div>
            str;
            }
            return Response($r);
        }
        if($request->type=='talent'){
            $res = User::where('experiences','like','%'.$request->keyword.'%');
            if($request->skill_id!=''){
                $result=array();
                $skills = Search::where('skill_id','=',$request->skill_id)->where('type','=','talent')->where('state','=','1')->get();
                
                $res = $res->get();
                foreach($res as $r){
                    foreach($skills as $skill){
                        if($r->id==$skill->bind_id){
                            array_push($result,$r);
                            break;
                        }
                    }
                }
            }else{
                $result = $res->get()->toArray();
            }
            $r='';
            foreach($result as $rr){
                $skills = Search::where('bind_id','=',$rr['id'])->where('type','=','talent')->where('state','=','1')->get();
                $s='';
                $skill_names=["1"=>"C","2"=>"C++","3"=>"PHP","4"=>"Python","5"=>"JavaScript","6"=>"Go","7"=>"Ruby","8"=>"Rust"];
                foreach($skills as $skill){
                    $s.=<<<str
                    <span class="badge text-bg-primary">{$skill_names[$skill->skill_id]}</span> 
                    str;
                }
                $r.=<<<str
                <div class="col-md-6 col-lg-12 col-xl-6">
                <div class="card2">
                <div class="row">
                    <div class="col-md-8 col-lg-12 col-xl-8">
                    <h5 class="location">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                  </svg>
                        {$rr['education']}
                    </h5>
                    <a href="/user/{$rr['id']}"><h2 class="title">{$rr['name']}</h2></a>
                    <h3 class="description">{$rr['experiences']}</h3>
                    {$s}
                    </div>
                    <div class="col-md-4 col-lg-12 col-xl-4">
                        <a href="/chat/{$rr['id']}"><button class="btn btn-primary fullwidth">Chat</button></a>
                    </div>
                </div>
                </div>
            </div>
            str;
            }
            return Response($r);
        }
    }

    public function getTags(Request $request){
        if($request->type=='job'){
            $res = Search::where('bind_id','=',$request->id)->where('type','=','job')->where('state','=','1')->get();
        }else if($request->type=='talent'){
            $res = Search::where('bind_id','=',$request->id)->where('type','=','talent')->where('state','=','1')->get();
        }
        return Response($res->toArray());
    }

    public function setTags(Request $request){
        if($request->type=='job'){
            $res = Search::where('bind_id','=',$request->bind_id)->where('type','=','job')->where('skill_id','=',$request->skill_id);
            if(count($res->get())==0){
                Search::create(['type'=>$request->type,'bind_id'=>$request->bind_id,'state'=>$request->state,'skill_id'=>$request->skill_id]);
            }else{
                $res->state=$request->state;
                $res->update(['state'=>$request->state]);
            }
        }else if($request->type=='talent'){
            $res = Search::where('bind_id','=',$request->bind_id)->where('type','=','talent')->where('skill_id','=',$request->skill_id);
            if(count($res->get())==0){
                Search::create(['type'=>$request->type,'bind_id'=>$request->bind_id,'state'=>$request->state,'skill_id'=>$request->skill_id]);
            }else{
                $res->state=$request->state;
                $res->update(['state'=>$request->state]);
            }
            
        }
        return Response($res->get()->toArray());
    }

    public function getJobs(Request $request){
        $keyword = $request->keyword;
        return View("search.job",compact('keyword'));
    }
    public function getTalents(Request $request){
        $keyword = $request->keyword;
        return View("search.talent",compact('keyword'));
    }
}
