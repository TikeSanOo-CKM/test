

@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Hi boss!
                </div>

            </div>
        </div>
        <form action="{{url('send_email')}}" method="POST">
            @csrf
         <button class="btn-primary send_email" type="submit" class="send_email" name="send_email" value="Email Send">
         </form>
    </div>
</div>
@endsection
