<div class="table-responsive">
    <table class="table table-bordered item-table" id="datatable">
        <thead>
            <tr>
                <th>Company Name</th>
                <th class="">Company Gmail</th>
                <th class="">Company Phone</th>
                <th class="text-right">Bank Account</th>
                <th class="text-center">Bank Name</th>
                <th class="text-center">Activate/Deactivate</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
            <tr>
                <td>{{$account->company_name}}</td>
                <td>{{$account->company_email}}</td>
                <td>{{$account->company_phone}}</td>
                <td>{{$account->bank_account}}</td>
                <td>{{$account->bank_name}}</td>
                <form>
                    @csrf
                    <td class="text-center tax">
                       @if($account->status == 0)
                       <a  href="javascript:void('{{ $account->id }}');"  data-id="{{ $account->id }}" class="badge badge-danger deactive">Deactive</a>
                       @else
                       <a href="javascript:void('{{ $account->id }}');" data-id="{{ $account->id }}" class="badge badge-enabled badge-succss deactive">Active</a>
                       @endif
                    </td>
                </form>
        
            <td><a href="#addprod" target="_modal" class="editaccount" data-edit="{{route('payment.edit',$account->id)}}" data-update="{{route('payment.update',$account->id)}}"><span class="badge rounded-pill bg-info"><i class="fa-regular fa-pen-to-square"></i></span></a><a href="javascript:void({{ $account->id }});" class="deleteaccount" data-url="{{route('payment.delete',$account->id)}}"><span class="badge rounded-pill bg-danger"><i class="fa-solid fa-trash"></i></span></a></td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>