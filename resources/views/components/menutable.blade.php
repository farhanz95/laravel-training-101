
<div class="pull-left">
    There Are Currently {{ $models->total() }} Post
    
    <br>

    No Of Post To Appear On Each Page
    <select name="perPage" class="form-control perPage" width="20px !important">
        @foreach (['15','30','45','60','75','90'] as $key => $value)
             <option>{{ $value }}</option>
        @endforeach
    </select>
    <a href="{{ route($models[0]->getTable().'.create') }}">
        <button class="btn btn-sm btn-default pull-left" style="margin-top:10px;margin-bottom:10px">Add {{ strtoupper($models[0]->getTable()) }}</button>
    </a>
</div> 