<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ServicesController extends Controller
{
    private $host = 'https://servicioschimichangas.com/api/projectQuote/verify/';
    //private $host = 'localhost:8000/api/projectQuote/verify/';
    public static $services = [
        'ACTAS NOTARIALES' => [
            'INFORMACIÓN TESTIMONIAL DE NOMBRE' => [
                'Del solicitante y 2 testigos' => [
                    'Identificaciones oficiales vigentes',
                    'Actas de nacimiento',
                    'CURP',
                    'Nombre completo',
                    'Fecha de nacimiento',
                    'Ocupación',
                    'Estado civil',
                    'Domicilio',
                    'En caso de ser FINADO acta de defunción',
                ]
            ],
            'INFORMACIÓN AD PERPETUAM' => [
                'Del solicitante y 2 testigos' => [
                    'Carpeta de Investigación ante la Fiscalía por la pérdida de los documentos',
                    'Tarjeta de circulación vehicular',
                    'Identificaciones oficiales vigentes',
                    'Actas de nacimiento',
                    'CURP',
                    'Nombre completo',
                    'Lugar de nacimiento',
                    'Fecha de nacimiento',
                    'Ocupación',
                    'Estado civil',
                    'Domicilio',
                ],
            ],
            'CARTA DE DEPENDENCIA ECONÓMICA' => [
                'Del solicitante y 2 testigos' => [
                    'Identificaciones oficiales vigentes',
                    'Acta de nacimiento',
                    'CURP',
                    'Nombre completo',
                    'Lugar de nacimiento',
                    'Fecha de nacimiento',
                    'Ocupación',
                    'Estado civil',
                    'Domicilio',
                ]
            ],
            'CARTA DE CONCUBINATO' => [
                'Del solicitante y 2 testigos' => [
                    'Identificaciones oficiales vigentes',
                    'Acta de nacimiento',
                    'CURP',
                    'Nombre completo',
                    'Lugar de nacimiento',
                    'Fecha de nacimiento',
                    'Ocupación',
                    'Estado civil',
                    'Domicilio',
                ]
            ],
            'INFORMACIÓN TESTIMONIAL AD PERPETUAM DE POSESIÓN DEL INMUEBLE' => [
                'Del solicitante' => [
                    'Documento que acredite la posesión del inmueble',
                    'Identificación Oficial Vigente',
                    'Acta de Nacimiento',
                    'CURP',
                    'Nombre completo',
                    'Lugar de nacimiento',
                    'Fecha de nacimiento',
                    'Ocupación',
                    'Estado civil',
                    'Domicilio',
                ],
                'De los 2 testigos' => [
                    'Identificaciones oficiales vigentes.',
                    'Actas de nacimiento.',
                    'CURP',
                    'Nombre completo',
                    'Lugar de nacimiento',
                    'Fecha de nacimiento',
                    'Ocupación',
                    'Estado civil',
                    'Domicilio',

                ]
            ],
            'CARTA PERMISO DE MENOR' => [
                'De los solicitantes' => [
                    'Dos identificaciones oficiales vigentes',
                    'Actas de nacimiento',
                    'CURP y RFC',
                    'Nombre completo',
                    'Lugar de nacimiento',
                    'Fecha de nacimiento',
                    'Ocupación',
                    'Estado civil',
                    'Domicilio',
                    'Acta(s) de nacimiento del menor(es)',
                    'Pasaporte de los menores',
                    'Información adicional: lugar de destino y tiempo de estancia; nombre de la persona con quien viajará el menor',

                ]
            ]
        ],
        'CONTRATOS DE GARANTIA' => [
            'CONTRATOS DE MUTUO CON INTERESES Y GARANTÍA' => [
                'Inmueble' => [
                    'Escritura(s) del inmueble',
                    'Boleta predial al corriente',
                ],
                'De todos los intervinientes' => [
                    'Identificaciones oficiales vigentes',
                    'Actas de nacimiento',
                    'Actas de matrimonio',
                    'CURP',
                    'Cédulas de RFC',
                ]
            ],
            'FIDEICOMISOS' => [
                'Inmueble' => [
                    'Escritura(s) del inmueble',
                    'Boleta predial al corriente',
                ],
                'De todos los intervinientes' => [
                    'Identificaciones oficiales vigentes',
                    'Actas de nacimiento',
                    'Actas de matrimonio',
                    'CURP',
                    'Cédulas de RFC',
                ],
                'DEL FIDUCIARIO' => [
                    'Escritura constitutiva de la persona moral y todas sus protocolizaciones',
                    'Firma de autorización del comité',
                    'Autorización de crédito',
                    'Datos del fiduciario en segundo lugar y grado',
                    'Datos del fideicomisario en primer lugar',
                    'Datos del depositario',
                ]
            ],
            'CANCELACIÓN DE HIPOTECA' => [
                'Del inmueble' => [
                    'Escritura(s) del inmueble',
                    'Carta de instrucción para Liberación de hipoteca vigente, expedida por la institución correspondiente',
                    'Carta de Finiquito',
                ],
                'Del solicitante' => [
                    'Identificaciones oficiales vigentes',
                    'Actas de nacimiento',
                    'Actas de matrimonio',
                    'CURP',
                    'Cédulas de RFC',
                ]
            ],
            'CRÉDITOS Y COBRANZA CON ACTOS DE DOMINIO' => [
                'De los mandatarios' => [
                    'RCF',
                    'CURP',
                    'Nombre completo',
                    'Tipo de mandato',
                    'RFC de la sociedad que otorga el mandato no solo del representante legal'
                ]
            ],
            'CRÉDITOS Y COBRANZA CON ACTOS DE ADMINISTRACIÓN' => [
                'Generales' => [
                    'Nombre completo',
                    'Tipo de mandato',
                    'RFC de la sociedad que otorga el mandato no solo del representante legal'
                ]
            ],
            'CRÉDITOS Y COBRANZA CON ACTOS DE ADMINISTRACIÓN Y DE RIGUROSO DOMINIO' => [
                'Generales' => [
                    'Nombre completo',
                    'Tipo de mandato',
                    'RFC de la sociedad que otorga el mandato no solo del representante legal',
                ]
            ]
        ],
        'SOCIEDADES' => [
            'MERCANTILES' => [
                'Generales' => [
                    'Autorización de uso de Denominación emitida por Secretaria de Economia',
                    'Objeto social',
                    'Documentos de los socios accionista (ine, Acta de nacimiento, Curp y constancia de situación fiscal)',
                    'Capital social',
                    'Distribución del capital',
                    'Representante Legal (nombre de socio)',
                    'Comisario (no debe de ser familiar del representante)',
                    'Datos generales de los accionistas (nombre completo, lugar y fecha de nacimiento, ocupacion, estado civil y domicilio) Específicos por tipo de sociedad mercantil',

                ]
            ],
            'PROTOCOLIZACIÓN DE ACTAS DE ASAMBLEA ORDINARIAS Y EXTRAORDINARIAS' => [
                'General' => [
                    'Constancia de situacion fiscal de los socios, delegado especial y de la sociedad mercantil cuando aumenten o disminuyan su capital y en el caso de que exista cambio de socios por cesión , donación o cualquier otro tipo de transmisión de acciones'
                ]
            ]
        ],
        'TRÁMITES SUCESORIOS' => [
            'TESTAMENTO' => [
                'Documentación del Testador y 2 Testigos (Por la tercera edad)' => [
                    'Identificaciones oficiales vigentes',
                    'CURP',
                    'Actas de nacimiento',
                    'Escrituras de los inmuebles (si es que se van a especificar los bienes)',
                    '2 Constancias médicas recientes (en caso que aplique); en la que se indique que el testador está ubicado en tiempo, espacio y persona y que cuenta con capacidad para tomar decisiones de índole legal y disponer de sus bienes para firmar ante Notario Público',
                    ' Todos los anteriores, los deberán presentar en ORIGINALES al momento de la firma del Testamento'
                ]
            ],
            'TESTAMENTARIOS' => [
                'Generales' => [
                    'Testamento',
                    'Acta de defunción',
                    'Acta de nacimiento del de cujus',
                    'Acta de nacimiento de los herederos',
                    'Identificaciones oficiales vigentes de los herederos',
                    'CURP',
                    'En caso de legados presentar escrituras de los inmuebles',
                ]
            ],
            'INTESTAMENTARIO' => [
                'Generales' => [
                    'Acta de defunción',
                    'Actas de nacimiento de los solicitantes',
                    'Identificaciones oficiales vigentes',
                    'CURP',

                ]
            ],
            'APLICACIÓN DE BIENES HEREDITARIOS' => [
                'Generales' => [
                    'Expediente de Juzgado o Radicación Extrajudicial',
                    'Inventarios y avalúos',
                    'Escritura(s) del inmueble',
                    'Boleta predial al corriente',
                    'Constancia de No Adeudo de Agua, Factibilidad de Servicio o en su caso',
                    'Constancia de No Servicio',
                    '10 fotografías del inmueble a transmitir ( interiores y exteriores)',
                    'Ubicación del inmueble (coordenadas google)',
                ],
                'De todos los intervinientes' => [
                    'Identificaciones oficiales vigentes',
                    'Actas de nacimiento',
                    'Actas de matrimonio',
                    'CURP',
                    'Cédulas de RFC',
                ]
            ]
        ],
        'TRASLATIVAS DE DOMINIO' => [
            'OTORGAMIENTO DE ESCRITURA/ADJUDICACIÓN A VIRTUD DE REMATE' => [
                'Generales' => [
                    'Expediente de Juzgado',
                    'Escritura(s) de adquisición del inmueble',
                    'Boleta predial al corriente',
                    'Constancia de No Adeudo de Agua, Factibilidad de Servicio o en su caso Constancia de No Servicio 2021 (vigente)',
                    '10 fotografías del inmueble a transmitir ( interiores y exteriores',
                    'Ubicación del inmueble (coordenadas google',
                ],
                'De todos los intervinientes' => [
                    'Identificaciones oficiales vigentes',
                    'Actas de nacimiento',
                    'Actas de matrimonio',
                    'CURP',
                    'Cédulas de RFC',
                ],
            ],
            'DACIÓN DE PAGO' => [
                'Generales' => [
                    ' Escritura(s) de adquisición del inmueble',
                    ' Boleta predial 2021',
                    ' Constancia de No Adeudo de Agua, Factibilidad de Servicio o en su caso Constancia de No Servicio 2021 (vigente)',
                    ' Alineamiento y número oficial según el caso',
                    '10 fotografías del inmueble a transmitir ( interiores y exteriores)',
                    'Ubicación del inmueble (coordenadas google)',
                ],
                'De todos los intervinientes' => [
                    'Identificaciones oficiales vigentes',
                    'Actas de nacimiento',
                    'Actas de matrimonio',
                    'CURP',
                    'Cédulas de RFC',
                ]
            ],
            'COMPRA-VENTA' => [
                'Generales' => [
                    ' Escritura(s) del inmueble',
                    ' Boleta predial al corriente',
                    ' Constancia de No Adeudo de Agua, Factibilidad de Servicio o en su caso Constancia de No Servicio',
                    ' Avalúo Catastral vigente',
                    'Alineamiento y número oficial según el caso',
                    '10 fotografías del inmueble a transmitir ( interiores y exteriores)',
                    'Ubicación del inmueble (coordenadas google)',
                ],
                'De todos los intervinientes' => [
                    'Identificaciones oficiales vigentes',
                    'Actas de nacimiento',
                    'Actas de matrimonio',
                    'CURP',
                    'Cédulas de RFC',
                ],
                'Para exentar el ISR, que corresponde pagar al vendedor' => [
                    'Recibo de Luz del inmueble que se va a vender, con la cadena electrónica y el RFC del propietario.',
                    'Recibo de Teléfono del propietario con el domicilio del inmueble que se va a vender',
                    'Identificaron vigente (INE), con el domicilio del inmueble que se va a vender',
                    'Estados de cuentas bancarias con el domicilio del inmueble que se va a vender',
                    'Estados de cuenta de casas comerciales con el domicilio del inmueble que se va a vender',
                    'comprobantes de pago, ya sean transferencias o cheques',
                    'comprobantes para exención de ISR puede ser INE, CFDI de teléfono, energía eléctrica, estados de cuenta bancarios o de tiendas departamentales y que coincidan con el domicilio del inmueble enajenado (casa habitación)'
                ]
            ],
            'DONACIÓN GRATUITA' => [
                'Generales' => [
                    'Escritura(s) de adquisición del inmueble',
                    'Boleta predial 2023',
                    'Constancia de No Adeudo de Agua, Factibilidad de Servicio o en su caso Constancia de No Servicio 2023',
                    'Avalúo Catastral vigente',
                    'Alineamiento y número oficial actualizado',
                    'Fotografías de inmueble interior y exterior',
                    'Coordenadas UTM (Google maps)',
                ],
                'De todos los intervinientes' => [
                    'Identificaciones oficiales vigentes',
                    'Actas de nacimiento',
                    'Actas de matrimonio',
                    'CURP',
                    'Cédulas de RFC',
                ]
            ]
        ],
        'OTROS' => [
            'DECLARACIÓN DE ERECCIÓN y CONSTITUCIÓN DE RÉGIMEN DE PROPIEDAD EN CONDOMINIO' => [
                'Generales' => [
                    'Boleta predial al corriente',
                    'Escritura original del inmueble',
                    'Tabla de Indivisos o Anexo',
                    'Alineamiento y número oficial general vigente',
                    'Alineamientos y números oficiales individual de cada departamento y locales',
                    'Licencia de Uso de Suelo autorizada',
                    'Licencia de construcción',
                    'Constancia de Terminación de obra autorizada',
                    'Constancia de construcción existente',
                    'Planos de lotificación y arquitectónicos de construcción, autorizados por la Dirección de Desarrollo Urbano respectiva. Con cinco copias',
                    'Memoria descriptiva',
                    'Reglamento interno de Condominio',
                    'Constancia de Factibilidad de servicios de Agua potable, drenaje y alcantarillado',
                ]
            ],
            'DECLARACIÓN DE DEMOLICIÓN' => [
                'Generales' => [
                    'Escritura del inmueble',
                    'Boleta Predial al corriente',
                    'Alineamiento y número oficial',
                    'Licencia de Demolición de construcción',
                ],
                'De todos los intervinientes' => [
                    'Identificaciones oficiales vigentes',
                    'Actas de nacimiento',
                    'Actas de matrimonio',
                    'CURP',
                    'Cédulas de RFC',
                ],
            ]
        ]
    ];
    static public function getServices()
    {
        return self::$services;
    }

    public function validProjectQuote(string $token, int $quoteId)
    {

        $response = Http::get($this->host . $token . "/" . $quoteId);
         //dd($response->object());
        if ($response->status() == 200) {
            $verify = 1;
            $quote = $response->object();
            //dd($quote);
            $textNotification = "";


            //Objeto quote
            // $quoteResponse = Http::get($this->host . $quoteid);
            // $quote = $quoteResponse->object();
            // $quoteDetails = isset($quote->data) ? $quote->data : null;
        } else {
            $verify = 2;
            $textNotification = 'Esta cotización no fue realizada por ningún de nuestros
                    colaboradores, por favor verifique la información contactandote con nosotros.';
            $quote = '';        
        }


        return view('services')
            ->with('services', ServicesController::getServices())
            ->with('verify', $verify)
            ->with('textNotification', $textNotification)
            ->with('quote', $quote);
    }
}
