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
        <h2> SINDICATO DE TRANSPORTE "MIXTO TOROTORO TURISTICO" </h2>
    </center>
    <center>
        <h3> MANIFIESTO DE ENCOMIENDA</h3>
    </center>

        <div style="border: 2px solid #111;border-radius: 5px;padding:10px;margin-bottom: 1px;">
        <table style="width: 100%;">
            <thead>
           
            </thead>
            <tbody>
                    <tr>
                        <td style="text-align: left;">
                            <td><span style="font-weight: bold;">Recibido en:</span> {{ $oficina}}</td>
                            <td><span style="font-weight: bold;">Destino:</span> {{ $destino}}</td>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">
                            <td><span style="font-weight: bold;">Conductor:</span> {{ $driver}}</td>
                            <td><span style="font-weight: bold;">Licencia:</span> {{ $license}}</td>
                        
                        </td>
                    </tr>
                    <tr>
                    <td style="text-align: left;">
                            <td><span style="font-weight: bold;">Fecha:</span> {{ $fecha}}</td>
                            <td><span style="font-weight: bold;">Hora:</span> {{ $hora}}</td>
                            <td><span style="font-weight: bold;">Placa Nº:</span> {{ $placa}}</td>
                        </td>
                  
                    </tr>
            </tbody>
        </table>
    </div>

    <center>
        <h3> Encomiendas </h3>
    </center>


    <!--
    <div style="border: 2px solid #111;border-radius: 5px;padding:10px;margin-bottom: 20px;">
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th style="text-align: center;">
                        <div style="border-bottom: 2px solid;margin-right: 30px;">Cantidad</div>
               
                    </th>
                    <th style="text-align: center;">
                        <div style="border-bottom: 2px solid;margin-right: 30px;">Contenido</div>
                    </th>
                    <th style="text-align: center;">
                        <div style="border-bottom: 2px solid;margin-right: 30px;">Consignatario</div>
                    </th>
                    <th style="text-align: center;">
                        <div style="border-bottom: 2px solid;margin-right: 30px;">Remitente</div>
                    </th>
                    <th style="text-align: center;">
                        <div style="border-bottom: 2px solid;margin-right: 30px;">Destino</div>
                    </th>
                    <th style="text-align: center;">
                        <div style="border-bottom: 2px solid;margin-right: 30px;">Importe</div>
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php $total = 0; ?>
            @foreach ($packageReportTable as $nro=> $item )
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
                            {{$numero}}
                            </div>
                        </td>
                        <td style="text-align: left;">
                            <div style="margin-right: 30px;border-bottom: 1px dotted #111;">
                        
                            @foreach($item->packages_detail as $subitems)
                                          {{$subitems->content}}
                                          <br>
                                          @endforeach

                            </div>
                        </td>
                        <td style="text-align: left;">
                            <div style="margin-right: 30px;border-bottom: 1px dotted #111;">
                            {{ $item->condignatory }}
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <div style="margin-right: 30px;border-bottom: 1px dotted #111;">
                            {{$item->sender}}
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <div style="margin-right: 30px;border-bottom: 1px dotted #111;">
                            {{$item->rates->name}}
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <div style="margin-right: 30px;border-bottom: 1px dotted #111;">
                            {{$precio }}Bs 
                            </div>
                        </td>
                    </tr>
             @endforeach
            
            </tbody>
            
        </table>
    </div>
-->



    
        @foreach ($packageReportTable as $item )
        <div style="border: 2px solid #111;border-radius: 5px;padding:10px;margin-bottom: 20px;">
       
        <?php $numero = 0; ?>
                                                <?php $precio = 0; ?>
                                  @foreach($item->packages_detail as $subitems)
                                          <?php $numero=$numero+ $subitems->number_of_packages ?>
                                          <?php $precio=$precio+ $subitems->price ?>
                                       
                                          <?php $total =$total+ $subitems->price ?>
                                          @endforeach
     




         <div style="border: 2px solid #111;border-radius: 5px;padding:10px;margin-bottom: 20px;">
        <table style="width: 100%;">
           
            <tbody>
                    <tr>
                        <td style="text-align: left;">
                            <td><span style="font-weight: bold;">Remitente:</span> {{$item->sender}}</td>
                            <td><span style="font-weight: bold;">Consignatario:</span> {{$item->condignatory}}</td>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">
                            <td><span style="font-weight: bold;">Destino:</span>{{$item->rates->name}}</td>
                            <td><span style="font-weight: bold;">Precio:</span> {{$precio}} Bs</td>
                        
                        </td>
                    </tr>
              
                  
            </tbody>
        </table>
    </div>

    <table style="width: 100%;">
         <thead>

                
<tr>
    <th style="text-align: center;">
        <div style="border-bottom: 2px solid;margin-right: 30px;">Cantidad</div>
    </th>
    <th style="text-align: center;">
        <div style="border-bottom: 2px solid;margin-right: 30px;">Contenido</div>
    </th>
    
    <th style="text-align: center;">
        <div style="border-bottom: 2px solid;margin-right: 30px;">Precio</div>
    </th>
</tr>
</thead>
<tbody>

@foreach($item->packages_detail as $subitems)            
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
            {{$subitems->price}}Bs 
            </div>
        </td>
    </tr>
@endforeach

</tbody>
</table>
    </div>
         @endforeach
           
            
     
</body>

</html>




