<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfGeneratorK extends BaseController
{
    public function generatePDF()
    {
        $model = new \App\Models\AgendaKModel(); // Sesuaikan dengan namespace dan nama model Anda

        $data['agendak'] = $model->findAll(); // Ambil data decision dari model
        $data['isPDF'] = true; // Tentukan bahwa view dirender sebagai PDF

        // Load decision_view into HTML variable
        $html = view('agendak_view', $data);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);

        // Setting ukuran dan orientasi kertas
        $dompdf->setPaper('A3', 'landscape');

        // Render PDF (output)
        $dompdf->render();

        // Outputkan atau simpan file PDF
        $dompdf->stream("daftar_Agenda_Keluar.pdf");
    }
}
