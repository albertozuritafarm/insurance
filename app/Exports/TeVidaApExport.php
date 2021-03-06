<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use DB;

class TeVidaApExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents {

    use Exportable;

    public function __construct(String $sql) {
        $this->sql = $sql;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection() {
        //Obtain Channel
        $channelQuery = 'select cha.* from channels cha join agencies agen on agen.channel_id = cha.id where agen.id =  "' . \Auth::user()->agen_id . '"';
        $channel = DB::select($channelQuery);
        
        //Validate User Type Sucre
        $rol = \App\rols::find(\Auth::user()->role_id);
        
        //ROL SEGUROS SUCRE
        if ($rol->rol_entity_id == 1) {
            //ROL TIPO GERENCIA/EJECUTIVO
            if($rol->rol_type_id == 1 || $rol->rol_type_id == 2){
                $userSucre = null;
                $userSucreQuery = '';
            }else{
            // ROL TIPO EJECUTIVO
                $userSucre = true;
                $userSucreQuery = ' and pc.ejecutivo_ss_email = "'.\Auth::user()->email.'"';
            }
        }
        //ROL CANAL
        if($rol->rol_entity_id == 2){
            //ROL TIPO GERENCIA
            if($rol->rol_type_id == 1){
                $userSucre = true;
                $userSucreQuery = ' and c.id = ' . $channel[0]->id;
            }elseif($rol->rol_type_id == 2){
            // ROL TIPO JEFATURA
                $userSucre = true;
                $userSucreQuery = ' and a.id = "'.\Auth::user()->agen_id.'"';
            }else{
            // ROL TIPO EJECUTIVO
                $userSucre = true;
                $userSucreQuery = ' and s.user_id = "'.\Auth::user()->id.'"';
            }
        }

        $query = '';
        //if(\Auth::user()->type_id == 1 || \Auth::user()->type_id == 3){
        $query .= 'SELECT p2.ramodes as ramo, "magnusmas" as emisor,s.poliza, s.contratante, CONCAT(cu.first_name," ", cu.last_name) as asegurado,cu.document as dni_aseguado,gs.agentedes as agente,a.puntodeventades as agencia, 
        DATE_FORMAT(s.begin_date, "%d-%m-%Y") as fecha_inicio,  DATE_FORMAT(s.end_date, "%d-%m-%Y") as fecha_fin, DATE_FORMAT(s.end_date, "%M") as mes_vigencia,DATE_FORMAT(s.end_date, "%Y") as anio_vigencia,  "privado" as tipo_sector,
        "emisi??n" as tipo_poliza, pt.name  as cartera, pc.ejecutivo_ss as ajecucomercial,c.canalnegodes as canal, CONCAT(b.first_name," ", b.last_name) as beneficiario,"1" as item, 
        s.insured_value as valor_asegurado, s.prima_total as prima_neta, s.rate as tasa, "" as deducible
        from sales s
        inner join products_channel pc on pc.id = s.pbc_id
        inner join products p2 on p2.id = pc.product_id 
        inner join channels c on c.id = pc.channel_id 
        inner join agent_ss gs on gs.id =  pc.agent_ss 
        inner join agencies a on a.id = s.agen_id
        inner join customers cu on cu.id = s.customer_id 
        left join charges ch on ch.sales_id = s.id
        left join cities ci on ci.id = s.cus_city
        left join cities pro on pro.province_id = ci.province_id 
        left join beneficiary b on b.sales_id = s.id
        left join payments p on p.id = ch.payments_id  
        left join payments_types pt on pt.id = p.payment_type_id
        left join coverage co on co.product_id = pc.product_id and co.tipocoberturaid = 005
        WHERE p2.ramoid not in (7) ' . $this->sql .' '.$userSucreQuery.'
        group by s.id';
        //}

        DB::statement("SET lc_time_names = 'es_ES'");
        $datas = DB::select($query);

        //Add Total Row
        $add = [
            'ramo' => '',
            'emisor' => '',
            'poliza' => '',
            'contratante' => '',
            'asegurado' => '',
            'dni_aseguado' => '',
            'agente' => '',
            'agencia' => '',
            'fecha_inicio' => '',
            'fecha_fin' => '',
            'mes_vigencia' => '',
            'anio_vigencia' => '',
            'tipo_sector' => '',
            'tipo_poliza' => '',
            'cartera' => '',
            'ajecucomercial' => '',
            'canal' => '',
            'beneficiario' => '',
            'item' => '',
            'valor_asegurado' => '',
            'prima_neta' => '',
            'tasa' => '',
            'deducible' => ''            
        ];
        array_push($datas, $add);
        $collet = collect($datas);
        return $collet;
    }

    public function headings(): array {
        return [
            'RAMO',
            'EJECUTIVO EMISOR',
            'N??MERO P??LIZA',
            'CLIENTE C??DIGO',
            'NOMBRE CLIENTE',
            'C??DULA/RUC',
            'AGENTE',
            'AGENCIA',
            'FECHA INICIO VIGENCIA',
            'FECHA FIN VIGENCIA',
            'MES VIGENCIA',
            'A??O VIGENCIA',
            'TIPO SECTOR',
            'TIPO P??LIZA',
            'CARTERA',
            'EJEC. COMERCIAL',
            'CANAL NEGOCIO',
            'NOMBRE BENEFICIARIO',
            'ITEM',
            'MONTO ASEGURADO',
            'PRIMA NETA',
            'TASA',
            'DEDUCIBLE',
        ];
    }

      public function registerEvents(): array {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $cellRange = 'A1:w1'; // All headers
                $bodyRange = 'A2:W222';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                $event->sheet->getStyle($cellRange)->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['argb' => 'ffffff'],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
                $event->sheet->getStyle($bodyRange)->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
                $event->sheet->getStyle($cellRange)->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()->setARGB('000099');
            },
        ];
    }

}
