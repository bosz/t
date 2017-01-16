@extends('new-front.master')
@section('title', 'Login')
@section('class', 'login')
@section('main')


<section>
    <div class="innerContainer">
    <br><br><br><br>
        @include('common.errors')
        <div class="mainSection">
            <div class="stories">
                <div class="center">
                    <div class="form2">
                        <div class="center">
                            <h3>Connectes-toi</h3>
                            <form action="{{route('authenticate')}}" method="POST">
                                <br><br>
                                <input type="email" name="email" class="textBox email" placeholder="Ton mail ou pseudonyme" />
                                <br><br>
                                <input type="password" name="password" class="textBox pass" placeholder="Ton mot de passe" />
                                {{csrf_field()}}
                                <br><br><br>
                                <button type="submit" name="submit" class="submit">Connexion</button>
                            </form>
                            <hr>
                            <div class="or"><span>ou</span></div>
                            <h3>Inscris-toi</h3>
                            <form>
                                <input type="text" class="textBox name" name="name" placeholder="Ton pseudonyme" />
                                <input type="email" class="textBox email" name="email" placeholder="Ton mail" />
                                <input type="password" class="textBox pass" name="pass" placeholder="Ton mot de passe" />
                                <div class="radios" style="margin:2% 0px 2% 0px; color:#f9674e; font-size:38px;">
                                    <i class="fa fa-venus-mars"></i><input type="radio" name="male" />&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-venus"></i><input type="radio" name="female" />
                                </div>
                                <div class="dateBox" style="width:100%; float:left; position:relative; z-index:999">
                                    <input type="text" id="demo" class="textBox date" name="age" placeholder="Quel âge as-tu ?" />
                                </div>
                                <button type="submit" name="submit" class="submit">Inscription</button>
                            </form>
                            <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
                            <script src="js/dcalendar.picker.js"></script>
                            <script>
                                $('#demo').dcalendarpicker();
                                $('#calendar-demo').dcalendar(); //creates the calendar
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            @include('new-front.partials.sidebar')
        </div>
    </div>
    <div class="bottomSection">
        <div class="bottomLogo">
            <img src="{{ asset('nova_files/logo2.png') }}">
        </div>
    </div>
</section>
@endsection