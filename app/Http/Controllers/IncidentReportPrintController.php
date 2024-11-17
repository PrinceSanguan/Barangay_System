<?php

namespace App\Http\Controllers;

use App\Models\IncidentReport;
use Illuminate\Http\Request;
use PDF; // Assuming you're using a PDF package for printing, such as `barryvdh/laravel-dompdf`

class IncidentReportPrintController extends Controller
{
    public function print(IncidentReport $incidentReport)
    {
        // Fetch the incident report data
        $data = $incidentReport;

        // Generate the PDF (using a package like dompdf)
        $pdf = PDF::loadView('incident-reports.print', compact('data'));


        // Return the PDF as a downloadable file
        return $pdf->download('incident-report-'.$incidentReport->id.'.pdf');
    }
}

