<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Complaint;

class ComplaintRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'anonymous' => ['boolean'],
            'firstname' => ['string'],
            'middlename' => ['string'],
            'lastname' => ['string'],
            'email' => ['email'],
            'phone' => ['phone'],
            'complainanttype' => ['string'],
            'allegetype' => ['string'],
            'reported' => ['boolean'],
            'towhom' => ['string'],
            'description' => ['string'],
            'detail' => ['string'],
            'threat' => ['boolean'],
            'evidence' => ['boolean'],
            'dateoccurred' => ['date'],
            'wid' => ['string'],
            'nid' => ['string'],
            'nopossession' => ['boolean'],
            'user_id' => ['integer'],
            'complaintno' => ['string']

        ];
    }
    public function prepareForValidation()
    {
        $counter = "";
        $complaint = Complaint::latest()->first();
        if (is_null($complaint)) {
            $counter = "001";
        } else {
            $strcounter = (int) substr($complaint->complaintno, -3);
            $no = (string)($strcounter + 1);
            $counter = str_pad($no, 3, '0', STR_PAD_LEFT);
        }
        $tz = 'Africa/Nairobi';
        $dt = new \DateTime("now", new \DateTimeZone($tz));
        $dttostr = $dt->format('Y-m-d H:i:s');
        $strwithtimetoday = strtotime($dttostr);
        $datetoday = date('Y-m-d', $strwithtimetoday);
        $strtoday = strtotime($datetoday);
        $startday = \unixtojd(strtotime(substr($datetoday, 0, 5) . "01-01"));
        $endday = \unixtojd($strtoday);
        $juliandate = str_pad($endday - $startday, 3, '0', STR_PAD_LEFT);
        $compliantno = substr($datetoday, 0, 1) . $juliandate . date('H', $strwithtimetoday) .
            date('i', $strwithtimetoday) . $counter;
        $this->merge([
            'complaintno' => $compliantno
        ]);
    }
}
