@extends('layouts.master')

@section('title')
Welcome!
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Reģistrēties</h3>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="email">Jūsu e-pasts</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="first_name">Vārds</label>
                    <input class="form-control" type="text" name="first_name" id="first_name">
                </div>
                <div class="form-group">
                    <label for="password">Parole</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Reģistrēties</button>
            </form>
        </div>
        <div class="col-md-6">
            <h3>Ienākt</h3>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="email">E-pasts</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Parole</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Ienākt</button>
            </form>
        </div>
    </div>
@endsection
