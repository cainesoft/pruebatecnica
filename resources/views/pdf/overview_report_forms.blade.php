<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recibo</title>
</head>

<body>
<center>
        <h2> SINDICATO DE TRANSPORTE "MIXTO TOROTORO TURISTICO" </h2>
    </center>
        <div style="border: 2px solid #111;border-radius: 5px;padding:10px;margin-bottom: 1px;">
        <table style="width: 100%;">
            <thead>
           
            </thead>
            <tbody>
                    <tr>
                        <td style="text-align: left;">
                        @if($dateend=='')
                        <td><span style="font-weight: bold;">Fecha: {{$datestart}}</span></td>
    
                        @else
                       
                        <td><span style="font-weight: bold;">Fecha: {{$datestart}} a {{$dateend}}</span> </td>
                        @endif
                        </td>
                        <td><span style="font-weight: bold;">Oficina: </span>{{$reporte}}</td>
                    </tr>
                    
                 
            </tbody>
        </table>
    </div>
    <center>
        <h2>Reporte de salidas</h2>
    </center>
    <div style="border: 2px solid #111;border-radius: 5px;padding:10px;margin-bottom: 20px;">
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th style="text-align: center;">
                        <div style="border-bottom: 2px solid;margin-right: 30px;">Fecha</div>
               
                    </th>
                    <th style="text-align: center;">
                        <div style="border-bottom: 2px solid;margin-right: 30px;">Destino</div>
                    </th>
                    <th style="text-align: center;">
                        <div style="border-bottom: 2px solid;margin-right: 30px;">Conductor</div>
                    </th>
                  
                    <th style="text-align: center;">
                        <div style="border-bottom: 2px solid;margin-right: 30px;">numero bus</div>
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($formReportTable as $item)
                    <tr>
                        <td style="text-align: center;">
                            <div style="margin-right: 30px;border-bottom: 1px dotted #111;">
                            {{$item->date}}
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <div style="margin-right: 30px;border-bottom: 1px dotted #111;">
                            {{ $item->datoffices->name }}
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <div style="margin-right: 30px;border-bottom: 1px dotted #111;">
                            {{ $item->datrecords->buses->user->name}} {{ $item->datrecords->buses->user->lastname}}
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <div style="margin-right: 30px;border-bottom: 1px dotted #111;">
                            {{$item->datrecords->buses->bus_number}}
                            </div>
                        </td>
                    </tr>
             @endforeach
            
            </tbody>
        </table>
    </div>

</body>

</html>