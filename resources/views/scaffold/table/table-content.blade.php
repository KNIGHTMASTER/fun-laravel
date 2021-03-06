<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
        <thead>
        <tr class="bg-info">
            @foreach($columnHeaders as $header)
                <th>{{ $header }}</th>
            @endforeach
            @if ($actionColumnHeader == 1)
                <th class="text-center">Action</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @if (!is_null($allData))
            @if ($allData->count() > 0)
                @foreach($allData as $data)
                    <tr>
                        @foreach ($databaseFields as $field)
                            <td>{{$data->$field}}</td>
                        @endforeach
                        <td class="text-center">
                            @if ($tableAction['show'] == 1)
                                <a id="oke" href="{{URL::to($entityBaseUrl, $data->id)}}" class="btn btn-primary">  <i class="fa fa-eye"></i></a>                            
                            @endif
                            @if ($tableAction['edit'] == 1)
                                <a href="{{URL::to($entityBaseUrl.'/'.$data->id.'/edit')}}" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>                        
                            @endif                            
                            @if ($tableAction['delete'] == 1)
                                <button id="delete"  value="{{$entityBaseUrl}}.{{$data->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></button>                            
                            @endif                       
                        </td>
                    </tr>
                @endforeach
            @endif
        @endif
        </tbody>
    </table>
    @if (!is_null($allData))
        @if($allData->count() > 0)
            @include('scaffold.paging.show-paging')
        @else
            <b>{{'Data is not Found'}}</b>
        @endif
    @endif
</div>