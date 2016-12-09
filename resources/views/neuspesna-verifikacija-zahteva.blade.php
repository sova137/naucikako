@extends('main-parent-layout')

<!-- Main Content -->
@section('content')
<br/><br/>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Neuspešna verifikacija zahteva</div>
                <div class="panel-body">
                    <span class="help-block">
                        <strong>Vaš zahtev ne može biti verifikovan.</strong>
                    </span>
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{{url('/')}}" class="btn btn-primary">
                               Nazad
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

