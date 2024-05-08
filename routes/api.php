<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UserComponent;
use App\Models\User;
use App\Models\Records;
use App\Models\Seatings;
use App\Models\Packages;
use App\Models\Rates;
use App\Models\Tickets;
use App\Models\Buses;
use App\Models\Packages_detail;
use App\Models\Tickets_detail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use App\Models\Trips;





use Illuminate\Http\Response;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



//Route::middleware(['auth:sanctum' ,'verified'])->post('/registeruserapp', UserComponent::class, 'register');



//login




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login/user', function (Request $request) {
    $request->validate([
        'email' => 'required|string',
        'password' => 'required',
        
    ]);
    $user = User::where('email', $request->email)->first();
    if (! $user || !Hash::check($request->password, $user->password)) {
        
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
/*
        return response([
            'message'=>'The provided credentials are incorrect.'
        ],401);*/
    }
    return $user->createToken($request->email)->plainTextToken;
});
//login






 



 
Route::post('/login/register', function (Request $request) {
    /*
  $request->validate([
        'name'=>'required|string',
        'lastname'=>'required|string',
        'ci'=>'required',
        'phone_number'=>'required',
        'email'=>'required|string|unique:users,email',
        'password'=>'required|string',
    ]);*/
/*
    $imagen=$request['profile_photo_path'];
    $imagen=str_replace('data:image/png;base64,','',$imagen);
    $imagen=str_replace(' ','+',$imagen);
    $imagenName=time().'.png';
    \File::put(public_path('/img/'.$imagenName),base64_decode($imagen));
*/
    $user = User::create([
        'name'=>$request['name'],
        'lastname'=>$request['lastname'],
        'ci'=>$request['ci'],
        'phone_number'=>$request['phone_number'],
        'profile_photo_path'=>$request['profile_photo_path'],
        'email'=>$request['email'],
        'password'=>bcrypt($request['password'])
    ]);
   // $token=$user->createToken('myapptoken')->plainTextToken;
  return  $token=$user->createToken($request['name'])->plainTextToken;
    /*$response=[
        'user'=>$user,
        'token'=>$token
    ];*/
   // return response($response,201);
});

Route::middleware('auth:sanctum')->post('/ro/logout', function (Request $request) {

    Auth::user()->tokens()->delete();
    return [
        'message' => 'logged out'
    ];

});













//APLICACION CONDUCTOR 
//lista de viajes 
Route::get('/formconduct', function (Request $request){
    $recor =[];
    $trips =Buses::where('user_id','=',$request->user_id)->first();
    /*
      $forms =Records::where('bus_id','=',$trips->id)->with('record_dat.datoffices','buses.user')->get();
      
      foreach($forms as $items){
        $records =Trips::where('record_id', '=',$items->id)->with('datoffices','datrecords.buses.user')->get();
       }*/
       $records =Trips::with('datoffices','datrecords.buses.user')->orderByDesc('id')->get();
 
       foreach($records as $items){
       if($items->datrecords->bus_id==$trips->id){
        $recor[]=$items;
        }
        
       }

    return response()->json($recor);
});


//lista de tickets 

Route::get('/ticketconduct', function (Request $request) {
    $tickets=  Tickets::where('trip_id','=',$request->form_id)->with('seating','records.datrecords.buses.user','rates')->get();
   return response()->json( $tickets);
});
//cliente pagado
Route::post('/cancelconduct', function (Request $request) {
   $tickets =  Tickets::where('id','=', $request['ticket_id']);
   $tickets->update([
       'payment'=>'Pagado',
   ]);
});
//lista de paquetes 
Route::get('/packageconduct', function (Request $request) {
    $packages=  Packages::where('trip_id','=',$request->form_id)->with('trip.datrecords.buses.user','trip.datoffices','packages_detail')->get();
   return response()->json( $packages);
});
//entregar paquete
Route::post('/packagedeliveredconduct', function (Request $request) {
    $packages =  Packages::where('id','=', $request['package_id']);
    $packages->update([
        'statusdelivery'=>'entregado',
    ]);
});
//cerrar viaje 
Route::post('/closetrip', function (Request $request) {
    $trips =  Trips::with('datrecords.buses')->find($request['trip_id']);
    $recor = Seatings::where('bus_id', '=', $trips->datrecords->buses->id)->get();
    $trips->update([
        'status_trips'=>'destino',
    ]);
    foreach ($recor as $items)
    {
        $items->update([
            'condition' => 'desocupado',
         ]);
    }
});


