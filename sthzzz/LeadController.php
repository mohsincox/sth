<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Excel;
use App\Models\VicidialUser;
use DB;
use Validator;
use File;
use App\Models\VicidialList;

class LeadController extends Controller
{
    public function create()
    {
    	$listIdList = DB::table('vicidial_lists')->whereNotIn('list_id', [998, 999])->pluck('list_id', 'list_id');

    	return view('lead.create', compact('listIdList'));
    }

    public function store(Request $request)
	{
        
		$input = Input::all();
	    $rules = [
	    	'list_id' => 'required',
	    	'file' => 'required|mimes:xlsx,xls'
	    	//'file' => 'required|mimes:xlsx,xls,csv,txt'
	    ];
	    $messages = [];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }


        // if($request->hasFile('file'))
        // {
        //    $extension = File::extension($request->file->getClientOriginalName());
        //    if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
        //       return 'Your file is a valid xls or csv file';
        //    }else {
        //       return 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!';
        //    }
        // }



		$authSession = $request->session()->get('_auth_session');

        $authUser = VicidialUser::find($authSession['user_id']);

        $authUsername = $authUser->user;
        $authPassword = $authUser->pass;

        if ($authUser->user_level < 8) {
            flash()->error('USER DOES NOT HAVE PERMISSION TO UPLOAD LEAD! (Level)');
            return redirect()->back()->withInput();
        }

        //for Lead
        if ($authUser->modify_leads == 0) {
            flash()->error('USER DOES NOT HAVE PERMISSION TO UPLOAD LEAD! (Modify)');
            return redirect()->back()->withInput();
        }

        if ($authUser->vdc_agent_api_access == 0) {
            flash()->error('USER DOES NOT HAVE PERMISSION TO UPLOAD LEAD! (API)');
            return redirect()->back()->withInput();
        }

        $hostLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
        $listId = $request->list_id;

		if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$results=Excel::load($path)->get();

			foreach ($results as $row) {
                if(strlen($row['phone_number']) == 10) {
				  	$client = new \GuzzleHttp\Client();
			        $res = $client->request('GET', $hostLink.'/viciadmin/non_agent_api.php?source=test&function=add_lead&user='.$authUsername.'&pass='.$authPassword.'&phone_number='.$row->phone_number.'&first_name='.$row->first_name.'&address1='.$row->address1.'&address2='.$row->address2.'&address3='.$row->address3.'&city='.$row->city.'&province='.$row->province.'&postal_code='.$row->postal_code.'&list_id='.$listId);

			        //http://192.168.100.29/vicidial/non_agent_api.php?source=test&user=admin&pass=MyoL2017&function=add_lead&phone_number=1719307656&list_id=1001&first_name=Rashed
			        
			        //$a = $res->getBody();
			    }

			}
  			flash()->success('Excel file imported successfully');
   			return redirect()->back();
		}
		flash()->error('Something Wrong.');
        return redirect()->back();
	}

    public function edit()
    {
        $listIdList = DB::table('vicidial_lists')->whereNotIn('list_id', [998, 999])->pluck('list_id', 'list_id');

        return view('lead.edit', compact('listIdList'));
    }

    public function update(Request $request)
    {
        $listId = $request->list_id;
        VicidialList::where('list_id', $listId)
            ->whereIn('status', ['NA', 'B', 'DROP'])
            ->update([
                'called_since_last_reset' => 'N',
                'status' => 'NEW'
            ]);

        flash()->success('List ID '.$listId.' reset successfully');
        
        return redirect('lists/'.$listId.'/details');    
    }
    
    public function dialable()
    {
        $dialableLead = VicidialList::join('vicidial_lists', 'vicidial_lists.list_id', '=', 'vicidial_list.list_id')
            ->where('vicidial_list.status', 'NEW')
            ->where('vicidial_lists.active', 'Y')
            ->count();

        return view('lead.dialable', compact('dialableLead'));
    }
}
