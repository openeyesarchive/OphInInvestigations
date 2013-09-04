
/* Module-specific javascript can be placed here */

$(document).ready(function() {
			handleButton($('#et_save'),function() {
					});
	
	handleButton($('#et_cancel'),function(e) {
		if (m = window.location.href.match(/\/update\/[0-9]+/)) {
			window.location.href = window.location.href.replace('/update/','/view/');
		} else {
			window.location.href = baseUrl+'/patient/episodes/'+et_patient_id;
		}
		e.preventDefault();
	});

	handleButton($('#et_deleteevent'));

	handleButton($('#et_canceldelete'),function(e) {
		if (m = window.location.href.match(/\/delete\/[0-9]+/)) {
			window.location.href = window.location.href.replace('/delete/','/view/');
		} else {
			window.location.href = baseUrl+'/patient/episodes/'+et_patient_id;
		}
		e.preventDefault();
	});

	$('select.populate_textarea').unbind('change').change(function() {
		if ($(this).val() != '') {
			var cLass = $(this).parent().parent().parent().attr('class').match(/Element.*/);
			var el = $('#'+cLass+'_'+$(this).attr('id'));
			var currentText = el.text();
			var newText = $(this).children('option:selected').text();

			if (currentText.length == 0) {
				el.text(ucfirst(newText));
			} else {
				el.text(currentText+', '+newText);
			}
		}
	});

	$('input[name="Element_OphInInvestigations_BloodTests[hb_hct_tested]"]').click(function(e) {
		if ($(this).is(':checked')) {
			$('div.hb_hct_result').show();
			$('#Element_OphInInvestigations_BloodTests_hb_hct').focus();
		} else {
			$('div.hb_hct_result').hide();
		}
	});

	$('input[name="Element_OphInInvestigations_BloodTests[bun_electrolytes_tested]"]').click(function(e) {
		if ($(this).is(':checked')) {
			$('div.bun_electrolytes_result').show();
			$('#Element_OphInInvestigations_BloodTests_bun_electrolytes').focus();
		} else {
			$('div.bun_electrolytes_result').hide();
		} 
	});

	$('input[name="Element_OphInInvestigations_BloodTests[blood_glucose_tested]"]').click(function(e) {
		if ($(this).is(':checked')) {
			$('div.blood_glucose_result').show();
			$('#Element_OphInInvestigations_BloodTests_blood_glucose').focus();
		} else {
			$('div.blood_glucose_result').hide();
		} 
	});

	$('input[name="Element_OphInInvestigations_Ecg[ecg_tested]"]').click(function(e) {
		if ($(this).is(':checked')) {
			$('div.ecg_result').show();
			$('#Element_OphInInvestigations_Ecg_ecg').focus();
		} else {
			$('div.ecg_result').hide();
		} 
	});

	$('input[name="Element_OphInInvestigations_Cxr[cxr_tested]"]').click(function(e) {
		if ($(this).is(':checked')) {
			$('div.cxr_result').show();
			$('#Element_OphInInvestigations_Cxr_cxr').focus();
		} else {
			$('div.cxr_result').hide();
		} 
	});

	$('input[name="Element_OphInInvestigations_Urinalysis[urinalysis_tested]"]').click(function(e) {
		if ($(this).is(':checked')) {
			$('div.urinalysis_result').show();
			$('#Element_OphInInvestigations_Urinalysis_urinalysis').focus();
		} else {
			$('div.urinalysis_result').hide();
		} 
	});
});

function ucfirst(str) { str += ''; var f = str.charAt(0).toUpperCase(); return f + str.substr(1); }

function eDparameterListener(_drawing) {
	if (_drawing.selectedDoodle != null) {
		// handle event
	}
}