Route::get('/formconductinic', function (Request $request) {

    $datosrecuperados=[];
    $seatings=[];
    $trips =Buses::where('user_id','=',$request->user_id)->first();
    $datosrecuperados=Records::where('bus_id','=',$trips->id)->where('bus_status','=','espera')->get();
    foreach($datosrecuperados as $items){
        $seatings=  Seatings::where('bus_id','=',$items->bus_id)->get();
     }

   return response()->json( $seatings);
});

Route::get('/formseating', function (Request $request) {
    $trips =Buses::where('user_id','=',$request->user_id)->first();
        $seatings=  Seatings::where('bus_id','=',$trips->id)->get();
   return response()->json( $seatings);
});

//APLICACION DEL CONDUCTOR 

Route::post('/locationconduct', function (Request $request) {
    //$request['seatin_id']
   $bus =  Buses::where('user_id','=',$request['user_id']);
   $bus->update([
       'latitude'=>$request['latitude'],
       'longitude'=>$request['longitude'],
   ]);
});

//lista de paquetes 
Route::get('/listlocationpackages', function (Request $request){
   $buses=Buses::where('user_id','=',$request->user_id)->whereNull('status')->first();
   
   
   $records=Records::where('bus_id','=',$buses->id)->where('arrival_status','=','salida')->whereNull('status')->orderByDesc('id')->first();
   $trips=Trips::where('record_id','=',$records->id)->where('status_trips','=','camino')->whereNull('status')->first();
  $locationpackages=  Packages::where('trip_id','=',$trips->id)->with('rates','packages_detail')->get();
  return response()->json( $locationpackages);
});
//mostrar los paquetes y destinos
Route::get('/listlocationtickets', function (Request $request) {

    $buses=Buses::where('user_id','=',$request->user_id)->whereNull('status')->first();
    $records=Records::where('bus_id','=',$buses->id)->where('arrival_status','=','salida')->whereNull('status')->orderByDesc('id')->first();
    $trips=Trips::where('record_id','=',$records->id)->where('status_trips','=','camino')->whereNull('status')->first();
    $locations=  Tickets::where('trip_id','=',$trips->id)->with('rates','seatin')->get();
   return response()->json($locations);
});

//editar numero asiento conductor
Route::post('/editseatinconduct', function (Request $request){
    //$request['seatin_id']
   $seatings =  Seatings::where('id','=',$request['seating_id']);
   $seatings->update([
       'number_seating'=>$request['number_seating'],
   ]);
   
});

//eliminar el numero asiento de conductor 
Route::post('/deleteseatinconduct', function (Request $request) {
    //$request['seatin_id']
   $seatings  =  Seatings::where('id','=',$request['seating_id']);
   $seatings->update([
       'status'=>'eliminado',
   ]);
});
//restaurar el asiento eliminado del conductor
Route::post('/resourceseatinconduct', function (Request $request) {
    //$request['seatin_id']
   $seatings  =  Seatings::where('id','=',$request['seating_id']);
   $seatings->update([
       'status'=>NULL,
   ]);
});
//cambiar el asiento bus
Route::post('/resourceseatinorderconduct', function (Request $request) {

   $seatings  =  Seatings::where('id','=',$request['seating_id']);

    $seatings->update([
        'order'=>$request['seating_order'],
    ]);

});

Route::post('/tripconductfinal', function (Request $request) {
    $trips =  Trips::where('id','=', $request['trip_id']);
    $trips->update([
        'status_trips'=>'destino',
    ]);
});










