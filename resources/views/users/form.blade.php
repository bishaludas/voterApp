	<div class="row form-group">
		<div class="ml-3 col-lg-3">
			<span style="font-size: 95%">{{ Form::label('image_path', 'Photo')}}</span>
		</div>
		<div class="col-lg-8">
			{{ Form::file('image_path', null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	<div class="row form-group">
		<div class="ml-3 col-lg-3">
			<span style="font-size: 95%">{{ Form::label('voter_no', 'मतदाताको  नं.')}}</span>
		</div>
		<div class="col-lg-8">
			{{ Form::text('voter_no', null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	<div class="row form-group">
		<div class="ml-3 col-lg-3">
			<span style="font-size: 95%">{{ Form::label('nep_name', 'मतदाताको नाम (नेपालीमा)')}}</span>
		</div>
		<div class="col-lg-8">
			{{ Form::text('nep_name', null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	<div class="row form-group">
		<div class="ml-3 col-lg-3">
			<span style="font-size: 95%">{{ Form::label('eng_name', 'मतदाताको नाम (अंग्रेजीमा)')}}</span>
		</div>
		<div class="col-lg-8">
			{{ Form::text('eng_name', null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	<div class="row form-group">
		<div class="ml-3 col-lg-3">
			<span style="font-size: 95%">{{ Form::label('dob', 'जन्म मिति')}}</span>
		</div>
		<div class="col-lg-6">
			{{ Form::text('dob', null, ['class'=>'form-control dob-picker', 'placeholder'=>'Select Date of Birth', 'id'=>'nepaliDate'])}}
			<div class="convertedDate"></div>
			<div class="error-message"></div>
		</div>
		<div class="col-lg-2">
			<span id="clear-bth" class="btn btn-primary" onclick="document.getElementById('nepaliDate').value = ''">Clear</span>
		</div>
	</div>

	<div class="row form-group">
		<div class="ml-3 col-lg-3">
			<span style="font-size: 95%">{{ Form::label('sex', 'लिङ्ग')}}</span>
		</div>
		<div class="col-lg-8">
			{{ Form::select('sex',[''=>'-- Choose One --','male'=>'पुरुष','female'=>'महिला', 'other'=>'अन्य'], null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>
	
	<div class="row form-group">
		<div class="ml-3 col-lg-3">
			<span style="font-size: 95%">{{ Form::label('citizenship_no', 'नागरिकता नं.')}}</span>
		</div>
		<div class="col-lg-8">
			{{ Form::text('citizenship_no', null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	<div class="row form-group">
		<div class="ml-3 col-lg-3">
			<span style="font-size: 95%">{{ Form::label('father_name', "वुवाको नाम")}}</span>
		</div>
		<div class="col-lg-8">
			{{ Form::text('father_name', null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	<div class="row form-group">
		<div class="ml-3 col-lg-3">
			<span style="font-size: 95%">{{ Form::label('mother_name', "आमाको नाम")}}</span>
		</div>
		<div class="col-lg-8">
			{{ Form::text('mother_name', null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	<div class="row form-group">
		<div class="ml-3 col-lg-3">
			<span style="font-size: 95%">{{ Form::label('husband_wife', 'पति / पत्निको नाम')}}</span>
		</div>
		<div class="col-lg-8">
			{{ Form::text('husband_wife', null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	<div class="row form-group">
		<div class="ml-3 col-lg-3">
			<span style="font-size: 95%">{{ Form::label('state_id', 'प्रदेश नं')}}</span>
		</div>
		<div class="col-lg-8">
			{{ Form::select('state_id', [''=>'-- Choose One --']+$states,null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	<div class="row form-group">
		<div class="ml-3 col-lg-3">
			<span style="font-size: 95%">{{ Form::label('district_id', 'जिल्ला')}}</span>
		</div>
		<div class="col-lg-8">
			{{ Form::select('district_id', [''=>'-- Choose One --']+$districts,null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	<div class="row form-group">
		<div class="ml-3 col-lg-3">
			<span style="font-size: 95%">{{ Form::label('rep_assembly_id', 'प्रतिनिधि सभा निर्वाचन नं')}}</span>
		</div>
		<div class="col-lg-8">
			{{ Form::select('rep_assembly_id', [''=>'-- Choose One --']+$repAssembly,null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	<div class="row form-group">
		<div class="ml-3 col-lg-3">
			<span style="font-size: 95%">{{ Form::label('state_assembly_id', 'प्रदेश सभा निर्वाचन नं')}}</span>
		</div>
		<div class="col-lg-8">
			{{ Form::select('state_assembly_id', [''=>'-- Choose One --']+$stateAssembly,null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	<div class="row form-group">
		<div class="ml-3 col-lg-3">
			<span style="font-size: 95%">{{ Form::label('vdc_municipality_id', 'गा.पा./न.पा.')}}</span>
		</div>
		<div class="col-lg-8">
			{{ Form::select('vdc_municipality_id', [''=>'-- Choose One --']+$municipality,null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	<div class="row form-group">
		<div class="ml-3 col-lg-3">
			<span style="font-size: 95%">{{ Form::label('ward_id', 'वडा नं.')}}</span>
		</div>
		<div class="col-lg-8">
			{{ Form::select('ward_id', [''=>'-- Choose One --']+$ward,null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

	<div class="row form-group">
		<div class="ml-3 col-lg-3">
			<span style="font-size: 95%">{{ Form::label('constituency_id', 'मतदान स्थल')}}</span>
		</div>
		<div class="col-lg-8">
			{{ Form::select('constituency_id', [''=>'-- Choose One --']+$pollStations,null, ['class'=>'form-control'])}}
			<div class="error-message"></div>
		</div>
	</div>

