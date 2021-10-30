<input type="hidden" id="id" name="id" value="{{$file->id}}">
<div class="row"><!--Start 'password' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>vpn_key</i>
        <input type="password" name="password" id="password" class="validate @error('password') invalid @enderror"
               value="@if(!isset($file)){{old('password')}}@endif" @if(isset($file) || old('password') != null) placeholder="" @endif></input>
        <label for="password" class="">{{__('Lozinka')}}</label>
    </div>
</div>
<div class="row"><!--Start submit button-->
    <div class="col s12">
        <button type="submit" class="btn cyan waves-effect waves-light right">{{__('Sačuvaj')}}
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>