//APLICACION DEL CLIENTE 
//mostrar viajes para el cliente 
Route::get('/trips', function (Request $request) {
    $records =Records::where ('office_id','=',$request->id)->where('bus_status', 'LIKE', "%espera%")->with('record_dat.datoffices','buses.user')->get()->sortBy("created_at");
    return response()->json($records);
});
//mostrar tarifas para el cliente 
Route::get('/rates', function (Request $request) {
    $rates=  Rates::all();
    return json_encode($rates,201);
  //  return response()->json( $rates);
});
//mostrar asientos para el cliente 
Route::get('/seating', function (Request $request) {
    $seatings=  Seatings::where('bus_id','=',$request->bus_id)->get();
    return response()->json( $seatings);
});
//insertar reserva del cliente
Route::post('/newtickets', function (Request $request) {
    $product = Tickets::create([
        'name' =>$request ['name'],
        'ci' => $request  ['ci'],
        'user_id'=>$request['user_id'],
        'rates_id'=>$request['rates_id'],
        'cost'=>$request['cost'],
        'payment'=>$request['payment'],
        'date'=>$request['date'],
        'trip_id'=>$request['form_id'],
        'seatin_id'=>$request['seatin_id'],
        'phone_number'=>$request['phone_number'],
       // 'seatin_id'=>$this->seatin_id,
    ]);
    $seating =  Seatings::find($request['seatin_id']);
    $seating->update([
        'condition'=>'ocupado',
    ]);
  });
//lista de asientos del cliente que compro 
Route::get('/tickets', function (Request $request) {
    $tickets=  Tickets::where('user_id','=',$request->user_id)->where('trip_id','=',$request->form_id)->with('seatin','rates')->get();
    return response()->json( $tickets);
 });
//eliminar asientos del cliente que compro
Route::delete('/deleteticket', function (Request $request) {
    $ticket =  Tickets::find($request['ticket_id']);
    $ticket ->delete();
    $seating =  Seatings::find($request['seatin_id']);
    $seating->update(['condition'=>'desocupado']);
  });

//mostrar toda la lista de los viajes del cliente
Route::get('/listticketsclient', function (Request $request) {


    $tickets=  Tickets::where('user_id','=',$request->user_id)->with('seating','records.datrecords.buses.user','rates')->get();
   return response()->json( $tickets);
});

//mostrar toda la lista de packages del cliente
Route::get('/listpackagesclient', function (Request $request) {
    $packages=  Packages::where('sender_id','=',$request->user_id)->with('trip.datrecords.buses.user','trip.datoffices','packages_detail')->orderByDesc('id')->get();
   return response()->json( $packages);
});
//mostrar toda la lista de packages de consignatario del cliente
Route::get('/listpackagescondignatoryclient', function (Request $request) {
    $packages=  Packages::where('condignatory_id','=',$request->user_id)->with('trip.datrecords.buses.user','trip.datoffices','packages_detail')->orderByDesc('id')->get();
   return response()->json( $packages);
});
//mostrar lista de packetes
/*
Route::get('/listpackagescondignatoryclient', function (Request $request) {
    $packages=  Packages::where('package_id','=',$request->user_id)->with('trip.datrecords.buses.user','trip.datoffices')->get();
   return response()->json( $packages);
});*/

//mostrar la ubicacion del bus para el cliente 

Route::get('/locationconductclient', function (Request $request) {
    $seating =  Trips::with('datrecords.buses.user','datoffices')->where('id','=',$request->trip_id)->first();
   return response()->json( $seating);
    /*
    //$request['seatin_id']
   $seating =  Buses::with('user')->where('bus_number','=',$request->bus_num)->first();
   return response()->json( $seating);*/
});

/*
//mostrar la ubicacion del bus por codigo
Route::get('/locationcodbusclient', function (Request $request) {
    //$request['seatin_id']
   $seating =  Trips::where('id','=',$request->cod_trip)->get();
   return response()->json($seating);
});*/


/*
Route::post('/ticketsdetail', function (Request $request) {
    $product = Tickets_detail::create([
        'cost' =>10,
        'user_id' => $request  ['user_id'],
        'seatin_id'=>$request['seatin_id'],
    ]);
    $seating =  Seatings::find($request['seatin_id']);
    $seating->update([
        'condition'=>'ocupado',
    ]);
  });
  Route::get('/listticketsdetailclient', function (Request $request) {
    $tickets=  Tickets_detail::where('user_id','=',$request->user_id)->with()->get();
  });
*/















