@extends('exporter::master')

@section('content')
    <h6 class="bg-dark p-3 text-white">جهت تهیه بکاپ از وبسایت روی دکمه Generate Backup کلیک فرمایید.</h6>

    <form action="{{url('database/export')}}" method="post" id="export" class="row border border-gray my-4 mx-1 py-3">
        {{csrf_field()}}
        @foreach(\Arapel\DatabaseExporter\DatabaseExporter::getTablesNames() as $table)
            <div class="col-3 form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" disabled class="custom-control-input tables-check" id="table-{{$loop->index}}" name="table[]" value="{{$table}}" checked>
                    <label class="custom-control-label" for="table-{{$loop->index}}">{{$table}}</label>
                </div>
            </div>
        @endforeach

        <div class="col-12 form-group">
            <input type="submit" value="Generate Backup" class="btn btn-dark">
        </div>
    </form>
@stop