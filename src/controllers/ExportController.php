<?php

namespace Arapel\DatabaseExporter\Controllers;

use App\Http\Controllers\Controller;
use Arapel\DatabaseExporter\DatabaseExporter;

class ExportController extends Controller
{

    public function home()
    {
        return view('exporter::home');
    }

    public function export()
    {
        if (DatabaseExporter::Export() == 1) {
            return response()->download('backup.sql', 'backup.sql', [
                'Content-Description: File Transfer',
                'Content-Type: application/octet-stream',
                'Content-Disposition: attachment;filename=' . basename('backup.sql'),
                'Content-Transfer-Encoding: binary',
                'Expires:0',
                'Cache-Control: must-revalidate',
                'Pragma: public',
                'Content-Length: ' . filesize('backup.sql')
            ]);
        }
        return back();
    }
}
