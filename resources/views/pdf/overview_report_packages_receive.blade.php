<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manifiesto de encomiendas </title>

 
</head>

<body>




    <center>
        <h2>SINDICATO DE TRANSPORTE MIXTO "TOROTORO TURISTICO"</h2>
    </center>
    <div style="text-align: center;">
    PRESTA SERVICIOS DE TRANSPORTE <br>
    Camion-Flota-Minibus-Surubi <br>
    Of.Cbba.:Av.Republica y Valle Grande <br>
    Cel.:71442073 <br>
    Of.Toro Toro:71477601 <br>
    </div>

    <div style="border: 2px solid #111;border-radius: 5px;padding:10px;margin-bottom: 1px;">
        <table style="width: 100%;">
            <thead>
           
            </thead>
            <tbody>
            <tr>
                        <td style="text-align: left;">
                            <td><span style="font-weight: bold;">Remitente:</span> {{$package->sender}}</td>
                            <td><span style="font-weight: bold;">Consignatario:</span> {{$package->condignatory}}</td>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">
                            <td><span style="font-weight: bold;">Destino:</span>{{$package->rates->name}}</td>
                            <td><span style="font-weight: bold;">Fecha:</span> {{ $package->date}}</td>
                        
                        </td>
                    </tr>
                    <tr>
                 
                  
                    </tr>
            </tbody>
        </table>
    </div>



      
        <div style="border: 2px solid #111;border-radius: 5px;padding:10px;margin-bottom: 20px;">
       


    <table style="width: 100%;">
         <thead>

                
<tr>
    <th style="text-align: center;">
        <div style="border-bottom: 2px solid;margin-right: 30px;">Nro bultos</div>
    </th>
    <th style="text-align: center;">
        <div style="border-bottom: 2px solid;margin-right: 30px;">Contenido</div>
    </th>
    
    <th style="text-align: center;">
        <div style="border-bottom: 2px solid;margin-right: 30px;">Peso Kilos</div>
    </th>
    <th style="text-align: center;">
        <div style="border-bottom: 2px solid;margin-right: 30px;">precio</div>
    </th>
</tr>
</thead>
<tbody>
<?php $total = 0; ?>
@foreach($package->packages_detail as $subitems)    
<?php $total =$total+ $subitems->price ?>        
    <tr>
        <td style="text-align: center;">
            <div style="margin-right: 30px;border-bottom: 1px dotted #111;">
            {{$subitems->number_of_packages}}
            </div>
        </td>
        <td style="text-align: left;">
            <div style="margin-right: 30px;border-bottom: 1px dotted #111;">
    
                          {{$subitems->content}}
           
            </div>
        </td>
        <td style="text-align: center;">
            <div style="margin-right: 30px;border-bottom: 1px dotted #111;">
                          {{$subitems->weight}}
            </div>
        </td>
       
        <td style="text-align: center;">
            <div style="margin-right: 30px;border-bottom: 1px dotted #111;">
            {{$subitems->price}}Bs 
            </div>
        </td>
    </tr>
@endforeach
<tr class="bg-gray-100 border-b border-gray-200">
                
                    <td></td>
                    <td></td>
                    
                 
                    <td style="text-align: right;"><strong>Monto total: </strong></td>
                    <td style="text-align: center;">
                        <div style="border-bottom: 1px dotted #111;">
                            <strong>
                              {{$total}} Bs
                            </strong>
                        </div>
                    </td>
                </tr>
</tbody>
</table>
    </div>
 
            
     
</body>

</html>




