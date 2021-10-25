@csrf
@if(isset($file))
    <input type="hidden" id="id" name="id" value="{{$file->id}}">
@endif
<div class="row"><!--Start 'Name' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>account_circle</i>
        <input type="text" name="name" id="name" class="validate @error('name') invalid @enderror"
               value="@if(isset($file)){{ $file->name }}@else{{ old('name') }}@endif" @if(isset($file) || old('name') != null) placeholder="" @endif required></input>
        <label for="name" class="">{{__('Naziv')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Document' form field-->
    <div class="file-field input-field col l6 m6 s12">
        <div class="btn-small cyan float-right">
            <span>{{__('Izaberi')}}</span>
            <input type="file" id="documents" name="documents[]" multiple>
        </div>
        <div class="file-path-wrapper" style="padding-left: 0">
            <i class='material-icons prefix'>attach_file</i>
            <input class="file-path validate" type="text" name="original_name" placeholder="{{__('Dodavanje dokumenata (za više fajlova držite "ctrl" prilikom odabira)')}}">
        </div>
    </div>
</div>
<div class="row"><!--Start submit button-->
    <div class="col s12">
        <button type="submit" class="btn cyan waves-effect waves-light right">{{__('Sačuvaj')}}
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>