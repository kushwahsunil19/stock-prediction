<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\{Competition,Participant};
use Carbon\Carbon;
if (!function_exists('getGuacaToken')) {

    function getGuacaToken()
    {
        try {
            $response = Http::asForm()->post(env('GUAC_APP_URL') . ':8080/guacamole/api/tokens', [
                'username' => getenv('GuacaU'),
                'password' => getenv('GuacaP'),
            ]);

            $statusCode = $response->status();

            if ($statusCode == 200) {
                $data = $response->json();
                if (isset($data['authToken'])) {
                    return $data['authToken'];
                } else {
                    return redirect()->back()->withError('Unexpected response format: authToken not found');
                }
            } else {
                return redirect()->back()->withError('Failed to get token. Status code: ' . $statusCode);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}






if (!function_exists('getAuth')) {
    /**
     * Generate a random string of specified length.
     *
     * @param int $length
     * @return string
     */
    function getAuth()
    {
        $user = Auth::user();

        if (Auth::check() && $user) {
            return $user;
        } else {
           return null;
        }
    }
}
if (!function_exists('LatestCompetitionId')) {
  
    function LatestCompetitionId()
    {
        $user = Auth::user();
        $user_id = $user->id;       
        //  $participant = Participant::where('user_id', $user_id)->latest()->first();
        // if( isset($participant->status)){
        //     $competition_id =  $participant->competition_id;
        // }else{
        //     $competition_id =  Competition::latest()->value('id');
        // }
            $current_date = Carbon::now()->format('Y-m-d');
         $com = Competition::where('enddate', '>=', $current_date)
        ->where('startdate', '<=', $current_date)
        ->orderBy('startdate')
        ->first();
          if (isset($com->id)) {
                if(Auth::check()){
                    $user_id = Auth::user()->id;
                    $participant = Participant::where('user_id', $user_id)->where('competition_id', $com->id)->first();
                
                    if( isset($participant->status)){
                        $competition_id =  $participant->competition_id;
                    }else{
                        $competition_id =  $com->id;
                    }
                }else{
                $competition_id = $com->id;  
                }
                     $data = Competition::with('quiz', 'participant')->where('id', $competition_id)->first();
          }else{
        $competition_id =  Competition::latest()->value('id');
          }
        return  $competition_id;
    }
}