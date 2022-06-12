<x-layout-dashboard title="Home">
  
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                @if (session()->has('alert'))
                <x-alert>
                    @slot('type',session('alert')['type'])
                    @slot('msg',session('alert')['msg'])
                </x-alert>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
            @if(!(auth()->user()->role == "admin"))
           
                @if($user->package == null)
                <div class="col-xl-4">
                    <div class="card widget widget-stats bg-danger">
                        <div class="card-body">
                            
                            <div class="widget-stats-container d-flex">
                                <h5 class="text-white">Un Subscribed</h5>
                            
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-xl-4">
                    <div class="card widget widget-stats bg-success">
                        <div class="card-body">
                            <div class="widget-stats-container text-center d-flex-center">
                                <h5 class="text-white">Subscribed</h5>
                            
                            
                                <span class="text-white" id="subscribedPackageName">{{$user->package->name}}</span>
                               
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endif
                

                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">

                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-primary">
                                        <i class="material-icons-outlined">contacts</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">All Contacts</span>
                                        <span class="widget-stats-amount">{{ Auth::user()->contacts()->count()}}</span>
    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-warning">
                                        <i class="material-icons-outlined">message</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Blast Message</span>
    
                                        <span class="widget-stats-info">{{Auth::user()->blasts()->where(['status' => 'success'])->count()}} Success</span>
                                        <span class="widget-stats-info">{{Auth::user()->blasts()->where(['status' => 'failed'])->count()}} Failed</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-danger">
                                        <i class="material-icons-outlined">schedule</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Pesan jadwal</span>
    
                                        <span class="widget-stats-info">0 Sukses</span>
                                        <span class="widget-stats-info">0 Gagal</span>
                                        <span class="widget-stats-info">0 Pending</span>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="row">
                    @if($user->package == null)
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mt-5">List Packages</h5>
                                <table class="table table-striped">
                                    <thead>
                                        <th>Package Name</th>
                                        <th>Package Price</th>
                                        <th>Package Description</th>
                                        <th>plan Info</th>
                                        <th>Subscribe</th>
                                    </thead>
                                    <tbody>
                                        @foreach($packages as $package)
                                        <tr>
                                            <td >{{$package->name}}</td>
                                            <td>{{$package->price}} $</td>
                                            <td>{{$package->description}}</td>
                                            <td>{{$package->plan_info}}</td>
                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <form action="" method="post">
                                                        @csrf
                                                        <button type="button" data-name="{{$package->name}}"  data-id="{{$package->id}}" class="btn btn-danger btn-success w-25 subscribe"><i class="material-icons" id="addIcon">add</i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h5>List Devices</h5>
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addDevice"><i class="material-icons">add</i>Add </button>
                                <table class="table table-striped">
                                    <thead>
                                        <th>Number</th>
                                        <th>Webhook</th>
                                        <th>Messages Sent</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                       @foreach ($numbers as $number)
                                       <tr>
    
                                        <td>{{$number['body']}}</td>
                                        <td>
                                            <form action="" method="post">
                                                @csrf
                                                <input type="text" id="webhook" class="form-control form-control-solid-bordered" data-id="{{$number['body']}}" name="" value="{{$number['webhook']}}">
                                            </form>
                                        </td>
                                        <td>{{$number['messages_sent']}}</td>
                                        <td><span class="badge badge-{{ $number['status'] == 'Connected' ? 'success' : 'danger'}}">{{$number['status']}}</span></td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{route('scan',$number->body)}}" class="btn btn-warning "  style="font-size: 10px;"><i class="material-icons">qr_code</i></a>
                                                <form action="{{route('deleteDevice')}}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <input name="deviceId" type="hidden" value="{{$number['id']}}">
                                                    <button type="submit" name="delete" class="btn btn-danger"><i class="material-icons">delete_outline</i></button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="addDevice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Device</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('addDevice')}}" method="POST">
                        @csrf
                        <label for="sender" class="form-label">Number</label>
                        <input type="number" name="sender" class="form-control" id="nomor"  required>
                        <p class="text-small text-danger">*Use Country Code ( without + )</p>
                        <label for="urlwebhook" class="form-label">Link webhook</label>
                        <input type="text" name="urlwebhook" class="form-control" id="urlwebhook">
                        <p class="text-small text-danger">*Optional</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit"  name="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>

        $(document).on('click','.subscribe',function(e){
           
            var packageId = $(this).data('id');
            var PackageName = $(this).data('name');
            console.log(packageId);
            console.log(PackageName);
            
            e.preventDefault();

            $.ajaxSetup({
                headers:{
                    'X-CSRF-Token':$('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:"post",
                url:"{{route('assignPackageToCompany',Auth::user()->id)}}",
                data:{
                    'package_id':packageId ? packageId : null
                },
                success:function(res){
                    console.log(res);
                  window,location.href = "/home"
                },
                error:function(err){
                    console.log(err);
                }
            });
        });


        //timer identifier
        var typingTimer;                
        var doneTypingInterval = 1000;
        $('#webhook').keydown(function(){
            clearTimeout(typingTimer);
            typingTimer = setTimeout(function(){
                $.ajax({
                        method : 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url : '{{route('setHook')}}',
                        data : {
                            number : $('#webhook').data('id'),
                            webhook : $('#webhook').val()
                        },
                        dataType : 'json',
                        success : (result) => {
                        
                        },
                        error : (err) => {
                            console.log(err);
                        }
                    })
            }, doneTypingInterval);
        })
    </script>
</x-layout-dashboard>