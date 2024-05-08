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
        <h2>Reporte de Encomiendas</h2>
    </center>
    <div style="border: 2px solid #111;border-radius: 5px;padding:10px;margin-bottom: 20px;">
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th style="text-align: center;">
                        <div style="border-bottom: 2px solid;margin-right: 30px;">Fecha</div>
               
                    </th>
                    <th style="text-align: center;">
                        <div style="border-bottom: 2px solid;margin-right: 30px;">Remitente</div>
                    </th>
                    <th style="text-align: center;">
                        <div style="border-bottom: 2px solid;margin-right: 30px;">Consignatario</div>
                    </th>
                  
                    <th style="text-align: center;">
                        <div style="border-bottom: 2px solid;margin-right: 30px;">Lugar</div>
                    </th>
                    <th style="text-align: center;">
                        <div style="border-bottom: 2px solid;margin-right: 30px;">Nro Bultos</div>
                       
                    </th>
                  
                    <th style="text-align: center;">
                        <div style="border-bottom: 2px solid">Total (Bs.)</div>
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php $total = 0; ?>
            @foreach ($packageReportTable as $item)
            <?php $numero = 0; ?>
                                                <?php $precio = 0; ?>
            @foreach($item->packages_detail as $subitems)
                                          
                                          <?php $numero=$numero+ $subitems->number_of_packages ?>
                                          <?php $precio=$precio+ $subitems->price ?>
                                       
                                          <?php $total =$total+ $subitems->price ?>
                                          @endforeach
                                     
                    <tr>
                        <td style="text-align: center;">
                            <div style="margin-right: 30px;border-bottom: 1px dotted #111;">
                            {{$item->date}}
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <div style="margin-right: 30px;border-bottom: 1px dotted #111;">
                            {{$item->sender}}
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <div style="margin-right: 30px;border-bottom: 1px dotted #111;">
                            {{$item->condignatory}}
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <div style="margin-right: 30px;border-bottom: 1px dotted #111;">
                            {{$item->rates->name}}
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <div style="margin-right: 30px;border-bottom: 1px dotted #111;">
                            {{$numero}}
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <div style="margin-right: 30px;border-bottom: 1px dotted #111;">
                            {{$precio }}Bs
                            </div>
                        </td>
                      
                    </tr>
             @endforeach
                <tr class="bg-gray-100 border-b border-gray-200">
                
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="px-4 py-3 text-right">Monto total:</td>
                    <td class="px-4 py-3 text-right">
                        <div style="border-bottom: 1px dotted #111;">
                            <strong>
                              {{$total }} Bs
                            </strong>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>


