<?php

namespace App\Helpers;

class Helper
{
   // parameter pertama adalah model id kita.
   // paramter kedua adalah nama field tabel yang berhubungan dengan id user kita.
   // parameter ketiga adalah panjang id.
   // parameter keempat adalah prefix atau awalan kode id kita.
   public static function IDGenerator($model, $table_name, $panjang_id = 6, $prefix, $bulan)
   {
      $data = $model::whereMonth('created_at', $bulan)->orderBy('id', 'DESC')->first();
      if (!$data) {
         $log_length = $panjang_id - 1;
         $last_number = 1;
      } else {
         // ngambil data angka urut, mulai ngambilnya setelah prefix
         $code = substr($data->$table_name, strlen($prefix) + 1);
         // biar angka urutnya yang udah keambil, bisa jadi bilangan bulat. Nggak lagi ada 000 depannya
         $code_last_number = ($code / 1) * 1;

         // biar angka terakhir increment 1
         $increment_last_number = $code_last_number + 1;

         // biar angka 0 nya bisa nyesuaiin sesuai panjang id yang udah ditentukan
         $last_number_length = strlen($increment_last_number);
         $log_length = $panjang_id - $last_number_length;
         $last_number = $increment_last_number;
      }
      $zeros = "";
      for ($i = 0; $i < $log_length; $i++) {
         $zeros .= "0";
      }
      return $prefix . '' . $zeros . $last_number;
   }
}
