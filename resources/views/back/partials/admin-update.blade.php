
<div class="container-fluid">
	<!-- Nom -->
<!-- 	<div class="form-group has-feedback">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
			<input type="text" class="form-control" name="name" placeholder="Nom">
		</div>
	</div> -->
	<!-- Mail -->
<!-- 	<div class="form-group has-feedback">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
			<input type="mail" class="form-control" name="mail" placeholder="mail@domain.fr">
		</div>
	</div> -->
	<!-- Mot de passe -->
<!-- 	<div class="form-group has-feedback">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
			<input type="password" class="form-control" name="password" placeholder="Mot de passe">
		</div>
	</div> -->
	{!! csrf_field() !!}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Nom</label>

        <div class="col-md-6 input-group">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Adresse E-Mail</label>

        <div class="col-md-6 input-group">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Mot de passe</label>

        <div class="col-md-6 input-group">
            <input type="password" class="form-control" name="password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Confirmation Mot de passe</label>

        <div class="col-md-6 input-group">
            <input type="password" class="form-control" name="password_confirmation">

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
    </div>

	<!-- Case à cocher -->
	<div class="form-group">
		<div class="checkbox col-md-6 col-md-offset-4">
			<label class="control-label">
				<input type="checkbox" name="admin" value="1">
				Administrateur
			</label>
		</div>
	</div>
</div>
