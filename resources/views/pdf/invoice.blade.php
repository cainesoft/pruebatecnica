<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recibo</title>
    <style>
        body {
  
  font-family: sans-serif;
  font-size: 20px;
  margin: 3em;
  padding: 0;
}
#register {
  width: 20em;
  margin: auto;
}
#ticket {
  background: white;
  margin: 0 1em;
  padding: 1em;
  box-shadow: 0 0 5px rgba(0,0,0,.25);
}
#ticket h1 {
  text-align: center;
}
#ticket table {
  font-family: monospace;
  width: 100%;
  border-collapse: collapse;
}
#ticket td, #ticket th {
  padding: 5px;
}
#ticket th {
  text-align: left;
}
#ticket td, #ticket #total {
  text-align: right;
}
#ticket tfoot th {
  border-top: 1px solid black;
}

#entry {
  background: #333;
  padding: 12px;
  border-radius: 10px;
  box-shadow: 0 0 5px rgba(0,0,0,.25);
}
#entry input {
  width: 100%;
  padding: 10px;
  border: 1px solid black;
  text-align: right;
  font-family: sans-serif;
  font-size: 20px;
  box-shadow: inset 0 0 3px rgba(0,0,0,.5);
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
#entry input:focus {
  outline: none;
  border-color: rgba(255,255,255,.75);
}
    </style>
</head>

<body>
<div id="ticket">
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
    <br>
    <div>
         <div style=" text-align:center; float: left; width: 35%; "> 
            <h6>ATENCION LAS 24 HORAS PRESTA SERVICIOS DE CONTRATO</h6>
         </div> 
         <div style=" text-align:center; float: right; width: 60%;">
         FECHA DE VIAJE
         <table style="width: 100%; text-align:center">
            <thead>
            
                <tr>
                    <th  style="text-align: center ;">
                      
                         <div style="margin-right: 15px; margin-left: 15px;">DIA</div>
                      
                    </th>
                    <th  style="text-align: center ;">
                      
                         <div style="margin-right: 15px; margin-left: 15px;">MES</div>
                       
                    </th><th  style="text-align: center ;">
                     
                         <div style="margin-right: 10px; margin-left: 10px;">AÑO</div>
                     
                    </th>
                
                </tr>
            </thead>
            <tbody>
               
                    <tr>
                        <td style="text-align:center;">   
                          <div style="border: 2px solid #111;border-radius: 5px;padding:8px;margin-bottom: 20px;">
                            <div style="margin-right: 15px; margin-left: 15px;">{{$dfecha}}</div>
                          </div> 
                        </td>
                        <td style="text-align: center;">
                            <div style="border: 2px solid #111;border-radius: 5px;padding:8px;margin-bottom: 20px;">
                              <div style="margin-right: 15px; margin-left: 15px;">{{$mfecha}}</div>
                            </div> 
                        </td>
                        <td style="text-align: center;">
                            <div style="border: 2px solid #111;border-radius: 5px;padding:8px;margin-bottom: 20px;">
                             <div style="margin-right: 15px; margin-left: 15px;">{{$afecha}}</div>
                            </div> 
                        </td>
                      
                      
                    </tr>
          
               
            </tbody>
          </table>
     </div> 
    </div>

<br>
<br>
<br>
<br>
    


    <div style="border-bottom: 2px solid;margin-right: 30px text-align: center;">Destino: {{$destination_user}}</div>
    <div style="border-bottom: 2px solid;margin-right: 30px text-align: center;">Nombre: {{$name}}</div>
    
    <br>
  
    <div >
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th  style="text-align: center ;">
                       <div style="border: 2px solid #111;border-radius: 5px;padding:2px;margin-bottom: 1px;">
                         <div style="margin-right: 15px; margin-left: 15px;">Nro Asiento </div>
                       </div>   
                    </th>
                    <th  style="text-align: center ;">
                       <div style="border: 2px solid #111;border-radius: 5px;padding:2px;margin-bottom: 1px;">
                         <div style="margin-right: 70px; margin-left: 70px;">Horas</div>
                       </div>   
                    </th><th  style="text-align: center ;">
                       <div style="border: 2px solid #111;border-radius: 5px;padding:2px;margin-bottom: 1px;">
                         <div style="margin-right: 15px; margin-left: 15px;">Bs</div>
                       </div>   
                    </th>
                
                </tr>
            </thead>
            <tbody id="entries">
               
                    <tr>
                        <td style="text-align:center;">
                          <div style="border: 2px solid #111;border-radius: 5px;padding:10px;margin-bottom: 20px;">
                            <div style="margin-right: 15px; margin-left: 15px;">{{$seatings}}</div>
                          </div> 
                        </td>
                        <td style="text-align: center;">
                            <div style="border: 2px solid #111;border-radius: 5px;padding:10px;margin-bottom: 20px;">
                              <div style="margin-right: 15px; margin-left: 15px;">CBBA</div>
                            </div> 
                        </td>
                        <td style="text-align: center;">
                            <div style="border: 2px solid #111;border-radius: 5px;padding:10px;margin-bottom: 20px;">
                             <div style="margin-right: 15px; margin-left: 15px;">{{$cost}}</div>
                            </div> 
                        </td>
                      
                      
                    </tr>
          
               
            </tbody>
           
        </table>
                <div style="text-align:center;">
                   <p  >Salidas diarias a:Toro Toro-Julo Grande-Julo Chico-Kalauta-Sucusuma</p>
                </div>
    </div>
</div>


 

</body>

</html>
