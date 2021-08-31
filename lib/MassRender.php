<?php
/**
 * This class will render the editing of multiple LDAP entries.
 *
 * @author The phpLDAPadmin development team
 * @package phpLDAPadmin
 */

/**
 * TemplateRender class
 *
 * @package phpLDAPadmin
 * @subpackage Templates
 */
class MassRender extends TemplateRender {
	protected function drawMassFormReadWriteValueAttribute($attribute,$i,$j) {
		if (DEBUGTMP) printf('<font size=-2>%s</font><br />',__METHOD__);

		$val = $attribute->getValue($i);

		if ($attribute->getHelper())
			echo '<table cellspacing="0" cellpadding="0" border=1><tr><td valign="top">';

		printf('<input type="text" class="value" name="mass_values[%s][%s][%s]" id="new_values_%s_%s_%s" value="%s" %s%s %s %s/>',
		       htmlspecialchars($j),htmlspecialchars($attribute->getName()), htmlspecialchars($i),
		       htmlspecialchars($j),htmlspecialchars($attribute->getName()), htmlspecialchars($i),
			htmlspecialchars($val),
			$attribute->needJS('focus') ? sprintf('onfocus="focus_%s(this);" ', htmlspecialchars($attribute->getName(),ENT_QUOTES)) : '',
			$attribute->needJS('blur') ? sprintf('onblur="blur_%s(this);" ', htmlspecialchars($attribute->getName(),ENT_QUOTES)) : '',
			($attribute->getSize() > 0) ? sprintf('size="%s"',(int)$attribute->getSize()) : '',
			($attribute->getMaxLength() > 0) ? sprintf('maxlength="%s"',(int)$attribute->getMaxLength()) : '');

		if ($attribute->getHelper()) {
			echo '</td><td valign="top">';
			$this->draw('AttributeHelper',$attribute,$i);
			echo '</td></tr></table>';
		}
	}

	protected function drawMassFormReadWriteValueBinaryAttribute($attribute,$i,$j) {
		$this->drawFormReadWriteValueBinaryAttribute($attribute,$i);
	}

	protected function drawMassFormReadWriteValueJpegAttribute($attribute,$i,$j) {
		$this->drawFormReadOnlyValueJpegAttribute($attribute,$i);
	}
}
?>
