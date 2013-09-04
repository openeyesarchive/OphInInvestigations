<?php

class DefaultController extends BaseEventTypeController
{
	public function hideHbHctResult($element) {
		if (empty($_POST)) {
			return !$element->hb_hct_tested;
		}
		return !@$_POST['Element_OphInInvestigations_BloodTests']['hb_hct_tested'];
	}

	public function hideBunResult($element) {
		if (empty($_POST)) {
			return !$element->bun_electrolytes_tested;
		}
		return !@$_POST['Element_OphInInvestigations_BloodTests']['bun_electrolytes_tested'];
	}

	public function hideBloodGlucoseResult($element) {
		if (empty($_POST)) {
			return !$element->blood_glucose_tested;
		}
		return !@$_POST['Element_OphInInvestigations_BloodTests']['blood_glucose_tested'];
	}

	public function hideECGResult($element) {
		if (empty($_POST)) {
			return !$element->ecg_tested;
		}
		return !@$_POST['Element_OphInInvestigations_Ecg']['ecg_tested'];
	}

	public function hideCXRResult($element) {
		if (empty($_POST)) {
			return !$element->cxr_tested;
		}
		return !@$_POST['Element_OphInInvestigations_Cxr']['cxr_tested'];
	}

	public function hideUrinalysisResult($element) {
		if (empty($_POST)) {
			return !$element->urinalysis_tested;
		}
		return !@$_POST['Element_OphInInvestigations_Urinalysis']['urinalysis_tested'];
	}
}
