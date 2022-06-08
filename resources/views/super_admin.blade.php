<x-layout-dashboard title="Home">

    <div class="modal fade" id="dynamic-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-body"></div>
            </div>
        </div>
    </div>
        




    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                    <!-- @if (session()->has('alert'))
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
                @endif -->
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-primary">
                                        <i class="material-icons-outlined">contacts</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">All Companies</span>
                                        <!-- <span class="widget-stats-amount">{{ Auth::user()->contacts()->count()}}</span> -->
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-warning">
                                        <i class="material-icons-outlined">message</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Blast Message</span>
                                        <!-- <span class="widget-stats-info">{{Auth::user()->blasts()->where(['status' => 'success'])->count()}} Success</span>
                                        <span class="widget-stats-info">{{Auth::user()->blasts()->where(['status' => 'failed'])->count()}} Failed</span> -->
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
                <!-- starting of adding and listing company -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addDevice"><i class="material-icons">add</i>Add </button>
                                <h5 class ="mt-5">List Companies</h5>
                                <table class="table table-striped">
                                    <thead>
                                        <th>List of Companies</th>
                                        <th>Email of Companies</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                       @foreach ($companies as $company)
                                       <tr>
                                            <td>{{$company->username}}</td>
                                            <td>{{$company->email}}</td>
                                            <td><span class="badge badge-{{ $company->status == 'active' ? 'success' : 'danger'}}">{{$company->status}}</span>
                                            </td>
                                            <td class="w-25">
                                                <div class="d-flex justify-content-start">
                                                <button data-bs-toggle="modal" data-bs-target="#dynamic-modal" type="button" data-path="{{ route('editCompany',$company->id) }}" id="editCompanyButton" class="btn btn-warning w-25 load-ajax-modal-company"><i class="material-icons ">edit_outline</i></button>
                                                    <form action="/company/{{$company->id}}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" name="delete" class="btn btn-danger "><i class="material-icons">delete_outline</i></button>
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

                <!-- starting of adding and listing Package -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addPackage"><i class="material-icons">add</i>Add </button>
                                <h5 class="mt-5">List Packages</h5>
                                <table class="table table-striped">
                                    <thead>
                                        <th>Package Name</th>
                                        <th>Package Price</th>
                                        <th>Package Description</th>
                                        <th>plan Info</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach($packages as $package)
                                        <tr>
                                            <td>{{$package->name}}</td>
                                            <td>{{$package->price}} $</td>
                                            <td>{{$package->description}}</td>
                                            <td>{{$package->plan_info}}</td>
                                            <td>
                                                <div class="d-flex justify-content-start">
                        
                                                    <button data-bs-toggle="modal" data-bs-target="#dynamic-modal" type="button" data-path="{{ route('editPackage',$package->id) }}" id="editPackageButton" class="btn btn-warning w-25 load-ajax-modal"><i class="material-icons ">edit_outline</i></button>
                                                
                                                    <form action="/package/{{$package->id}}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <input name="id" type="hidden" value="{{$package->id}}">
                                                        <button type="submit" name="delete" class="btn btn-danger "><i class="material-icons">delete_outline</i></button>
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


    <!-- start of company model -->
    <div class="modal fade" id="addDevice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Company</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('addCompany')}}" method="POST" novalidate>
                    <div class="modal-body">
                            @csrf
                            <label for="companyName" class="form-label">Company Name</label>
                            <input type="text" name="username" class="form-control" id="companyName"  required>
                            <span id="companyNameSpan" class="alert-danger"></span><br>

                            <label for="companyEmail" class="form-label">Company Email</label>
                            <input type="email" name="email" class="form-control" id="companyEmail"  required>
                            <span id="companyEmailSpan" class="alert-danger"></span><br>

                            <label for="companyPassword" class="form-label">Company Password</label>
                            <input type="password" name="password" class="form-control" id="companyPassword"  required>
                            <span id="companyPasswordSpan" class="alert-danger"></span><br>

                            <label for="package" class="form-label">Package</label>
                            <select name="package_id" class="form-control" id="package">
                                @foreach($packages as $package)
                                    <option id="packageID" value="{{$package->id}}">{{$package->name}}</option>
                                @endforeach
                            </select><br>

                            <label for="balance" class="form-label">Balance</label>
                            <input type="text" name="balance" class="form-control" id="companyBalance">
                            <span id="companyBalanceSpan" class="alert-danger"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button id="add-company" class="btn btn-primary">Save</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- starting of package model -->
    <div class="modal fade" id="addPackage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Package</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('addPackage')}}" method="POST" novalidate>
                    <div class="modal-body">
                        @csrf
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="packageName"  required>
                        <span id="packageNameSpan" class="alert-danger"></span><br>

                        <label for="price" class="form-label">Price</label>
                         <input type="number" name="price" id="packagePrice" class="form-control">
                         <span id="packagePriceSpan" class="alert-danger"></span><br>

                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" class="form-control" id="packageDescription">
                        <span id="packageDescriptionSpan" class="alert-danger"></span><br>

                        <label for="plan_info" class="form-label">Plan Information</label>
                        <input type="text" name="plan_info" class="form-control" id="packagePlanInfo">
                        <span id="packagePlanInfoSpan" class="alert-danger"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button id="add-package" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script>

    // ajax request to insert new company in db
    $(document).on('click','#add-company',function(e){
        e.preventDefault();
        let companyName = $('#companyName').val();
        let email = $('#companyEmail').val();
        let password = $('#companyPassword').val();
        let packageID = $('#packageID').val();
        let balance = $('#companyBalance').val();
        $.ajax({
            type:'post',
            url:"{{route('addCompany')}}",
            data:{
                '_token':"{{csrf_token()}}",
                'username':companyName,
                'email':email,
                'password':password,
                'package_id':packageID,
                'balance':balance,
            },

            success:function(data){
                window.location.href ='/dashboard';
            },

            error:function(request, status, error){
                $.each(request.responseJSON.errors, function( key, value ) {
                    console.log(key, value);
                    // error handling 
                    if(key == 'name'){
                        $('#companyNameSpan').html(value);
                        $('#companyName').on('change',function(){
                                if($('#companyName').val()){
                                    $('#companyNameSpan').hide();
                                }else{
                                    $('#companyNameSpan').html(value);
                                    $('#companyNameSpan').show();
                                }
                            });
                                
                    }
                    if(key == 'balance'){
                        $('#companyBalanceSpan').html(value);
                        $('#companyBalance').on('change',function(){
                            if($('#companyBalance').val()){
                                $('#companyBalanceSpan').hide();
                            }else{
                                $('#companyBalanceSpan').html(value);
                                $('#companyBalanceSpan').show();
                                }
                        });
                    }
                    if(key == 'email'){
                        $('#companyEmailSpan').html(value);
                        $('#companyEmail').on('change',function(){
                            if($('#companyEmail').val()){
                                $('#companyEmailSpan').hide();
                            }else{
                                $('#companyEmailSpan').html(value);
                                $('#companyEmailSpan').show();
                            }
                        });
                    }
                    if(key == 'password'){
                        $('#companyPasswordSpan').html(value);
                        $('#companyEmail').on('change',function(){
                            if($('#companyEmail').val()){
                                $('#companyPasswordSpan').hide();
                            }else{
                                $('#companyPasswordSpan').html(value);
                                $('#companyPasswordSpan').show();
                            }
                        });
                    }
                });
            },
        });
    })

    // ajax request to insert new Package in db
        $(document).on('click','#add-package',function(e){
            e.preventDefault();
            let packageName = $('#packageName').val();
            let packagePrice = $('#packagePrice').val();
            let packageDescription = $('#packageDescription').val();
            let packagePlanInfo = $('#packagePlanInfo').val();
        $.ajax({
            type:'post',
            url:"{{route('addPackage')}}",
            data:{
                '_token':"{{csrf_token()}}",
                'name':packageName,
                'price':packagePrice,
                'description':packageDescription,
                'plan_info':packagePlanInfo,
            },

            success:function(data){
                window.location.href ='/dashboard';
            },
            error:function(request, status, error){
                $.each(request.responseJSON.errors, function( key, value ) {
                    if(key == 'name'){
                        $('#packageNameSpan').html(value);
                        $('#packageName').on('change',function(){
                            if($('#packageName').val()){
                                $('#packageNameSpan').hide();
                            }else{
                                $('#packageNameSpan').html(value);
                                $('#packageNameSpan').show();
                            }
                        });
                        
                    }
                    if(key == 'price'){
                        $('#packagePriceSpan').html(value);
                        $('#packagePrice').on('focusout',function(){
                            if($('#packagePrice').val()){
                                $('#packagePriceSpan').hide();
                            }else{
                                $('#packagePriceSpan').html(value);
                                $('#packagePriceSpan').show();
                            }
                        });
                    }
                    if(key == 'description'){
                        $('#packageDescriptionSpan').html(value);
                        $('#packageDescription').on('focusout',function(){
                            if($('#packageDescription').val()){
                                $('#packageDescriptionSpan').hide();
                            }else{
                                $('#packageDescriptionSpan').html(value);
                                $('#packageDescriptionSpan').show();
                            }
                        });
                    }
                    if(key == 'plan_info'){
                        $('#packagePlanInfoSpan').html(value);
                        $('#packagePlanInfo').on('focusout',function(){
                            if($('#packagePlanInfo').val()){
                                $('#packagePlanInfoSpan').hide();
                            }else{
                                $('#packagePlanInfoSpan').html(value);
                                $('#packagePlanInfoSpan').show();
                            }
                        });
                    }
                });
            },
        });
    })

    // update Package data 
    $('.load-ajax-modal').click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type : 'GET',
            url : $(this).data('path'),
            success: function(result) {
                console.log(result);
                if(result){
                    var packageDataById = `
                    <form id="formEdit" action="/package/${result.id}" method="POST" novalidate>
                        <div class="modal-body">
                            @method('patch')
                            @csrf
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" value="${result.name}" class="form-control" id="packageName"  required>
                            <span id="packageNameSpan" class="alert-danger"></span><br>

                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" value="${result.price}" id="packagePrice" class="form-control">
                            <span id="packagePriceSpan" class="alert-danger"></span><br>

                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" value="${result.description}" class="form-control" id="packageDescription">
                            <span id="packageDescriptionSpan" class="alert-danger"></span><br>

                            <label for="plan_info" class="form-label">Plan Information</label>
                            <input type="text" name="plan_info" value="${result.plan_info}" class="form-control" id="packagePlanInfo">
                            <span id="packagePlanInfoSpan" class="alert-danger"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" id="update-package" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                    ` 
                }
                $('#dynamic-modal div.modal-body').html(packageDataById);

            },
            error: function(er){
                console.log(er);
            }
        });
    });

    // update Company data 
    $('.load-ajax-modal-company').click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type : 'GET',
            url : $(this).data('path'),
            success: function(data) {
                console.log(data);
                if(data){
                    var companyDataById = `
                    <form action="/company/${data.id}" method="POST" novalidate>
                        <div class="modal-body">
                                @method('patch')
                                @csrf
                                <label for="companyName" class="form-label">Company Name</label>
                                <input type="text" name="username" value=${data.username} class="form-control" id="companyName"  required>
                                <span id="companyNameSpan" class="alert-danger"></span><br>

                                <label for="companyEmail" class="form-label">Company Email</label>
                                <input type="email" name="email" value=${data.email} class="form-control" id="companyEmail"  required>
                                <span id="companyEmailSpan" class="alert-danger"></span><br>


                                <label for="package" class="form-label">Package</label>
                                <select name="package_id" class="form-control" id="package">
                                    @foreach($packages as $package)
                                        <option id="packageID" value="{{$package->id}}">{{$package->name}}</option>
                                    @endforeach
                                </select><br>

                                <label for="balance" class="form-label">Balance</label>
                                <input type="text" name="balance" value=${data.balance} class="form-control" id="companyBalance">
                                <span id="companyBalanceSpan" class="alert-danger"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                            
                        </div>
                    </form>
                    ` 
                }
                $('#dynamic-modal div.modal-body').html(companyDataById);

            },
            error: function(er){
                console.log(er);
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