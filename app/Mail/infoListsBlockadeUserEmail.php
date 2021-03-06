<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;
use Barryvdh\DomPDF\Facade as PDF;
use Dompdf\Adapter\PDFLib;

class infoListsBlockadeUserEmail extends Mailable {

    use Queueable,
        SerializesModels;

    public $saleId;
    public $customerDocument;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($saleId, $customerDocument,$inspectionId) {
        $this->saleId = $saleId;
        $this->customerDocument = $customerDocument;
        $this->inspectionId = $inspectionId;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        $customerQuery = 'select concat(cus.first_name," ",IFNULL(cus.second_name, "")," ",cus.last_name," ",cus.second_last_name) as "Cliente", concat(cus.first_name," ",cus.second_name) as "names", concat(cus.last_name," ",cus.second_last_name) as "lastNames", pro.ramodes as "ramo", cus.document as "cusDocument", DATE_FORMAT(sal.emission_date, "%Y") as "year", sal.id as "id", pro.name as "proName", DATE_FORMAT(sal.emission_date, "%d/%m/%Y") as "date", cus.email as "email", cus.mobile_phone as "mobile", cus.phone as "phone", sal.agen_id as "agen_id", CONCAT(users.first_name," ",users.last_name) as "user", ch.name as "channel_name", doc.name as "typeDocDes", cus.birthdate as "cusBirthdate"
                                        from customers cus
                                        join sales sal on sal.customer_id = cus.id
                                        join products_channel pbc on pbc.id = sal.pbc_id
                                        join products pro on pro.id = pbc.product_id
                                        join users on users. id = sal.user_id
                                        join documents doc on cus.document_id = doc.id
                                        join channels ch on ch.id = pbc.channel_id
                                        where sal.id = "' . $this->saleId . '"';
        $customer = DB::select($customerQuery);

        $carQuery='SELECT  vh.plate as "plate", vhb.name as "brand", vh.model as "model", vh.year as "year"  
                            FROM vehicles_sales vhsal
                            join vehicles vh on vhsal.vehicule_id=vh.id
                            join vehicles_brands vhb on vhb.id=vh.brand_id
                            join inspection ins on ins.sales_id=vhsal.sales_id
                            where vhsal.sales_id = "' . $this->saleId . '" and ins.id ="' . $this->inspectionId . '"';
        $car = DB::select($carQuery);
        
        $sales = \App\sales::find($this->saleId);

        $productName = \App\sales::selectRaw('products.name, products.productodes, products.price, cus.document')
                                    ->join('products_channel as pbc','pbc.id','sales.pbc_id')
                                    ->join('products','products.id','=','pbc.product_id')
                                    ->join('customers as cus','cus.id','=','sales.customer_id')
                                    ->where('sales.id','=',$this->saleId)
                                    ->get();
        
        $email = $customer[0]->email;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = 'coberto@magnusmas.com';
        }
        
        $document = encrypt($this->customerDocument);
        $sale = encrypt($this->saleId);
//        $document = $this->customerDocument;
//        $sale = $this->saleId;
        
         //Validate ID Length
        if (strlen($customer[0]->id) == 3) {
            $id = '00' . $customer[0]->id;
        } else if (strlen($customer[0]->id) == 4) {
            $id = '0' . $customer[0]->id;
        } else {
            $id = $customer[0]->id;
        }

        $returnBenefits = false;        
        
        return $this->view('emails.infoListsBlockadeUser')
                    ->from('tupolizaenlinea@segurossucre.fin.ec', 'SEGUROS SUCRE ??? TU P??LIZA EN L??NEA')
                    ->subject('Notificaci??n de Inspecci??n realizada Cotizaci??n'.$this->saleId)
                    ->replyTo('tupolizaenlinea@segurossucre.fin.ec', 'SEGUROS SUCRE ??? TU P??LIZA EN L??NEA')
                    ->with([
                        'id' => $this->saleId,
                        'document' => $document,
                        'sale' => $sale,
                        'customer' => $customer,
                        'inspectionId'=>$inspectionId
        ]);
    }
}
