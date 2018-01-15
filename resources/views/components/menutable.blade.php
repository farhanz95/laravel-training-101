<?php $tableName = $models[0] ? $models[0]->getTable() : Illuminate\Support\Facades\Route::getFacadeRoot()->current()->uri(); ?>

<div class="pull-left">
    There Are Currently {{ $models->total() }} {{ str_singular(ucfirst($tableName)) }}
    
    <br>

    No Of {{ str_singular(ucfirst($tableName)) }} To Appear On Each Page
    <select name="perPage" class="form-control perPage" width="20px !important">
        @foreach (['15','30','45','60','75','90'] as $key => $value)
             <option>{{ $value }}</option>
        @endforeach
    </select>
    <a href="{{ route($tableName.'.create') }}">
        <button class="btn btn-sm btn-default pull-left" style="margin-top:10px;margin-bottom:10px">Add {{ ucfirst($tableName) }}</button>
    </a>
</div> 