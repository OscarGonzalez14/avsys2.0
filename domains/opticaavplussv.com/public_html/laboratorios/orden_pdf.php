<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Hola Mundo!</title>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>-->
        <script>
    function pruebaDivAPdf() {
        var pdf = new jsPDF('p', 'pt', 'letter');
        source = $('#hola')[0];

        specialElementHandlers = {
            '#bypassme': function (element, renderer) {
                return true
            }
        };
        margins = {
            top: 80,
            bottom: 60,
            left: 40,
            width: 522
        };

        pdf.fromHTML(
            source, 
            margins.left, // x coord
            margins.top, { // y coord
                'width': margins.width, 
                'elementHandlers': specialElementHandlers
            },

            function (dispose) {
                pdf.save('Prueba.pdf');
            }, margins
        );
    }
</script>

    </head>
    <body>
        <h1>Hola Mundo!</h1>

        <a href="javascript:pruebaDivAPdf()" class="button">Pasar a PDF</a>
    <div id="imprimir">
    <h1>  
        Esto es un DIV impreso en PDF
    </h1>
</div>
<div id="hola" style="visibility: hidden;">
  Hola Mundo
</div>

            <!--style="visibility: hidden"-->
<div id=orden_pdf>
  <table style="width:80%">

  <tr>
    <td><strong>Paciente: </strong><p type='text' id='paciente' name='paciente'></p></td>
    <td><strong>Laboratorio: </strong><p type='text' id='laboratorio' name='laboratorio'></p></td>
  </tr>
    <tr>
    <td>OD</td>
    <td><strong>Esfera: </strong><p type='text' id='odesfera' name='laboratorio'></p></td>
    <td><strong>Cilindro: </strong><p type='text' id='odcilindro' name='laboratorio'></p></td>
    <td><strong>Eje: </strong><p type='text' id='odeje' name='laboratorio'></p></td>
    <td><strong>Adicion: </strong><p type='text' id='odadicion' name='laboratorio'></p></td>
  </tr>

<tr>
    <td>OI</td>
    <td><strong>Esfera: </strong><p type='text' id='oiesfera' name='laboratorio'></p></td>
    <td><strong>Cilindro: </strong><p type='text' id='oicilindro' name='laboratorio'></p></td>
    <td><strong>Eje: </strong><p type='text' id='oieje' name='laboratorio'></p></td>
    <td><strong>Adicion: </strong><p type='text' id='oiadicion' name='laboratorio'></p></td>
  </tr>
</table>
</div>



<!--<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>-->
    </body>
</html>



