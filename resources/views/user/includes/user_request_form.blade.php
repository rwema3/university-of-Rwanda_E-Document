<div class="main-content container-fluid">
    
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Apply for Mission </h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=" {{route('user.dashboard')}} " class="text-success">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Mission Request</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form id="frmSave" method="POST" class="form" action="{{route('user.request.create')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="level">Level</label>
                                            <div class="position-relative">
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="basicSelect" name="level" required="">
                                                        <option value="" selected="" disabled="">-- select --</option>
                                                        @if ($user->level_id)


                                                        @foreach ($levels as $item)

                                                        @if ($item->id < $user->level_id)
                                                        <option value="{{ $item->id}}"> {{ $item->name }}</option>
                                                        @else
                                                        <option value="{{ $item->id}}" disabled> {{ $item->name }}</option>

                                                        @endif
                                                            
                                                        @endforeach
                                                            
                                                        @endif
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-center">
                                    <span class="form-error"></span>

                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>
