<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
?>

<div class="element <?php echo $element->elementType->class_name?>"
	data-element-type-id="<?php echo $element->elementType->id?>"
	data-element-type-class="<?php echo $element->elementType->class_name?>"
	data-element-type-name="<?php echo $element->elementType->name?>"
	data-element-display-order="<?php echo $element->elementType->display_order?>">
	<h4 class="elementTypeName"><?php echo $element->elementType->name; ?></h4>

	<div id="div_Element_OphInInvestigations_BloodTests_hb_hct_tested" class="eventDetail">
		<div class="label"><?php echo $element->getAttributeLabel('hb_hct_tested')?>:</div>
		<div class="data">
			<?php echo $form->checkBox($element, 'hb_hct_tested', array('nowrapper' => true))?>
			<div class="test_result hb_hct_result"<?php if ($this->hideHbHctResult($element)) {?> style="display: none"<?php }?>>
				<span>Result:</span>
				<?php echo $form->textField($element, 'hb_hct', array('size' => '20','maxlength' => '20','nowrapper'=>true))?>
				<?php echo $element->getSetting('hb_hct_label')?>
			</div>
		</div>
	</div>

	<div id="div_Element_OphInInvestigations_BloodTests_bun_electrolytes_tested" class="eventDetail">
		<div class="label"><?php echo $element->getAttributeLabel('bun_electrolytes_tested')?>:</div>
		<div class="data">
			<?php echo $form->checkBox($element, 'bun_electrolytes_tested', array('nowrapper' => true))?>
			<div class="test_result bun_electrolytes_result"<?php if ($this->hideBunResult($element)) {?> style="display: none"<?php }?>>
				<span>Result:</span>
				<?php echo $form->textField($element, 'bun_electrolytes', array('size' => '20','maxlength' => '20','nowrapper'=>true))?>
			</div>
		</div>
	</div>

	<div id="div_Element_OphInInvestigations_BloodTests_blood_glucose_tested" class="eventDetail">
		<div class="label"><?php echo $element->getAttributeLabel('blood_glucose_tested')?>:</div>
		<div class="data">
			<?php echo $form->checkBox($element, 'blood_glucose_tested', array('nowrapper' => true))?>
			<div class="test_result blood_glucose_result"<?php if ($this->hideBloodGlucoseResult($element)) {?> style="display: none"<?php }?>>
				<span>Result:</span>
				<?php echo $form->textField($element, 'blood_glucose', array('size' => '20','maxlength' => '20','nowrapper'=>true))?>
			</div>
		</div>
	</div>
</div>
