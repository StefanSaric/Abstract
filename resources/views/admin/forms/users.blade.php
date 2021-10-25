@csrf
@if(isset($user))
<input type="hidden" id="user_id" name="user_id" value="{{$user->id}}">
@endif
<div class="row"><!--Start 'name' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>account_circle</i>
        <input type="text" name="name" id="name" class="validate @error('name') invalid @enderror"
               value="@if(isset($user)){{ $user->name }}@else{{ old('name') }}@endif" @if(isset($user) || old('name') != null) placeholder="" @endif required></input>
        <label for="name" class="">{{__('Ime')}}</label>
    </div>
</div>
<div class="row"><!--Start 'email' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>email</i>
        <input type="text" name="email" id="email" class="validate @error('email') invalid @enderror"
               value="@if(isset($user)){{$user->email}}@else{{old('email')}}@endif" @if(isset($user) || old('email') != null) placeholder="" @endif required></input>
        <label for="email" class="">{{__('E-mail')}}</label>
    </div>
</div>
<div class="row"><!--Start 'password' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>vpn_key</i>
        <input type="password" name="password" id="password" class="validate @error('password') invalid @enderror"
               value="@if(!isset($user)){{old('password')}}@endif" @if(isset($user) || old('password') != null) placeholder="" @endif required></input>
        <label for="password" class="">{{__('Lozinka')}}</label>
    </div>
</div>
<div class="row"><!--Start submit button-->
    <button type="submit" class="btn cyan waves-effect waves-light right">{{__('Sačuvaj')}}
        <i class="material-icons right">send</i>
    </button>
</div>
