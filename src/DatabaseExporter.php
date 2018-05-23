<?php

namespace Arapel\DatabaseExporter;

use Illuminate\Support\Facades\DB;

class DatabaseExporter
{
    private static $pdo;

    /**
     * ExportController constructor.
     */
    public function __construct()
    {
        self::$pdo = DB::connection()->getPdo();
    }

    public static function Export()
    {
        $output = '';
        foreach (self::getTablesNames() as $table) {
            /*Put Data To Tables*/
            $query = DB::table($table)->get();

            foreach ($query as $item) {
                $item = (array)$item;
                $table_column_array = array_keys($item);
                $table_value_array = array_values($item);
                $output .= "\n insert into {$table} (" . implode(', ', $table_column_array) . ") values ('" . implode("','", $table_value_array) . "'); \n";
            }
        }

        $file_handle = fopen('backup.sql', 'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);

        return 1;
    }

    public static function getTablesNames()
    {
        $tables = DB::table('migrations')->get();
        $tablesNames = [];
        foreach ($tables as $table) {
            $tableName = preg_replace('/[0-9]+/', '', $table->migration);
            $tableName = str_replace("create", '', $tableName);
            $tableName = str_replace("table", '', $tableName);
            $tableName = rtrim($tableName, '_');
            $tableName = ltrim($tableName, '_');
            $tableName = preg_replace('/\_+/', '_', $tableName);
            $tableName = strtolower($tableName);
            if (!in_array($tableName, config('exporter.excerpts'))) {
                $tablesNames[] = $tableName;
            }
        }
        return $tablesNames;
    }
}